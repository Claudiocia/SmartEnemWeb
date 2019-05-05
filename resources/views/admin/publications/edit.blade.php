@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card with-transitions">
                    <div class="card-header"><h4>Editar Noticia</h4>
                        <div class="row" style="margin-left: 5px">
                            <?php $iconVoltar = '<i class="fas fa-angle-double-left"></i>'; ?>
                            {!! \Bootstrapper\Facades\Button::primary($iconVoltar.'  Voltar')->asLinkTo(route('admin.publications.index')) !!}
                        </div>
                    </div>

                    <div class="card-body">
                        <?php $icon = '<i class="fas fa-edit"></i>'; ?>
                        {!!
                            form($form->add('salve', 'submit', [
                                'attr' => ['class' => 'btn btn-primary'],
                                'label' => $icon.'  Salvar',
                            ]))
                        !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
