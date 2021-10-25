<?php

namespace App\Http\Controllers;

use App\Http\Resources\ListResource;
use App\Models\UserList;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = user()->lists()->get();

        return ListResource::collection($lists);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required']
        ]);

        $list = user()->lists()->create($request->all());

        return ListResource::make($list);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserList $userList)
    {
        $valdidated = $request->validate([
            'title'    => ['required'],
            'complete' => ['required', 'sometimes']
        ]);

        $userList->title        = $valdidated['title'];
        $userList->completed_at = $valdidated['complete'] ? now() : null;
        $userList->save();

        return ListResource::make($userList);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserList $userList)
    {
        $userList->delete();

        return response()->json([
            'data' => 'Item deleted'
        ], 200);
    }
}
