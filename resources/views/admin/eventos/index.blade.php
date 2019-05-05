@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <h4>Listagem de Eventos</h4>
    </div>
    <div class="row" style="margin-bottom: 1em">
        {!! \Bootstrapper\Facades\Button::primary('Novo Evento')->asLinkTo(route('admin.eventos.create')) !!}
    </div>
    <div class="row">
        {!! Table::withContents($eventos->items())->striped()
            ->callback('Ações', function ($field, $evento){
                $linkEdit = route('admin.eventos.edit', ['evento' => $evento->id]);
                $linkShow = route('admin.eventos.show', ['evento' => $evento->id]);
                return \Bootstrapper\Facades\Button::LINK('<i class="fas fa-pencil-alt"></i>')->asLinkTo($linkEdit).'|'.
                       \Bootstrapper\Facades\Button::LINK('<i class="fas fa-times"></i>')->asLinkTo($linkShow);
            })
        !!}
    </div>
    {!! $eventos->links() !!}
</div>
@endsection
