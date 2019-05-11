<?php

namespace SmartEnem\Forms;

use Illuminate\Support\Facades\Auth;
use Kris\LaravelFormBuilder\Form;
use SmartEnem\Models\Category;

class EventoForm extends Form
{
    public function buildForm()
    {
        $status = ['Aguardando início' => 'Aguardando início', 'Prazo vigente' => 'Prazo vigente',
            'Prazo encerrado' => 'Prazo encerrado', 'Últimos dias' => 'Últimos dias'];
        $month = ['Janeiro' =>'Janeiro', 'Fevereiro' => 'Fevereiro', 'Março' =>'Março', 'Abril' => 'Abril',
                  'Maio' => 'Maio', 'Junho' => 'Junho', 'Julho' =>'Julho', 'Agosto' => 'Agosto',
                  'Setembro' => 'Setembro', 'Outubro' => 'Outubro', 'Novembro' => 'Novembro', 'Dezembro' => 'Dezembro' ];
        $id = Auth::user()->id;
        $this
            ->add('user_id', 'hidden', [
                'label' => 'Autor da Publicação',
                'value' =>  $id,
            ])
            ->add('year', 'text', [
                'label' => 'Ano do Enem (yyyy)',
                'rules' => 'required|digits:4'
            ])
            ->add('month', 'select', [
                'label' => 'Mês do evento',
                'choices' => $month,
                'empty_value' => 'Selecione...',
                'rules' => 'required'
            ])
            ->add('ordem_mes', 'text', [
                'label' => 'Ordem do evento',
                'rules' => 'required|digits:2'
            ])
            ->add('inicio', 'date', [
                'label' => 'Início do evento',
            ])
            ->add('final', 'date', [
                'label' => 'Final do evento'
            ])
            ->add('status', 'select', [
                'label' => 'Status',
                'choices' => $status,
                'empty_value' => 'Selecione...',
                'rules' => 'required'
            ])
            ->add('category_id', 'entity', [
                'class' => Category::class,
                'property' => 'name',
                'label' => 'Categoria',
                'empty_value' => 'Selecione...',
                'rules' => 'required|exists:categories,id'
            ])
            ->add('titulo', 'text', [
                'label' => 'Título',
                'rules' => 'required|max:255',
            ])
            ->add('resumo', 'text', [
                'label' => 'Resumo',
                'rules' => 'max:255'
            ])
            ->add('publicada', 'select', [
                'label' => 'Ativar publicação',
                'choices' => ['0' => 'Não Publicar', '1' => 'Publicar'],
                'empty_value' => 'Selecione...',
                'rules' => 'required'
            ])
            ->add('atualizada', 'date', [
                'label' => 'Última atualização',
            ])
            ->add('tag', 'text', [
                'label' => 'Tags',
                'rules' => 'max:255'
            ]);
    }
}
