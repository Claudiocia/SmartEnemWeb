@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <h4>Listagem de Notícias</h4>
    </div>
    <div class="row" style="margin-bottom: 1em">
        {!! \Bootstrapper\Facades\Button::primary('Nova Publicação')->asLinkTo(route('admin.publications.create')) !!}
    </div>
    <div class="row">
        {!! Table::withContents($publications->items())->striped()
            ->callback('Descrição', function ($field, $publication){

                return \Bootstrapper\Facades\MediaObject::withContents(
                        [
                            'image' => $publication->thumb_small_asset,
                            'link' => '#',
                            'heading' => '&nbsp;&nbsp;'.$publication->titulo,
                            'body' => '&nbsp;&nbsp;&nbsp;&nbsp;'.$publication->resumo,
                        ]
                );
            })
            ->callback('Ações', function ($field, $publication){
                $linkEdit = route('admin.publications.edit', ['publication' => $publication->id]);
                $linkShow = route('admin.publications.show', ['publication' => $publication->id]);
                return \Bootstrapper\Facades\Button::LINK('<i class="fas fa-pencil-alt"></i>')->asLinkTo($linkEdit).'|'.
                       \Bootstrapper\Facades\Button::LINK('<i class="fas fa-times"></i>')->asLinkTo($linkShow);
            })
        !!}
    </div>
    {!! $publications->links() !!}
</div>
@endsection

@push('styles')
    <style type="text/css">

        media-body{
            width: auto;
        }

    </style>
@endpush
