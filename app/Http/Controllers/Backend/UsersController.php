<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest; 
use App\Http\Requests\UserUpdateRequest; 
use App\Http\Requests\UserDestroyRequest; 
use App\User;
use App\Post;



class UsersController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('name')->paginate($this->limit);
        $usersCount = User::count();

        return view("backend.users.index", compact('users','usersCount'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();

        return view("backend.users.create", compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $user = User::create($request->all());
        $user->attachRole($request->role);
        

        return redirect()->route("users.index")->with('message','New user was created successfully!');
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
        $user = User::findOrFail($id);

        return view("backend.users.edit", compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        
        $data = $request->all();
        // if password is not empty use bcrypt to hash the password
        if (!empty($data['password'])) $data['password'] = bcrypt($data['password']);
        $user  = User::findOrFail($id);
        $user->update($data);
     
        $user->detachRoles();
        $user->attachRole($request->role);
     
        // $user->detachRoles();
        // $user->attachRole($request->role);
        // return redirect("/backend/users")->with("message", "User was updated successfully!");
        
        // $user = User::findOrFail($id);
        // $user->update($request->all());

        // $user->detachRoles();
        // $user->attachRole($request->role);


        return redirect()->route('users.index')->with('message','User was updated successfullly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDestroyRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $deleteOption = $request->delete_option;
        $selectedUser = $request->selected_user;

        if($deleteOption == "delete")
        {
            
            if($user->posts()->withTrashed()->count() > 0)
            {
                // remove post iamges
                foreach($user->posts()->withTrashed()->get(['id']) as $v)
                {
                  $post = Post::withTrashed()->findOrFail($v['id']);
                  $this->removeImage($post->image);
                }
              }
              // delete user posts
              $user->posts()->withTrashed()->forceDelete();
                    
            
        }
        elseif($deleteOption =="attribute")
        {
            $user->posts()->update(['author_id' => $selectedUser]);
        }
      
        $user->delete();
        return redirect()->route('users.index')->with('message','User was deleted successfullly!');
    }

    public function confirm(UserDestroyRequest $request, $id)
    {
      
        $user = User::findOrFail($id);
        $users = User::where('id', '!=', $user->id)->pluck('name', 'id');
        
        return view("backend.users.confirm", compact('user','users'));
    }
}
