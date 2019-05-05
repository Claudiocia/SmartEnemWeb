@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card with-transitions">
                    <div class="card-header"><h4><span style="color: #4c110f">Noticia</span></h4>
                        <div class="row">
                            <?php
                            $iconEdit = '<i class="fas fa-edit"></i>';
                            $iconDelete = '<i class="fas fa-times"></i>';
                            $iconVoltar = '<i class="fas fa-angle-double-left"></i>';

                            $formDelete = \Kris\LaravelFormBuilder\Facades\FormBuilder::plain([
                                'id' => 'form-delete',
                                'route' => ['admin.publications.destroy' , 'publication' => $publication->id],
                                'method' => 'DELETE',
                                'style' => 'display:none'
                            ]);
                            ?>
                            {!! \Bootstrapper\Facades\Button::primary($iconEdit.'  Editar')->asLinkTo(route('admin.publications.edit', ['publication' => $publication->id])) !!}
                            &nbsp;&nbsp;
                            {!! \Bootstrapper\Facades\Button::danger($iconDelete.'  Deletar')
                                        ->asLinkTo(route('admin.publications.destroy', ['publication' => $publication->id]))
                                        ->addAttributes(['onclick' => 'event.preventDefault();document.getElementById("form-delete").submit();'])
                           !!}
                            &nbsp;&nbsp;
                            {!! \Bootstrapper\Facades\Button::primary($iconVoltar.'  Voltar')->asLinkTo(route('admin.publications.index')) !!}
                            {!! form($formDelete) !!}
                        </div>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered">

                            <tbody style="border: hidden">
                            <tr>
                                <h3 style="font-weight: bold">{{ $publication->titulo }}</h3>
                            </tr>
                            <tr>
                                <h5><span>{{ $publication->resumo }}</span></h5>
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
