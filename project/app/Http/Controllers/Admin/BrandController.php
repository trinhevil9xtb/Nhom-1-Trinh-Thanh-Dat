<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\brand;
class BrandController extends Controller
{
    //
	public static $m;
	public static $stt;
	public function index()
	{
		$brands = Brand::all();
		return view('admin.brand.index')->with(['brands' => $brands, 'm' => self::$m, 'stt' => self::$stt]);
	}
	
	public function create()
	{
		return view('admin.brand.create');
	}
	
	public function store(Request $request)
	{
		$brand = new Brand;
		$brand->name = $request->brand;
		$brand->save();
		self::$m = "Thêm thành công nhãn hiệu: ". $request->brand;
		self::$stt = "success";
		return self::index();
	}
	
	public function edit($id)
	{
		$brand = Brand::find($id);
		return view('admin.brand.edit')->with('brand', $brand);
	}
	
	public function update($id, Request $request)
	{
		$brand = Brand::find($id);
		$brand->name = $request->brand;
		$brand->save();
		self::$m = "Cập nhật thành công nhãn hiệu: ". $request->brand;
		self::$stt = "success";
		return self::index();
	}
	
	public function destroy($id)
	{
		$brand = brand::find($id);
		$brand->delete();
		self::$m = "Xóa thành công nhãn hiệu: ". $brand->name;
		self::$stt = "danger";
		return self::index();
	}
}
