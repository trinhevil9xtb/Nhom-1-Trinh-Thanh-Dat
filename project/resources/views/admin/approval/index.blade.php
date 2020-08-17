@extends('layouts.admin')

@section('content')
            <div class="panel panel-default">
                <div class="panel-heading">Danh sách bài viết</div>

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
									<th>Xem</th>
									<th>Chấp nhận</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($threads as $thread)
									<tr>
										<td>{{ $thread->id}}</td>
										<td>{{ $thread->title}}</td>
										<td>{{ $thread->user_id}}</td>
										
										<td>
											<a class="btn btn-info" href="{{ url('thread') }}/{{$thread->id}}"><i class="fa fa-search"></i> Xem</a>
										</td>
										<td>
										<form class="form-horizontal" role="form" method="POST" action="{{ url('admin/approval') }}/{{$thread->id}}">
											{{ csrf_field() }}
											{{ method_field('PUT') }}
											@if($thread->approval)
												<button type="submit" class="btn btn-danger">
													<i class="fa fa-close"></i> Hủy chấp nhận
												</button>
											@else
												<button type="submit" class="btn btn-success">
													<i class="fa fa-check"></i> Chấp nhận
												</button>
											@endif
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
