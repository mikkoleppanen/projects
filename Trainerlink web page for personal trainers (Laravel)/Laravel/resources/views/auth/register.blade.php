@extends('app')

@section('content')
<div id="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
                <div class="content-box">
                    <h1 class="content-header">{{ trans('app.register') }}</h1>
                    @include('errors.list')

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ trans('app.first_name') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ trans('app.last_name') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ trans('app.email_address') }}</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ trans('app.password') }}</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ trans('app.confirm_password') }}</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <!--
                        <div class="form-group">
                            <label class="col-md-4 control-label">Olen personal trainer</label>
                            <div class="col-md-6">
                                <input type="checkbox" class="form-control" name="is_trainer">
                            </div>
                        </div>
                        -->
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4 buttons">
                                <button type="submit" class="btn btn-primary">{{ trans('app.create_user') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
			</div>
		</div>
	</div>
</div>
@endsection