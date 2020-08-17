@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ERROR 404</div>

                <div class="panel-body text-center">
					@if(isset($m))
						<div class="alert alert-{{$stt}}">
							<strong>{{$m}}</strong>
							</br>
							<a href="javascript:history.back(-1)">Quay về chỗ khi nãy</a>
							
						</div>
					@endif
					<img src="/images/404.jpg"/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
