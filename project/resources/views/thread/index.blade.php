@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="form-group">
						<table class="table table-bordered grocery-crud-table table-hover">
							<div style="padding: 0 0 15px 0">
								<a class="btn btn-default"  href="{{url('/thread/create')}}"><i class="fa fa-plus"></i> &nbsp; Đăng Tin </a>
							</div>
							<thead>
								<tr>
									<th>Tiêu đề</th>
									<th>Sửa</th>
									<th>Xóa</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($threads as $thread)
									<tr>
										<td class="col-md-12">{{ $thread->title}}</th>
										<td>
											<a class="btn btn-success" href="{{ url('thread') }}/{{$thread->id}}/edit"><i class="fa fa-pencil"></i> Sửa</a>
										</td>
										<td>
											<form class="form-horizontal" role="form" method="POST" action="{{ url('thread') }}/{{$thread->id}}">
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
        </div>
    </div>
</div>
@endsection
