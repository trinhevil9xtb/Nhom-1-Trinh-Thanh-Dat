<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Thread, App\Type, App\Category, App\Condition, App\Brand, App\Location, App\User;

class ThreadController extends Controller
{
    //
	public static $m;
	public static $stt;
	public function index()
	{
		$threads = Thread::all();
		return view('admin.thread.index')->with(['threads'=> $threads,'m' => self::$m, 'stt' => self::$stt]);
	}
	
	public function edit($id)
	{
		$thread = Thread::find($id);
		$types = Type::all();
		$categories = Category::all();
		$conditions = Condition::all();
		$brands = Brand::all();
		$locations = Location::all();
		return view('admin.thread.edit')->with(['thread'=> $thread, 'categories'=> $categories, 'types'=> $types, 'conditions'=> $conditions, 'brands'=> $brands, 'locations'=> $locations]);
	}
	
	public function update($id, Request $request)
	{
		$thread = Thread::find($id);
		$thread->description = $request->description;
		$thread->title = $request->title;
		$thread->type_id = $request->type;;
		$thread->category_id = $request->category;
		$thread->price = $request->price;;
		$thread->brand = $request->brand;
		$thread->condition = $request->condition;
		$thread->location = $request->location;
		$thread->save();
		self::$m = "Cập nhật bài viết thành công";
		self::$stt = "success";
		return self::index();
	}
	
	public function destroy($id)
	{
		$thread = Thread::find($id);
		$thread->delete();
		self::$m = "Xóa thành công bài viết ID là ".$id;
		self::$stt = "danger";
		return self::index();
	}
}
