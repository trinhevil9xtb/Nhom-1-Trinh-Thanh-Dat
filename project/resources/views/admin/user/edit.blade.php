@extends('layouts.admin')

@section('content')
            <div class="panel panel-default">
                <div class="panel-heading">Sửa người dùng</div>

                <div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('admin/user') }}/{{$user['id']}}">
						{{ csrf_field() }}
						<input type="hidden" name="_method" value="PUT">
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label for="name" class="col-md-4 control-label">Tên</label>
							<div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$user['name']}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>
						
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="email" class="col-md-4 control-label">Email</label>
							<div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{$user['email']}}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>
						
						<div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
							<label for="roles" class="col-md-4 control-label">Danh mục</label>
							<div class="col-md-6">
								<select class="form-control" name="roles">
								@foreach ($roles as $r)
									@if($r->id == $user['role_id'])
										<option value="{{$r->id}}" selected>{{$r->name}}</option>
									@else
										<option value="{{$r->id}}">{{$r->name}}</option>
									@endif
								@endforeach
								</select>
							</div>
						</div>
						
						<div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Cập nhật
                                </button>
                            </div>
                        </div>
						
					</form>
                </div>
            </div>
@endsection