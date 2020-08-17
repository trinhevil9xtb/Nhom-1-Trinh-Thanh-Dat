<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Thread;

class ApprovalController extends Controller
{
    //
	public static $m;
	public static $stt;
	public function index()
	{
		$threads = Thread::all();
		return view('admin.approval.index')->with(['threads'=> $threads,'m' => self::$m, 'stt' => self::$stt]);
	}
	
	public function update($id, Request $request)
	{
		$thread = Thread::find($id);
		if($thread->approval)
			$thread->approval = 0;
		else
			$thread->approval = 1;
		$thread->save();
		if($thread->approval)
		{
			self::$m = "Bạn đã phê duyệt bài đăng ID: ". $id;
			self::$stt = "success";
		}else
		{
			self::$m = "Bạn đã hủy phê duyệt bài đăng ID: ". $id;
			self::$stt = "danger";
		}
		return self::index();
	}
	
	
	
}
