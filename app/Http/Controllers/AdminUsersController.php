<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Migrations\RollbackCommand;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$users = User::all();
        //$users = User::simplePaginate(5);
        $users = User::paginate(5);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $roles = Role::pluck('name', 'id')->all();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        //

        //return $request->all();
        //dd($request->all());

        //User::create($request->all());
        //redirect('admin/users/index');

        if (trim($request->password == '')) {
            $input = $request->except('password');
        } else {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }

        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();

            $file->move('images/profile', $name);

            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;
        }

        User::create($input);

        return redirect(route('admin.users.index'))->with('success', 'The User has been created');
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
        //

        $user = User::find($id);

        $roles = Role::pluck('name', 'id')->all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        //
        $user = User::findOrfail($id);

        // old photo delete process
        /* $oldPhoto = Photo::findOrfail($user->photo_id);
        unlink(public_path() . $user->photo->file);
        $oldPhoto->delete(); */

        if (trim($request->password == '')) {
            $input = $request->except('password');
        } else {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }

        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();

            $file->move('images/profile', $name);

            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;
        }

        $user->update($input);

        return redirect(route('admin.users.index'))->with('info', 'The User has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        //dd($user->photo->file);

        /* if ($user->photo->file) {
            unlink(public_path() . $user->photo->file);
        } */

        /* if (\File::exists(public_path() . $user->photo->file))
            \File::delete(public_path() . $user->photo->file); */

        unlink(public_path() . $user->photo->file);

        $photo = Photo::findOrfail($user->photo_id);
        $photo->delete();
        $user->delete();

        return redirect('admin/users')->with('warning', 'The User has been deleted');
    }
}
