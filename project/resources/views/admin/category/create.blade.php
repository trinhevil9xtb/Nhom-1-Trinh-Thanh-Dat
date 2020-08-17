@extends('layouts.admin')

@section('content')
            <div class="panel panel-default">
                <div class="panel-heading">Thêm danh dục</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/category') }}">
						{{ csrf_field() }}
						<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
							<label for="category" class="col-md-4 control-label">Tên danh mục</label>
							<div class="col-md-6">
                                <input id="category" type="text" class="form-control" name="category" value="{{ old('category') }}" required autofocus>

                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>
						
						<div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Thêm danh mục
                                </button>
                            </div>
                        </div>
					</form>
                </div>
            </div>
@endsection

