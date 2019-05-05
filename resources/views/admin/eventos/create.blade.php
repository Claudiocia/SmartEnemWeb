@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card with-transitions">
                    <div class="card-header"><h4>Novo Evento</h4></div>
                    <div class="card-body">
                        <?php $icon = '<i class="fas fa-save"></i>'; ?>
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
