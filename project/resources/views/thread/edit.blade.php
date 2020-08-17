@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Đăng bài</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/thread') }}/{{$thread['id']}}">
						{{ csrf_field() }}
						<input type="hidden" name="_method" value="PUT">
						<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
							<label for="title" class="col-md-4 control-label">Tiêu đề</label>
							<div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{$thread['title']}}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>
						
						<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
							<label for="type" class="col-md-4 control-label">Bạn đăng tin</label>
							<div class="col-md-6">
								@foreach ($types as $type)
									@if($type->id == $thread['type_id'])
										<label class="radio-inline"><input type="radio" name="type" value="{{$type->id}}" required autofocus checked>{{$type->name}}</label>
									@else
										<label class="radio-inline"><input type="radio" name="type" value="{{$type->id}}" required autofocus>{{$type->name}}</label>
									@endif
								@endforeach
							</div>
						</div>
						
						<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
							<label for="category" class="col-md-4 control-label">Danh mục</label>
							<div class="col-md-6">
								<select class="form-control" name="category">
								@foreach ($categories as $category)
									@if($category->id == $thread['category_id'])
										<option value="{{$category->id}}" selected>{{$category->name}}</option>
									@else
										<option value="{{$category->id}}">{{$category->name}}</option>
									@endif
								@endforeach
								</select>
							</div>
						</div>
						
						<div class="form-group{{ $errors->has('condition') ? ' has-error' : '' }}">
							<label for="condition" class="col-md-4 control-label">Tình trạng</label>
							<div class="col-md-6">
								<select class="form-control" name="condition" required autofocus>
								@foreach ($conditions as $condition)
									@if($condition->id == $thread['condition'])
										<option value="{{$condition->id}}" selected>{{$condition->name}}</option>
									@else
										<option value="{{$condition->id}}">{{$condition->name}}</option>
									@endif
								@endforeach
								</select>
							</div>
						</div>
						
						<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
							<label for="price" class="col-md-4 control-label">Giá</label>
							<div class="col-md-6">
                                <input id="price" type="text" class="form-control" name="price" value="{{ $thread['price'] }}" required autofocus>

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>
						
						<div class="form-group{{ $errors->has('brand') ? ' has-error' : '' }}">
							<label for="brand" class="col-md-4 control-label">Tình trạng</label>
							<div class="col-md-6">
								<select class="form-control" name="brand">
								@foreach ($brands as $brand)
									@if($brand->id == $thread['brand'])
										<option value="{{$brand->id}}" selected>{{$brand->name}}</option>
									@else
										<option value="{{$brand->id}}">{{$brand->name}}</option>
									@endif
								@endforeach
								</select>
							</div>
						</div>
						
						<div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
							<label for="location" class="col-md-4 control-label">Vị trí</label>
							<div class="col-md-6">
								<select class="form-control" name="location">
								@foreach ($locations as $location)
									@if($location->id == $thread['location'])
										<option value="{{$location->id}}" selected>{{$location->name}}</option>
									@else
										<option value="{{$location->id}}">{{$location->name}}</option>
									@endif
								@endforeach
								</select>
							</div>
						</div>
						
						<div class="form-group{{ $errors->has('description') ? ' has-error' : ''}}">
							<label for="description" class="col-md-4 control-label">Nội dung</label>
							<div class="col-md-6">
								<textarea id="description" class="form-control" rows="10" name="description">{{$thread['description']}}</textarea>
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

