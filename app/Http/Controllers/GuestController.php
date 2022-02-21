<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuestStoreRequest;
use App\Models\Group;
use App\Models\Guest;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{

    private $guest;
    private $user;

    public function __construct(Guest $guest, User $user)
    {
        $this->guest = $guest;
        $this->user = $user;
    }


    public function detail(Request $request)
    {
        $id = $request->input('id');
        $guest_id = $request->input('guest_id');
        if (($id !== null && $guest_id !== null) || ($id === null && $guest_id === null)) return redirect()->route('index');

        if ($id) $guest = $this->guest->where('id', $id)->first();
        if ($guest_id) $guest = $this->guest->where('guest_id', $guest_id)->first();
        if (null === $guest) return redirect()->route('index');

        return view('page.guest.detail', compact('guest'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search_group = $request->input('search_group');
        $search = $request->input('search') ?? '';
        $isNotCheckin = $request->input('checkin') ? true : false;
        $isActive = $request->input('is_active') ? true : false;

        if ($search_group) $guests = Guest::whereHas('group', function (Builder $builder) use ($search_group) {
            $builder->whereIn('id', $search_group);
        });
        else $guests = $this->guest;

        if (preg_match('/^[0-9]{2}$/', $search)) {
            $guests = $guests->whereHas('group', function (Builder $builder) use ($search) {
                $builder->where('group_id', $search);
            });
        } elseif (preg_match('/^[0-9]{4}$/', $search)) {
            $guests = $guests->where('guest_id', $search);
        } else {
            $guests = $guests->where('fullname', 'like', "%$search%");
        }


        if ($isNotCheckin) $guests = $guests->where('checking_status', false);
        if ($isActive) $guests = $guests->where('is_active', true);
        $guests = $guests->with('group')->get();

        $groups = Group::all();

        return view('page.guest.index', [
            'guests' => $guests,
            'groups' => $groups,
            'search_group' => $search_group,
            'checkin' => $isNotCheckin,
            'search' => $search, "is_active" => $isActive
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();
        return view('page.guest.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuestStoreRequest $request)
    {
        $this->guest->create([
            'guest_id' => $request->guest_id,
            'fullname' => $request->fullname,
            'group_id' => $request->group_id,
            'title1' => $request->title1,
            'title2' => $request->title2,
            'seat1' => $request->seat1,
            'seat2' => $request->seat2,
            'seat3' => $request->seat3,
            'seat4' => $request->seat4,
            'image' =>  $request->file('image') !== null ? Storage::url($request->file('image')->store('public/img')) : '',
            'is_active' => isset($request->is_active) && $request->is_active === "true" ? true : false,
            'checking_status' => false,
        ]);

        return redirect()->route('guests.create')->with('success', 'Thêm đại biểu thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $groups = Group::all();
        $guest = $this->guest->find($id);
        return view('page.guest.edit', compact('guest', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GuestStoreRequest $request, $id)
    {
        $guest_new = [
            'guest_id' => $request->guest_id,
            'fullname' => $request->fullname,
            'group_id' => $request->group_id,
            'title1' => $request->title1,
            'title2' => $request->title2,
            'seat1' => $request->seat1,
            'seat2' => $request->seat2,
            'seat3' => $request->seat3,
            'seat4' => $request->seat4,
            'is_active' => isset($request->is_active) && $request->is_active === "true" ? true : false,
        ];
        if ($request->file('image') !== null) $guest_new['image'] = Storage::url($request->file('image')->store('public/img'));

        $this->guest->find($id)->update($guest_new);
        return redirect()->route('guests.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        if ($user->role_id !== 1) return redirect()->route('index');

        $this->guest->find($id)->delete();
        return redirect()->route('guests.index')->with('success', "Xoá thành công");
    }

    public function checkin(Request $request)
    {
        $action = $request->input('action');
        $guest_id = $request->input('guest_id');
        $group_id = $request->input('group_id');
        $token = $request->input('token');

        if (null === $token) return response('error', 404);

        if ($action === 'checkin' && $guest_id !== null) {
            if ($this->user->where('token', $token)->doesntExist()) return response('token incorrect', 404);

            $guest = $this->guest->where('guest_id', $guest_id)->update(['checking_status' => true]);
            if (!$guest) return response('not has guest', 404);

            return response('success', 200);
        }

        if ($action === 'checkout' && $guest_id !== null) {
            if ($this->user->where('token', $token)->doesntExist()) return response('token incorrect', 404);

            $guest = $this->guest->where('guest_id', $guest_id)->update(['checking_status' => false]);
            if (!$guest) return response('not has guest', 404);

            return response('success', 200);
        }

        if ($action === 'checkinall' && $group_id !== null) {
            if ($this->user->where([
                ['token', '=', $token],
                ['role_id', '=', 1]
            ])->doesntExist()) return response('token incorrect', 404);

            $guest = $this->guest->whereHas('group', function (Builder $builder) use ($group_id) {
                $builder->where('group_id', $group_id);
            })->update(['checking_status' => true]);
            if (!$guest) return response('not has guest', 404);

            return response('success', 200);
        }

        return response('error', 404);
    }
}
