<?php

namespace SmartEnem\Forms;

use Kris\LaravelFormBuilder\Form;

class PublicationForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('titulo', 'text', [
                'label' => 'Título',
                'rules' => 'required|max:255',
            ])
            ->add('texto', 'textarea', [
                'label' => '',
                'rules' => 'required'
            ])
            ->add('resumo', 'text', [
                'label' => 'Resumo',
                'rules' => 'max:255'
            ])
            ->add('fonte', 'text', [
                'label' => 'Fonte',
                'rules' => 'required|max:255'
            ])
            ->add('data', 'date', [
                'label' => 'Data:',
                'rules' => 'required'
            ])
            ->add('publicada', 'checkbox', [
                'label' => 'Publicar',
                'values' => 1,
                'checked' => false
            ])
            ->add('atualizada', 'date', [
                'label' => 'Ultima Tualização'
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
