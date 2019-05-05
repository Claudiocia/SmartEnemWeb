@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card with-transitions">
                    <div class="card-header"><h4>Evento <span style="color: #4c110f">{{$evento->titulo}}</span></h4>
                    <div class="row">
                    <?php
                        $iconEdit = '<i class="fas fa-edit"></i>';
                        $iconDelete = '<i class="fas fa-times"></i>';
                        $iconVoltar = '<i class="fas fa-angle-double-left"></i>';

                        $formDelete = \Kris\LaravelFormBuilder\Facades\FormBuilder::plain([
                            'id' => 'form-delete',
                            'route' => ['admin.eventos.destroy' , 'evento' => $evento->id],
                            'method' => 'DELETE',
                            'style' => 'display:none'
                        ]);
                    ?>
                    {!! \Bootstrapper\Facades\Button::primary($iconEdit.'  Editar')->asLinkTo(route('admin.eventos.edit', ['evento' => $evento->id])) !!}
                        &nbsp;&nbsp;
                    {!! \Bootstrapper\Facades\Button::danger($iconDelete.'  Deletar')
                                ->asLinkTo(route('admin.eventos.destroy', ['evento' => $evento->id]))
                                ->addAttributes(['onclick' => 'event.preventDefault();document.getElementById("form-delete").submit();'])
                   !!}
                        &nbsp;&nbsp;
                    {!! \Bootstrapper\Facades\Button::primary($iconVoltar.'  Voltar')->asLinkTo(route('admin.eventos.index')) !!}
                        {!! form($formDelete) !!}
                    </div>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered">

                            <tbody>
                            <tr>
                                <th scope="row">Id</th>
                                <td>{{ $evento->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Título</th>
                                <td>{{ $evento->titulo }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Data Início</th>
                                <?php if ($evento->inicio == null){
                                    $inicio = 'Data a ser definida';
                                }else {
                                    $inicio = date('d-m-Y', strtotime($evento->inicio));
                                }  ?>
                                <td>{{ $inicio }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Final</th>
                                <?php if ($evento->final == null){
                                    $final = 'Data a ser definida';
                                }else {
                                    $final = date('d-m-Y', strtotime($evento->final));
                                }  ?>
                                <td>{{ $final }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Descrição</th>
                                <td><?php echo nl2br($evento->resumo); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Status</th>
                                <td>{{ $evento->status }}</td>
                            </tr>

                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
