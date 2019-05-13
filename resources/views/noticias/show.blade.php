<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns:display="http://www.w3.org/1999/xhtml"
      xmlns:width="http://www.w3.org/1999/xhtml" xmlns:height="http://www.w3.org/1999/xhtml"
      xmlns:margin="http://www.w3.org/1999/xhtml" xmlns:background-size="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Marcações de compartilhamento facebook -->
    <meta property="og:url" content="https://smartenem.com.br/noticias/show/{{ $publication->id }}"/>
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $publication->titulo }}" />
    <meta property="og:description" content="{{ $publication->resumo }}" />
    <meta property="og:image" content="https://smartenem.com.br/storage/publications/{{$publication->id.'/'.$publication->imagem }}" />
    <meta property="og:image:width" content="80px" />
    <meta property="og:image:height" content="80px" />

    <title>{{ config('app.name', 'SmartEnem') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
        .whatsapp-share-button {
            display: inline-block;
            width: 40px;
            height: 40px;
            margin: 5px;
            background-size: 100% 100%;
        }
    </style>
</head>
<body>
<div id="fb-root"></div>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<script>
    //Constrói a URL depois que o DOM estiver pronto
    document.addEventListener("DOMContentLoaded", function() {
        //conteúdo que será compartilhado: Título da página + URL
        var conteudo = encodeURIComponent(document.title + " " + window.location.href);
        //altera a URL do botão
        document.getElementById("whatsapp-share-btt").href = "https://api.whatsapp.com/send?text=" + conteudo;
    }, false);
</script>

<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ Html::image('/image/marca.jpg', 'marca', ['height' => '50']) }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="btn btn-primary mr-3" type="button">
                        <a class="nav-link" href="{{ route('noticias.index') }}"><span style="font-weight: bold; color: black;">{{ __('Noticias') }}</span></a>
                    </li>
                    <li class="btn btn-primary mr-3" type="button">
                        <a class="nav-link" href="{{ route('calendarios.index') }}"><span style="font-weight: bold; color: black;">{{ __('Calendário') }}</span></a>
                    </li>
                    <li class="btn btn-primary mr-3" type="button">
                        <a class="nav-link" href="{{ route('cria.email') }}"><span style="font-weight: bold; color: black;">{{ __('Contato') }}</span></a>
                    </li>

                    <li class="btn btn-primary mr-3" type="button">
                        <a class="nav-link" href="{{ url('/') }}"><span style="font-weight: bold; color: black;">{{ __('Voltar') }}</span></a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card with-transitions">
                    <div class="card-header"><h4><span style="color: #4c110f">Noticia</span></h4>
                        <div class="row">
                            <?php
                            $iconVoltar = '<i class="fas fa-angle-double-left"></i>';
                            ?>
                            {!! \Bootstrapper\Facades\Button::primary($iconVoltar.'  Voltar')->asLinkTo(route('noticias.index')) !!}

                        </div>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered">

                            <tbody style="border: hidden">
                            <tr>
                                <h3 style="font-weight: bold">{{ $publication->titulo }}</h3>
                            </tr>
                            <tr>
                                <h6 style="font-weight: bold" ><span>{{ $publication->resumo }}</span></h6>
                            </tr>
                            <tr>
                                <div align="center">{{ Html::image('storage/publications/'.$publication->id.'/'.$publication->imagem, 'ícone', ['class' => 'mr-3 mb-3', 'height' => '200']) }}</div>
                            </tr>
                            <tr>
                                <p style="text-align: justify"><?php echo nl2br($publication->texto); ?></p>
                            </tr>
                            <tr>
                                <td>
                                    <blockquote class="blockquote text-right">
                                        <footer class="blockquote-footer"><small>
                                            Fonte: <cite title="Fonte" style="font-weight: bold">{{ $publication->fonte }}</cite>
                                            / Data Publicação: <cite title="Data Publicação"> <?php echo date('d-m-Y', strtotime($publication->data)); ?></cite>
                                            / Ult. Atualização: <cite title="Última Atualização"><?php echo date('d-m-Y', strtotime($publication->atualizada)); ?></cite>
                                            </small></footer>
                                    </blockquote>
                                </td>
                            </tr>
                            </tbody>

                        </table>
                        <div class="row" style="width: 180px;">
                            <div class="col">
                                <!-- Your share button code -->
                                <div class="fb-share-button"
                                     data-href="https://smartenem.com.br/noticias/show/{{ $publication->id }}"
                                     data-layout="button" data-size="small">
                                </div>
                            </div>
                            <div class="col" style="float: right">
                                <a href="" id="whatsapp-share-btt" rel="nofollow" target="_blank">{{ Html::image('/image/whatsapp-icon.png', 'whatsapp', ['height' => '40']) }}</a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
</div>
</body>
</html>