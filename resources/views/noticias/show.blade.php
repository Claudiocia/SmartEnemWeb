@extends('layouts.public')

@section('content')
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

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
