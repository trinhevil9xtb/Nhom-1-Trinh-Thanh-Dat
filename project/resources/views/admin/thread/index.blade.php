@extends('layouts.admin')

@section('content')
            <div class="panel panel-default">
                <div class="panel-heading">Bài viết</div>

                <div class="panel-body">
					@if($m)
						<div class="alert alert-{{$stt}}">
							{{$m}}
						</div>
					@endif
                    <div class="form-group">
						<table class="table table-bordered grocery-crud-table table-hover">
							<thead>
								<tr>
									<th>ID</th>
									<th class="col-md-7">Tiêu đề</th>
									<th>ID người đăng</th>
									<th>Sửa</th>
									<th>Xóa</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($threads as $thread)
									<tr>
										<td>{{ $thread->id}}</td>
										<td>{{ $thread->title}}</td>
										<td>{{ $thread->user_id}}</td>
										<td>
											<a class="btn btn-info" href="{{ url('admin/thread') }}/{{$thread->id}}/edit"><i class="fa fa-pencil"></i> Sửa</a>
										</td>
										<td>
										<form class="form-horizontal" role="form" method="POST" action="{{ url('admin/thread') }}/{{$thread->id}}">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<button type="submit" class="btn btn-danger">
												<i class="fa fa-pencil"></i> Xóa
											</button>
										</form>
									</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
                </div>
            </div>
@endsection
