<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Thread, App\Type, App\Category, App\Condition, App\Brand, App\Location, App\User;

use Auth;



class ThreadController extends Controller
{
    //
	public static $m;
	public static $stt;
	public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function index()
	{
		$threads = Thread::all();
		return view('thread.index')->with(['threads'=> $threads,'m' => self::$m, 'stt' => self::$stt]);
	}
	
	public function create()
	{
		$types = Type::all();
		$categories = Category::all();
		$conditions = Condition::all();
		$brands = Brand::all();
		$locations = Location::all();
		return view('thread.create')->with(['categories'=> $categories, 'types'=> $types, 'conditions'=> $conditions, 'brands'=> $brands, 'locations'=> $locations]);
	}
	
	public function store(Request $request)
	{
		$thread = new Thread;
		$thread->description = $request->description;
		$thread->title = $request->title;
		$thread->type_id = $request->type;;
		$thread->category_id = $request->category;
		$thread->user_id = Auth::id();
		$thread->price = $request->price;;
		$thread->brand = $request->brand;
		$thread->condition = $request->condition;
		$thread->location = $request->location;
		$thread->save();
		return redirect('/thread');
	}

	public function edit($id)
	{
		$thread = Thread::find($id);
		$types = Type::all();
		$categories = Category::all();
		$conditions = Condition::all();
		$brands = Brand::all();
		$locations = Location::all();
		return view('thread.edit')->with(['thread'=> $thread, 'categories'=> $categories, 'types'=> $types, 'conditions'=> $conditions, 'brands'=> $brands, 'locations'=> $locations]);
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
		return redirect('/thread');
	}
	
	public function show($id)
	{
		$thread = Thread::find($id);
		if($thread['approval'] || Auth::user()->isAdmin())
		{
			$types = Type::all();
			$categories = Category::all();
			$conditions = Condition::all();
			$brands = Brand::all();
			$locations = Location::all();
			$user = User::find($thread['user_id']);
			return view('thread.show')->with(['user'=> $user, 'thread'=> $thread, 'categories'=> $categories, 'types'=> $types, 'conditions'=> $conditions, 'brands'=> $brands, 'locations'=> $locations]);
		}else
		{
			self::$m = "Bài viết này chưa được phê duyệt hoặc đã bị xóa";
			self::$stt = "warning";
			return view('errors.404')->with(['m' => self::$m, 'stt' => self::$stt]);
		}
	}
	
	public function destroy($id)
	{
		$thread = Thread::find($id);
		$thread->delete();
		self::$m = "Xóa thành công bài viết ID: ".$id;
		self::$stt = "danger";
		return self::index();
	}
}
