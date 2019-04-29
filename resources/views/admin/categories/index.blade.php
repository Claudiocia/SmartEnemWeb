@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <h4>Listagem de Categorias</h4>
    </div>
    <div class="row">
        {!! \Bootstrapper\Facades\Button::primary('Nova Categoria')->asLinkTo(route('admin.categories.create')) !!}
    </div>
    <div class="row">
        <br>
    </div>
    <div class="row">
        {!! Table::withContents($categories->items())->striped()
            ->callback('Ações', function ($field, $category){
                $linkEdit = route('admin.categories.edit', ['category' => $category->id]);
                $linkShow = route('admin.categories.show', ['category' => $category->id]);
                return \Bootstrapper\Facades\Button::LINK('<i class="fas fa-pencil-alt"></i>')->asLinkTo($linkEdit).'|'.
                       \Bootstrapper\Facades\Button::LINK('<i class="fas fa-times"></i>')->asLinkTo($linkShow);
            })
        !!}
    </div>
    {!! $categories->links() !!}
</div>
@endsection
