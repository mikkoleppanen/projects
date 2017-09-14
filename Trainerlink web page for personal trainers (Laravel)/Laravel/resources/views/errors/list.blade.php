@if ($errors->any())
    <div class="alert alert-danger">
        <strong>{{ trans('app.whoops') }}</strong> {{ trans('app.wrong') }}<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif