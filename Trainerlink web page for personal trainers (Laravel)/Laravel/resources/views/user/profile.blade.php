@extends('app')

@section('content')
<div id="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="content-box">
                    <div class="trainer-images">
                        @if(file_exists('img/user_images/' . $user->id . '/profileImage.jpg'))
                            <img src="{{ URL::asset('img/user_images/' . $user->id . '/profileImage.jpg') }}" />
                        @else
                            <img src="{{ URL::asset('img/profiilikuva209.jpg') }}" />
                        @endif
                    </div>

                    <div class="right-column">
                        <div class="item">
                            <div class="title">
                                <h1>{{$user->first_name}} {{$user->last_name}}</h1>
                            </div>
                            @if(Auth::user() != null && Auth::user()->id == $user->id)
                                <a href="/user/edit" class="button">{{ trans('app.edit_profile') }}</a>
                            @else
                                @if(Auth::user() != null)
                                    <button type="button" class="btn lightbox-message-open">{{ trans('app.contact') }}</button>
                                @else
                                    <a href="/auth/login" class="button">{{ trans('app.login') }}</a>
                                @endif
                            @endif
                        </div>

                        <div class="item">
                            <!--
                            <div>
                                <button>Yleistä</button>
                                <button>Asiakastarinat</button>
                                <button>Blogi</button>
                            </div>
                            -->
                            <div class="content">
                                <p>{{$user->description}}</p>
                            </div>
                            <!--
                            <div>
                                <button>Lue lisää</button>
                            </div>
                            -->
                        </div>

                        <div class="item">
                            <div class="title">
                                <h2>{{ trans('app.info') }}</h2>
                            </div>
                            <div class="content">
                                <table class="borderless-table">
                                    <tr>
                                        <td><b>{{ trans('app.training') }}</b></td>
                                        <td>{{$user->training}}</td>
                                    </tr>
                                    <!--
                                    <tr>
                                        <td><b>Erikoisosaaminen</b></td>
                                        <td>
                                            @foreach($user->specializations()->get() as $specialization)
                                                {{$specialization->name}}<br>
                                            @endforeach
                                        </td>
                                    </tr>
                                    -->
                                    <tr>
                                        <td><b>{{ trans('app.experience') }}</b></td>
                                        <td>{{$user->experience}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="item">
                            <div class="title">
                                <h2>{{ trans('app.price_list') }}</h2>
                            </div>
                            <div class="content">
                                <table class="small-table">
                                    @foreach($user->serviceFees()->get() as $service)
                                    <tr>
                                        <td>{{$service->name}}</td>
                                        <td class="align-right">{{$service->price}} €</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>

                        <div class="item">
                            <div class="title">
                                <h2>{{ trans('app.reviews') }}</h2>
                            </div>
                            <div class="content">
                                @if(Auth::user() != null && $user->id != Auth::user()->id)
                                <button type="button" class="btn lightbox-review-open">{{ trans('app.write_review') }}</button>
                                @endif
                                @foreach($user->reviews()->reverse() as $review)
                                    <div class="review">
                                        <div class="title">
                                            <div class="rating"><div class="stars" style="width:{{$review->score * 2}}0%"></div></div>
                                            <h1>{{$review->title}}</h1>
                                        </div>
                                        <div class="body">
                                            <p>{{$review->body}}</p>
                                        </div>
                                        <p class="info">- {{$review->reviewer->first_name}} {{$review->reviewer->last_name}}</p>
                                    </div>
                                    @endforeach
                            </div>
                        </div>
                        <!--
                        <div class="item">
                            <div class="title">
                                <h2>Suositukset</h2>
                            </div>
                            <div class="content">
                                {{--@foreach($user->recommendations() as $recommendation)
                                    <div class="recommendation">
                                        <div class="title">
                                            <div class="rating"></div>
                                            <h3>{{$recommendation->recommender->first_name}} {{$recommendation->recommender->last_name}}</h3>
                                        </div>
                                        <div class="body">
                                            <p>{{$recommendation->body}}</p>
                                        </div>
                                    </div>
                                @endforeach--}}
                            </div>
                        </div>
                        -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="lightbox-review" class="lightbox-container lightbox-close hidden">
    <div class="col-sm-12 col-md-12">
        <div class="lightbox-loader col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-push-1 col-md-push-2 col-lg-push-3">
            <div class="lightbox item stop-propagation">
                <div class="title">
                    <h2>{{ trans('app.new_review') }}</h2>
                </div>
                <div class="content">
                    <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ url('/user/review') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$user->id}}"/>
                        <div class="form-group">
                            <label class="col-md-2 control-label">{{ trans('app.message_title') }}</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="review-title" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">{{ trans('app.content') }}</label>
                            <div class="col-md-10">
                                <textarea class="form-control" rows="4" name="review-body"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">{{ trans('app.rating') }}</label>
                            <div class="col-md-10">
                                <select class="form-control" name="review-rating">
                                    <option value="5">5</option>
                                    <option value="4">4</option>
                                    <option value="3">3</option>
                                    <option value="2">2</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                        </div>

                        <div class="align-right">
                            <button type="button" class="btn lightbox-close" name="cancel">{{ trans('app.cancel') }}</button>
                            <button type="submit" class="btn" name="save" onclick="submit()">{{ trans('app.send') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="lightbox-message" class="lightbox-container lightbox-close hidden">
    <div class="col-sm-12 col-md-12">
        <div class="lightbox-loader col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-push-1 col-md-push-2 col-lg-push-3">
            <div class="lightbox item stop-propagation">
                <div class="title">
                    <h2>{{ trans('app.send_message') }}</h2>
                </div>
                <div class="content">
                    <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ url('/user/sendMail') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$user->id}}"/>
                        <input type="hidden" name="email-address" value="{{$user->email}}">

                        <div class="form-group">
                            <label class="col-md-2 control-label">{{ trans('app.message_title') }}</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="email-title" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">{{ trans('app.content') }}</label>
                            <div class="col-md-10">
                                <textarea class="form-control" rows="4" name="email-body"></textarea>
                            </div>
                        </div>

                        <div class="align-right">
                            <button type="button" class="btn lightbox-close" name="cancel">{{ trans('app.cancel') }}</button>
                            <button type="submit" class="btn" name="save" onclick="submit()">{{ trans('app.send') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection