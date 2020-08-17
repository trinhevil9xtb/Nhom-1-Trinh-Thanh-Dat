@extends('layouts.admin')

@section('content')
            <div class="panel panel-default">
                <div class="panel-heading">Thêm vị trí</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/location') }}">
						{{ csrf_field() }}
						<div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
							<label for="location" class="col-md-4 control-label">Tên vị trí</label>
							<div class="col-md-6">
                                <input id="location" type="text" class="form-control" name="location" value="{{ old('location') }}" required autofocus>

                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>
						</div>
						
						<div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Thêm vị trí
                                </button>
                            </div>
                        </div>
					</form>
                </div>
            </div>
@endsection

