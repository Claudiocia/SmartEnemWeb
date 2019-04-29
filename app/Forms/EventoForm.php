<?php

namespace SmartEnem\Forms;

use Kris\LaravelFormBuilder\Form;

class EventoForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('inicio', 'date', [
                'label' => 'Início do Esvento',
            ])
            ->add('final', 'date', [
                'label' => 'Final'
            ])
            ->add('titulo', 'text', [
                'label' => 'Título',
                'rules' => 'required|max:255',
            ])
            ->add('texto', 'textarea', [
                'label' => 'Descrição',
                'rules' => 'required'
            ])
            ->add('resumo', 'text', [
                'label' => 'Resumo',
                'rules' => 'max:255'
            ])
            ->add('publicada', 'checkbox', [
                'label' => 'Publicar',
                'values' => 1,
                'checked' => false
            ])
            ->add('atualizada', 'checkbox', [
                'label' => 'Atualizada',
                'values' => 1,
                'checked' => false
            ])
            ->add('status', 'text', [
                'label' => 'Status',
                'rules' => 'required'
            ])
            ->add('imagem', 'text', [
                'label' => 'Upload'
            ])
            ->add('tag', 'text', [
                'label' => 'Tags',
                'rules' => 'max:255'
            ]);
    }
}
