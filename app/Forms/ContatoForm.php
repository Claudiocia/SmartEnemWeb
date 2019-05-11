<?php

namespace SmartEnem\Forms;

use Kris\LaravelFormBuilder\Form;

class ContatoForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('nome', 'text',[
                'label' => 'Seu nome',
                'rules' => 'required|max:60'
            ])
            ->add('emailcli', 'email', [
                'label' => 'Seu email',
                'rules' => 'required|email'
            ])
            ->add('ass', 'text', [
                'label' => 'Assunto',
                'rules' => 'required|max:60'
            ])
            ->add('msg', 'textarea', [
                'label' => 'Sua Mensagem',
                'rules' => 'required|max:2000'
            ]);
    }
}
