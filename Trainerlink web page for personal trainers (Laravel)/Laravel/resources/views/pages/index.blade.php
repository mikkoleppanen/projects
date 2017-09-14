@extends('app')

@section('content')
    <div id="content content-landing">
        <div id="cover" class="jumbotron">
            <div class="container">
                <h1>{{ trans('app.home_title') }}</h1>

                <form class="search" action="/search" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    <input type="text" name="search" placeholder="{{trans('app.search_desc')}}">
                    <button type="submit">{{trans('app.search')}}</button>
                </form>
            </div>
        </div>

        <div class="container landing">
            <div id="registration-row" class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-12">
                    <p>{{trans('app.register_now')}}</p>
                    <button type="submit">{{ trans('app.register') }}</button>
                </div>
            </div>
            <div id="trainer-row" class="row ">
                <div class="col-md-12 white-text">
                    <p>{{trans('app.concentrate')}}</p>
                    <div class="image-row">
                        <div class="image-container">
                            <img src="img/image1.jpg">
                            <p>{{trans('app.bill')}}</p>
                        </div>
                        <div class="image-container">
                            <img src="img/image2.jpg">
                            <p>{{trans('app.visible')}}</p>
                        </div>
                        <div class="image-container">
                            <img src="img/image3.jpg">
                            <p>{{trans('app.find')}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="who-we-are-row" class="row">
                <div class="col-md-12">
                    <h1>{{trans('app.who_are_we')}}</h1>
                    <p>{{trans('app.personal_trainers_to_everyone')}}</p>
                    <div class="some-row">
                        <h1 class="some-icon"><i class="fa fa-facebook-official"></i></h1>
                        <h1 class="some-icon"><i class="fa fa-twitter-square"></i></h1>
                        <h1 class="some-icon"><i class="fa fa-youtube"></i></h1>
                        <h1 class="some-icon"><i class="fa fa-instagram"></i></h1>
                        <h1 class="some-icon"><i class="fa fa-google-plus-square"></i></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
