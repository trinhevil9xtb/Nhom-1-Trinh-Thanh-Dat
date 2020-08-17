<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User, App\Role;

class UserController extends Controller
{
    //
	public static $m;
	public static $stt;
	public function index()
	{
		$users = User::all();
		return view('admin.user.index')->with(['users' => $users, 'm' => self::$m, 'stt' => self::$stt]);
	}
	
	public function edit($id)
	{
		$user = User::find($id);
		$roles = Role::all();
		return view('admin.user.edit')->with(['user' => $user, 'roles' => $roles]);
	}
	
	public function update($id, Request $request)
	{
		$user = User::find($id);
		$user->name = $request->name;
		$user->email = $request->email;
		$user->role_id = $request->roles;
		$user->save();
		self::$m = "Cập nhật thành công người dùng ID: ".$id;
		self::$stt = "success";
		return self::index();
	}
	
	public function destroy($id)
	{
		$user = User::find($id);
		$user->delete();
		self::$m = "Xóa thành công người dùng ID: ".$id;
		self::$stt = "danger";
		return self::index();
	}
}
