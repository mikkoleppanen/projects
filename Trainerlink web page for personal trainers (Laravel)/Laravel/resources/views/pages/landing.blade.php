@extends('head')

<body>
<div id="content content-landing">
    <div id="cover" class="jumbotron placeholder">
        <div class="container">
            <img class="logo" src="img/trainerlink_logo.svg">
        </div>
        <div class="container">
            @if(Session::get('message') != NULL)
                <p>Tilaus onnistui!</p>
            @else
                <p>Pysy ajan tasalla Trainerlinkistä tilaamalla uutiskirje:</p>
                @if(Session::get('error') != NULL)
                {{ Session::get('error') }}
                @endif
            <form class="subscribe" action="subscribe" method="POST">
                {{ csrf_field() }}
                <input type="text" name="email" placeholder="Sähköpostisi">
                <button type="submit">Tilaa</button>
            </form>
            @endif
        </div>
    </div>
</div>
</body>