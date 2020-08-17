@extends('layouts.admin')

@section('content')
            <div class="panel panel-default">
                <div class="panel-heading">Vị trí</div>

                <div class="panel-body">
					@if(isset($m))
						<div class="alert alert-{{$stt}}">
							{{$m}}
						</div>
					@endif
					<table class="table table-bordered grocery-crud-table table-hover">
						<div style="padding: 0 0 15px 0">
								<a class="btn btn-primary"  href="{{url('admin/location/create')}}"><i class="fa fa-plus"></i> &nbsp; Thêm vị trí </a>
						</div>
						<thead>
							<tr>
								<th>ID</th>
								<th>Tên</th>
								<th>Sửa</th>
								<th>Xóa</th>
							</tr>
						</thead>
						<tbody>
							@foreach($locations as $c)
								<tr>
									<td>{{$c->id}}</td>
									<td>{{$c->name}}</td>
									<td>
										<a class="btn btn-info" href="{{ url('admin/location') }}/{{$c->id}}/edit"><i class="fa fa-pencil"></i> &nbsp; Sửa</a>
									</td>
									<td>
										<form class="form-horizontal" role="form" method="POST" action="{{ url('admin/location') }}/{{$c['id']}}">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<button type="submit" class="btn btn-danger">
												<i class="fa fa-close"></i> &nbsp; Xóa
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