@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Thông tin cá nhân</div>
				@if($m)
						<div class="alert alert-{{$stt}}">
							{{$m}}
						</div>
				@endif
                <div class="panel-body">
				@if(!isset($user['address']) ||
					!isset($user['birth']) ||
					!isset($user['sex']) ||
					!isset($user['phone']) ||
					!isset($user['location']))
					Vui lòng cập nhật thông tin cá nhân tại <a href="{{url('/account/edit')}}">đây</a>
				@endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
