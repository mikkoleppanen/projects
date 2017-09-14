@extends('app')

@section('content')
<div id="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="content-box">
                    <h1 class="content-header">{{ trans('app.trainers') }}</h1>
                    <!--
                    <div class="item">
                        <div>
                            <h3>Etsi sijainnilla</h3>
                            <input placeholder="Sijainti">
                            <input placeholder="Välimatka (km)">
                            <button class="btn">Hae</button>
                        </div>
                        <div>
                            <h3>Etsi nimellä</h3>
                            <input placeholder="Nimi">
                            <button class="btn">Hae</button>
                        </div>
                    </div>

                    <div class="item">
                        <div>
                            <h3>Lajittele</h3>
                            <select>
                                <option>Etäisyys</option>
                                <option>Arvostelut</option>
                                <option>Suositukset</option>
                            </select>
                        </div>
                    </div>
                    -->
                    <div class="item">
                        <div class="content">
                            <table class="big-table">
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="image">
                                            @if(file_exists('img/user_images/' . $user->id . '/profileImage.jpg'))
                                                <a href="/user/{{$user->id}}"><img src="{{ URL::asset('img/user_images/' . $user->id . '/profileImage.jpg') }}" /></a>
                                            @else
                                                <a href="/user/{{$user->id}}"><img src="{{ URL::asset('img/profiilikuva70.jpg') }}" /></a>
                                            @endif
                                        </td>
                                        <td>
                                            <h3 class="title"><a href="/user/{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</a></h3>
                                            <label>{{ trans('app.personal') }}</label>
                                            <label>{{ trans('app.remote_training') }}</label>
                                            <p>{{$user->description}}</p>
                                        </td>
                                        <td class="rating">
                                            <!--4.6 km päässä-->
                                            <div class="rating"><div class="stars" style="width:{{$user->averageScore() * 2}}0%"></div></div>
                                            <label>{{$user->reviewCount()}}</label>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop