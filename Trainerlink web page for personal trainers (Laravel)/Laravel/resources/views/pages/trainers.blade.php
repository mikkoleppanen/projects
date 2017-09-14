@extends('app')

@section('content')
<div id="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Personal Trainerit [alueella xxx, +-25 km]</div>
                    <div class="panel-body">

                        <div class="item">
                            <div>
                                <h3>Etsi sijainnilla</h3>
                                <input placeholder="Sijainti">
                                <input placeholder="Välimatka (km)">
                                <button>Hae</button>
                            </div>
                            <div>
                                <h3>Etsi nimellä</h3>
                                <input placeholder="Nimi">
                                <button>Hae</button>
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

                        <div class="item">
                            <div class="content">
                                <table class="big-table">
                                    <tr>
                                        <td class="image">
                                            <a href="/user/profile"><img src="{{ URL::asset('img/profiilikuva70.jpg') }}" /></a>
                                        </td>
                                        <td>
                                            <h3 class="title"><a href="/user/profile">Teppo Traineri</a></h3>
                                            <label>Personal</label>
                                            <label>Etävalmennus</label>
                                            <p>Tietoa minusta</p>
                                        </td>
                                        <td class="rating">
                                            4.6 km päässä
                                            <div class="rating"></div>
                                            <label>+2</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="image">
                                            <a href="/user/profile"><img src="{{ URL::asset('img/profiilikuva70.jpg') }}" /></a>
                                        </td>
                                        <td>
                                            <h3 class="title"><a href="/user/profile">Jari Mentula</a></h3>
                                            <label>Kehoilu</label>
                                            <label>Kisavalmennus</label>
                                            <p>Höpö höpö</p>
                                        </td>
                                        <td class="rating">
                                            11.7 km päässä
                                            <div class="rating"></div>
                                            <label>+11</label>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
