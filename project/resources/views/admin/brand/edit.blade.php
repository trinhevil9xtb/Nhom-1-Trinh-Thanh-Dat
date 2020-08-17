@extends('layouts.admin')

@section('content')
            <div class="panel panel-default">
                <div class="panel-heading">Sửa nhãn hiệu</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/brand') }}/{{$brand['id']}}">
						{{ csrf_field() }}
						<div class="form-group{{ $errors->has('brand') ? ' has-error' : '' }}">
						{{ csrf_field() }}
						{{ method_field('PUT') }}
							<label for="brand" class="col-md-4 control-label">Tên nhãn hiệu</label>
							<div class="col-md-6">
                                <input id="brand" type="text" class="form-control" name="brand" value="{{$brand['name']}}" required autofocus>

                                @if ($errors->has('brand'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('brand') }}</strong>
                                    </span>
                                @endif
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

