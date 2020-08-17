<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Location;
class LocationController extends Controller
{
    //
	public static $m;
	public static $stt;
	public function index()
	{
		$locations = Location::all();
		return view('admin.location.index')->with(['locations' => $locations, 'm' => self::$m, 'stt' => self::$stt]);
	}
	
	public function create()
	{
		return view('admin.location.create');
	}
	
	public function store(Request $request)
	{
		$location = new Location;
		$location->name = $request->location;
		$location->save();
		self::$m = "Thêm thành công vị trí: ". $request->location;
		self::$stt = "success";
		return self::index();
	}
	
	public function edit($id)
	{
		$location = Location::find($id);
		return view('admin.location.edit')->with('location', $location);
	}
	
	public function update($id, Request $request)
	{
		$location = Location::find($id);
		$location->name = $request->location;
		$location->save();
		self::$m = "Cập nhật thành công vị trí: ". $request->location;
		self::$stt = "success";
		return self::index();
	}
	
	public function destroy($id)
	{
		$location = Location::find($id);
		$location->delete();
		self::$m = "Xóa thành công vị trí: ". $location->name;
		self::$stt = "danger";
		return self::index();
	}
}
