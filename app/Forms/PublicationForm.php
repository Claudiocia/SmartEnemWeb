<?php

namespace SmartEnem\Forms;

use Kris\LaravelFormBuilder\Form;
use SmartEnem\Models\Category;

class PublicationForm extends Form
{
    public function buildForm()
    {
        $id = \Auth::user()->id;
        $idPub = $this->getData('id');

        $rulesImagemFile = 'image|max:2048';
        //$rulesImagemFile = !$idPub ? "required|$rulesImagemFile" : $rulesImagemFile;

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
                'rules' => 'required|max:255'
            ])
            ->add('fonte', 'text', [
                'label' => 'Fonte',
                'rules' => 'required|max:255'
            ])
            ->add('data', 'date', [
                'label' => 'Data:',
                'rules' => 'required'
            ])
            ->add('tag', 'text', [
                'label' => 'Tags',
                'rules' => 'max:255'
            ])
            ->add('publicada', 'select', [
                'label' => 'Ativar publicação',
                'choices' => ['0' => 'Não Publicar', '1' => 'Publicar'],
                'empty_value' => 'Selecione...',
                'rules' => 'required'
            ])
            ->add('atualizada', 'date', [
                'label' => 'Ultima atualização'
            ])
            ->add('category_id', 'entity', [
                'class' => Category::class,
                'property' => 'name',
                'label' => 'Categoria',
                'empty_value' => 'Selecione...',
                'rules' => 'required|exists:categories,id'
            ])
            ->add('user_id', 'hidden', [
                'label' => 'Autor da Publicação',
                'value' =>  $id,
            ])
            ->add('imagem_file', 'file', [
                'required' => !$idPub ? true : false,
                'label' => 'Imagem da Publicação',
                'rules' => $rulesImagemFile
            ]);
    }
}
