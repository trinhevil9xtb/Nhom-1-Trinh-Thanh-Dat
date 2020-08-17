<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use App\User, App\Location;
class AccountController extends Controller
{
    //
	public static $m;
	public static $stt;
	public function index()
	{
		$user = User::find(Auth::id());
		return view('account.index')->with(['user'=> $user,'m' => self::$m, 'stt' => self::$stt]);
	}
	
	public function edit()
	{
		$user = User::find(Auth::id());
		$locations = Location::all();
		return view('account.edit')->with(['user'=> $user, 'locations' => $locations]);
	}
	
	public function update(Request $request)
	{
		$user = User::find(Auth::id());
		$user->address = $request->address;
		$user->birth = $request->birth;
		$user->sex = $request->sex;
		$user->phone = $request->phone;
		$user->location = $request->location;
		$user->save();
		self::$m = "Đã cập nhật thông tin cá nhân thành công";
		self::$stt = "success";
		return self::index();
	}
}
