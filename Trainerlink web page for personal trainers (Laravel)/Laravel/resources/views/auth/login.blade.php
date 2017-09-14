@extends('app')

@section('content')
<div id="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
                <div class="content-box">
                    <h1 class="content-header">{{ trans('app.sign_in') }}</h1>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>{{ trans('app.whoops') }}</strong> {{ trans('app.wrong') }}<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                        {!! csrf_field() !!}

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
                            <label class="col-md-4 control-label">{{ trans('app.remember_me') }}</label>
                            <div class="col-md-6">
                                <input type="checkbox" class="form-control" name="remember">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4 buttons">
                                <!--<a class="btn btn-link" href="{{ url('/password/email') }}">Unohtuiko salasana?</a>-->
                                <button type="submit" class="btn btn-primary">{{ trans('app.login') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
			</div>
		</div>
	</div>
</div>
@endsection
