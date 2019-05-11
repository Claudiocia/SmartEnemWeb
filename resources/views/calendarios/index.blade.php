@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card with-transitions">
                    <div class="card-header"><h4>Calendário</h4>
                        <div class="row" style="margin-left: 5px">
                        </div>
                    </div>

                    <div class="card-body">

                        <table class="table-striped">
                        @foreach($eventos as $evento)
                                    <thead>
                                    <tr>
                                        <th scope="colspan 3" style="font-size: 30px">
                                            {{ Html::image('/image/calendario_data.jpg', 'icone', ['height' => '40']) }}
                                            {!! $evento->month.' - '.$evento->year !!}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row" style="font-size: 15px">
                                            {{ $evento->titulo }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
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

                                                echo "<img src='".$img."' alt='icone' height='35px' />";
                                            ?>
                                             <?php

                                                    if (!$evento->inicio){
                                                        echo "Data a ser definida";
                                                    }else {
                                                        echo "De ".date('d-m', strtotime($evento->inicio))." até ".date('d-m', strtotime($evento->final));
                                                    }

                                                ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" colspan="3">Status {!! $evento->status !!}</th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <div style="height: 30px"></div>
                                        </th>
                                    </tr>
                                    </tbody>
                        @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
