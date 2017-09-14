@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Profiili</div>
                    <div class="panel-body">

                        <div class="trainer-images">
                            <img src="{{ URL::asset('img/profiilikuva209.jpg') }}" />
                        </div>

                        <div class="right-column">
                            <div class="item">
                                <div class="title">
                                    <h1>Ordinary Joe</h1>
                                </div>
                                <button>Ota yhteyttä</button>
                            </div>

                            <div class="item">
                                <div>
                                    <button>Yleistä</button>
                                    <button>Asiakastarinat</button>
                                    <button>Blogi</button>
                                </div>
                                <div class="content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.</p>
                                </div>
                                <div>
                                    <button>Lue lisää</button>
                                </div>
                            </div>

                            <div class="item">
                                <div class="title">
                                    <h2>Tiedot</h2>
                                </div>
                                <div class="content">
                                    <table class="borderless-table">
                                        <tr>
                                            <td><b>Koulutus</b></td>
                                            <td>Lorem ipsum dolor sit amet</td>
                                        </tr>
                                        <tr>
                                            <td><b>Erikoisosaaminen</b></td>
                                            <td>Lorem ipsum dolor sit amet</td>
                                        </tr>
                                        <tr>
                                            <td><b>Kokemus</b></td>
                                            <td>Lorem ipsum dolor sit amet</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="item">
                                <div class="title">
                                    <h2>Hinnasto</h2>
                                </div>
                                <div class="content">
                                    <table class="small-table">
                                        <tr>
                                            <td>Hodor</td>
                                            <td class="align-right">49,90 €</td>
                                        </tr>
                                        <tr>
                                            <td>Hodor Hodor</td>
                                            <td class="align-right">99,90 €</td>
                                        </tr>
                                        <tr>
                                            <td>Hodor</td>
                                            <td class="align-right">249,90 €</td>
                                        </tr>
                                        <tr>
                                            <td>Hodor Hodor Hodor</td>
                                            <td class="align-right">999,90 €</td>
                                        </tr>
                                        <tr>
                                            <td>Hodor Hodor</td>
                                            <td class="align-right">199,90 €</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="item">
                                <div class="title">
                                    <h2>Arvostelut</h2>
                                </div>
                                <div class="content">
                                    <div class="review">
                                        <div class="title">
                                            <div class="rating"></div>
                                            <h3>Matti Asiakas</h3>
                                        </div>
                                        <div class="body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                    </div>
                                    <div class="review">
                                        <div class="title">
                                            <div class="rating"></div>
                                            <h3>Tiina Timmi</h3>
                                        </div>
                                        <div class="body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="title">
                                    <h2>Suositukset</h2>
                                </div>
                                <div class="content">
                                    <div class="recommendation">
                                        <div class="title">
                                            <div class="rating"></div>
                                            <h3>Jori Mantula</h3>
                                        </div>
                                        <div class="body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection