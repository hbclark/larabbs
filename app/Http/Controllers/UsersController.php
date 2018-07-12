<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Http\Requests\UsersRequest;

use App\Models\User;


class UsersController extends Controller
{
    public function show(User $user){
        return view('users.show',compact('user'));
    }

    public function edit(User $user){
        return view('users.edit',compact('user'));
    }

    public function update(UsersRequest $request,ImageUploadHandler $uploader, User $user){
        $data= $request->all();

        if($request->avatar){
            $result=$uploader->save($request->avatar,'avatars',$user->id);
            if($result){
                $data['avatar'] = $result['path'];
            }
        }
        $user->update($data);
        return redirect()->route('users.show',$user)->with('success','update completed');
    }
}
