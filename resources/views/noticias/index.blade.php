@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card with-transitions">
                    <div class="card-header"><h4>Ultimas Noticias</h4>
                        <div class="row" style="margin-left: 5px">
                        </div>
                    </div>

                    <div class="card-body">
                        <ul class="list-unstyled">


                            @foreach($publications as $publication)

                                <li class="media">
                                    {{ Html::image('storage/publications/'.$publication->id.'/'.$publication->imagem, 'ícone', ['class' => 'mr-3 mb-3', 'height' => '80']) }}
                                    <div class="media-body">
                                        <a class="pr-0 text-decoration-none" href="{{ route('noticias.show', ['publication' => $publication->id]) }}">
                                            <h5 class="mt-0 mb-1">{!! $publication->titulo !!}</h5></a>
                                        <p>{!! $publication->resumo !!}</p>
                                        <blockquote class="blockquote-footer text-right">
                                            <small>Data: <cite title="Data" style="font-weight: bold"><?php echo date('d-m-Y', strtotime($publication->data)); ?></cite></small>
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
