@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card with-transitions">
                    <div class="card-header"><h4>Calendário</h4>
                    </div>

                    <div class="card-body">
                        <ul class="list-unstyled">
                            @foreach($eventos as $evento)
                                <hr style="height: 2px; color: #f6993f">
                                <li class="media">
                                    {{ Html::image('/image/calendario_data.jpg', 'icone', [ 'class' => 'mr-3 mb-3', 'height' => '35']) }}
                                    <div class="media-body">
                                        <h4 class="mt-0 mb-1">{!! $evento->month.' - '.$evento->year !!}</h4>
                                        <h5>{{ $evento->titulo }}</h5>
                                        <p>
                                            <?php
                                            switch ($evento->status){
                                                case 'Aguardando início':
                                                    $img = '/image/calendario_br.jpg';
                                                    break;
                                                case 'Prazo vigente':
                                                    $img = '/image/calendario_np.jpg';
                                                    break;
                                                case 'Prazo encerrado':
                                                    $img = '/image/calendario_en.jpg';
                                                    break;
                                                case 'Últimos dias':
                                                    $img = '/image/calendario_fp.jpg';
                                                    break;
                                            }

                                            echo "<img class='imgevento' src='".$img."' alt='icone' height='35px'/>";
                                            ?>
                                            <?php

                                            if (!$evento->inicio){
                                                echo "Data a ser definida";
                                            }else {
                                                echo "De ".date('d-m', strtotime($evento->inicio))." até ".date('d-m', strtotime($evento->final));
                                            }

                                            ?></p>
                                        <p class="resumo">->{!! $evento->resumo !!}</p>
                                        <blockquote class="blockquote-footer text-left">
                                            Status: <cite title="Status" style="font-weight: bold">{!! $evento->status !!}</cite>
                                        </blockquote>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
