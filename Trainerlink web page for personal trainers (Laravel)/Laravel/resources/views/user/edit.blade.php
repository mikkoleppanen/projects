@extends('app')

@section('content')
    <div id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="content-box">
                        <h1 class="content-header">{{ trans('app.edit_profile') }}</h1>
                        @include('errors.list')
                        <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ url('/user/edit') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('app.change_picture') }}</label>
                                <div class="col-md-6">
                                    <div class="trainer-images">
                                        @if(file_exists('img/user_images/' . Auth::user()->id . '/profileImage.jpg'))
                                            <img src="{{ URL::asset('img/user_images/' . Auth::user()->id . '/profileImage.jpg') }}" />
                                        @else
                                            <img src="{{ URL::asset('img/profiilikuva209.jpg') }}" />
                                        @endif
                                        <input type="file" id="profile_image" name="profile_image" accept="image/*"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('app.first_name') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="first_name" value="{{Auth::user()->first_name}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('app.last_name') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="last_name" value="{{Auth::user()->last_name}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('app.email') }}</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('app.birthdate') }}</label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="birthdate" value="{{Auth::user()->birthdate}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('app.gender') }}</label>
                                <div class="col-md-6">
                                    <input type="radio" name="gender" {{Auth::user()->gender == "male" ? "checked" : ""}} value="male">Mies
                                    <input type="radio" name="gender" {{Auth::user()->gender == "female" ? "checked" : ""}} value="female" >Nainen
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('app.info') }}</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" rows="2" cols="82" name="description">{{Auth::user()->description}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('app.training') }}</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" rows="2" cols="82" name="training">{{Auth::user()->training}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('app.experience') }}</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" rows="2" cols="82" name="experience">{{Auth::user()->experience}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('app.references') }}</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" rows="2" cols="82" name="references">{{Auth::user()->references}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('app.blog_feed_show') }}</label>
                                <div  class="col-md-6">
                                    <input type="checkbox" {{Auth::User()->blog_feed_show != null ? "checked" : ""}} class="form-control" name="blog_feed_show">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('app.blog_feed_url') }}</label>
                                <div class="col-md-6">
                                    <input type="url" class="form-control" name="blog_feed_url" value="{{Auth::user()->blog_feed_url}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('app.street_address') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="street_address" value="{{Auth::user()->street_address}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('app.postcode') }}</label>
                                <div class="col-md-1">
                                    <input type="text" class="form-control" name="postcode" value="{{Auth::user()->postcode}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('app.phone_number') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="phone_number" value="{{Auth::user()->phone_number}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('app.company') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="company" value="{{Auth::user()->company}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('app.premises') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="premises" value="{{Auth::user()->premises}}">
                                </div>
                            </div>

                            <!--
                            <div class="form-group">
                                <label class="col-md-4 control-label">Olen personal trainer</label>
                                <div  class="col-md-6">
                                    <input type="checkbox" {{Auth::user()->account_type == \App\AccountType::Trainer ? "checked" : ""}} class="form-control" name="account_type">
                                </div>
                            </div>
                            -->

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('app.receive_newsletter') }}</label>
                                <div  class="col-md-6">
                                    <input type="checkbox" {{Auth::User()->receive_newsletter != null ? "checked" : ""}} class="form-control" name="receive_newsletter">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">{{ trans('app.save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection