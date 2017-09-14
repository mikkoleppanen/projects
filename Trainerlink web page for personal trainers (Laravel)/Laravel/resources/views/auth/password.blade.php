@extends('app')

@section('content')
<div id="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">{{ trans('app.reset_password') }}</div>
					<div class="panel-body">
						@if (session('status'))
							<div class="alert alert-success">
								{{ session('status') }}
							</div>
						@endif

						@if (count($errors) > 0)
							<div class="alert alert-danger">
								<strong>{{ trans('app.whoops') }}</strong> {{ trans('app.problem') }}<br><br>
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif

						<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
							{!! csrf_field() !!}

							<div class="form-group">
								<label class="col-md-4 control-label">{{ trans('app.email_address') }}</label>
								<div class="col-md-6">
									<input type="email" class="form-control" name="email" value="{{ old('email') }}">
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-primary">
										{{ trans('app.password_reset_link') }}
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
