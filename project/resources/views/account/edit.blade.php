@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cập nhật thông tin cá nhân</div>

                <div class="panel-body">
				<form class="form-horizontal" role="form" method="POST" action="{{ url('/account/update') }}">
						{{ csrf_field() }}
						<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
							<label for="address" class="col-md-4 control-label">Địa chỉ</label>
							<div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{$user['address']}}" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>
						
						<div class="form-group{{ $errors->has('birth') ? ' has-error' : '' }}">
							<label for="birth" class="col-md-4 control-label">Ngày tháng năm sinh</label>
							<div class="col-md-6">
                                <input id="birth" type="date" class="form-control" name="birth" value="{{$user['birth']}}" required autofocus>

                                @if ($errors->has('birth'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birth') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>
						<div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
							<label for="sex" class="col-md-4 control-label">Giới tính</label>
							<div class="col-md-6">
								@if($user['sex'] == NULL)
									<label class="radio-inline"><input type="radio" name="sex" value="1" required autofocus>Nam</label>
									<label class="radio-inline"><input type="radio" name="sex" value="2" required autofocus>Nữ</label>
								@endif
								
								@if($user['sex'] == 1)
									<label class="radio-inline"><input type="radio" name="sex" value="1" required autofocus checked>Nam</label>
									<label class="radio-inline"><input type="radio" name="sex" value="2" required autofocus>Nữ</label>
								@endif
								
								@if($user['sex'] == 2)
									<label class="radio-inline"><input type="radio" name="sex" value="2" required autofocus checked>Nữ</label>
									<label class="radio-inline"><input type="radio" name="sex" value="1" required autofocus>Nam</label>
								@endif
							</div>
						</div>
						
						<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
							<label for="phone" class="col-md-4 control-label">Số điện thoại</label>
							<div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{$user['phone']}}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>
						
						<div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
							<label for="location" class="col-md-4 control-label">Tình trạng</label>
							<div class="col-md-6">
								<select class="form-control" name="location" required autofocus>
								@foreach ($locations as $location)
									@if($location->id == $user['location'])
										<option value="{{$location->id}}" selected>{{$location->name}}</option>
									@else
										<option value="{{$location->id}}">{{$location->name}}</option>
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
        </div>
    </div>
</div>
@endsection
