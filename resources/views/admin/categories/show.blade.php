@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card with-transitions">
                    <div class="card-header"><h4>Categoria <span style="color: #4c110f">{{$category->name}}</span></h4>
                    <div class="row">
                    <?php
                        $iconEdit = '<i class="fas fa-edit"></i>';
                        $iconDelete = '<i class="fas fa-times"></i>';
                        $iconVoltar = '<i class="fas fa-angle-double-left"></i>';

                        $formDelete = \Kris\LaravelFormBuilder\Facades\FormBuilder::plain([
                            'id' => 'form-delete',
                            'route' => ['admin.categories.destroy' , 'category' => $category->id],
                            'method' => 'DELETE',
                            'style' => 'display:none'
                        ]);
                    ?>
                    {!! \Bootstrapper\Facades\Button::primary($iconEdit.'  Editar')->asLinkTo(route('admin.categories.edit', ['category' => $category->id])) !!}
                        &nbsp;&nbsp;
                    {!! \Bootstrapper\Facades\Button::danger($iconDelete.'  Deletar')
                                ->asLinkTo(route('admin.categories.destroy', ['category' => $category->id]))
                                ->addAttributes(['onclick' => 'event.preventDefault();document.getElementById("form-delete").submit();'])
                   !!}
                        &nbsp;&nbsp;
                    {!! \Bootstrapper\Facades\Button::primary($iconVoltar.'  Voltar')->asLinkTo(route('admin.categories.index')) !!}
                        {!! form($formDelete) !!}
                    </div>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered">

                            <tbody>
                            <tr>
                                <th scope="row">Id</th>
                                <td>{{ $category->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Nome</th>
                                <td>{{ $category->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Criado em</th>
                                <td>{{ $category->created_at }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Alterado em</th>
                                <td>{{ $category->updated_at }}</td>
                            </tr>

                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
