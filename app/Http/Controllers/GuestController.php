<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuestStoreRequest;
use App\Models\Group;
use App\Models\Guest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $guest_id = $request->input('guest');
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
        $search = $request->input('search');
        if (!$search) {
            $guests = $this->guest->paginate(10);
        }

        // if

        return view('page.guest.index', compact('guests'));
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
        return redirect()->route('guests.index');
    }

    public function checkin(Request $request)
    {
        $action = $request->input('action');
        $guest_id = $request->input('guest_id');
        $group_id = $request->input('group_id');
        $token = $request->input('token');

        if (null === $token) return response('error', 404);

        if ($action === 'checkin' && $guest_id !== null) {
            if ($this->user->where('token', $token)->doesntExist()) return response('error', 404);

            $guest = $this->guest->where('guest_id', $guest_id)->update(['checking_status' => true]);
            if (!$guest) return response('error', 404);

            return response('success', 200);
        }

        if ($action === 'checkout' && $guest_id !== null) {
            if ($this->user->where('token', $token)->doesntExist()) return response('error', 404);

            $guest = $this->guest->where('guest_id', $guest_id)->update(['checking_status' => false]);
            if (!$guest) return response('error', 404);

            return response('success', 200);
        }

        if ($action === 'checkinall' && $group_id !== null) {
            if ($this->user->where([
                ['token', '=', $token],
                ['role_id', '=', 1]
            ])->doesntExist()) return response('error', 404);

            $guest = $this->guest->where('group_id', $group_id)->update(['checking_status' => true]);
            // return $guest;
            if (!$guest) return response('error', 404);

            return response('success', 200);
        }

        return response('error', 404);
    }
}
