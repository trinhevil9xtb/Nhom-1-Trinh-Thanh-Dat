@extends('layouts.admin')

@section('content')
            <div class="panel panel-default">
                <div class="panel-heading">Người dùng</div>

                <div class="panel-body">
					@if($m)
						<div class="alert alert-{{$stt}}">
							{{$m}}
						</div>
					@endif
					<table class="table table-bordered grocery-crud-table table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Tên</th>
								<th>Email</th>
								<th>Sửa</th>
								<th>Xóa</th>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $u)
								<tr>
									<td>{{$u->id}}</td>
									<td>{{$u->name}}</td>
									<td>{{$u->email}}</td>
									<td>
										<a class="btn btn-info" href="{{ url('admin/user') }}/{{$u->id}}/edit"><i class="fa fa-pencil"></i> Sửa</a>
									</td>
									<td>
										<form class="form-horizontal" role="form" method="POST" action="{{ url('admin/user') }}/{{$u['id']}}">
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
@endsection