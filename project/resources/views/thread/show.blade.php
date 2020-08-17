@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>{{$thread['title']}}</h3></div>

                <div class="panel-body">
					<div class="row col-md-12">
						<div class="col-md-3 col-xs-3 text-primary">Ngày Đăng</div>
						<div class="col-md-3 col-xs-3">{{$thread['created_at']}}</div>
						<div class="col-md-3 col-xs-3 text-primary">Tình Trạng</div>
						<div class="col-md-3 col-xs-3">
							@foreach($conditions as $condition)
								@if($condition->id == $thread['condition'])
									{{$condition->name}}
								@endif
							@endforeach
						</div>
					</div>
					
					<div class="row col-md-12">
						<div class="col-md-3 col-xs-3 text-primary">Vị Trí</div>
						<div class="col-md-3 col-xs-3">
							@foreach($locations as $location)
								@if($location->id == $thread['location'])
									{{$location->name}}
								@endif
							@endforeach
						</div>
						<div class="col-md-3 col-xs-3 text-primary">Người Đăng</div>
						<div class="col-md-3 col-xs-3">
							{{$user['name']}}
						</div>
					</div>
						
						
                </div>
            </div>
			
			<div class="panel panel-default">
				<div class="panel-body">
				{{$thread['description']}}
				</div>
			</div>
        </div>
		<div class="container">
		<div class="row">
			<div class="col-md-2">

					<button type="button" class="btn btn-success col-md-12 col-sm-12 col-xs-12"><i class="fa fa-phone" aria-hidden="true"></i> Gọi ngay</button>
				<hr>

					<button type="button" class="btn btn-success col-md-12 col-sm-12 col-xs-12"><i class="fa fa-envelope" aria-hidden="true"></i> Gửi email</button>

			</div>
		</div>
		</div>
    </div>
	
	
</div>

@endsection
