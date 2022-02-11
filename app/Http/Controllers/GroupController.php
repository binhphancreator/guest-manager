<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupStoreRequest;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{

    private $group;
    public function __construct(Group $group)
    {
        $this->group = $group;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::orderBy('group_id')->paginate();
        return view('page.group.index', ['groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupStoreRequest $request)
    {
        $this->group->create([
            'group_id' => $request->group_id,
            'group_name' => $request->group_name
        ]);

        return redirect()->route('groups.create')->with('success', 'Thêm nhóm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = $this->group->find($id);
        return view('page.group.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GroupStoreRequest $request, $id)
    {
        $this->group->find($id)->update($request->all());
        return redirect()->route('groups.index');
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

        $this->group->find($id)->delete();
        return redirect()->route('groups.index');
    }
}
