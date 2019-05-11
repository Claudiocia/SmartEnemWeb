<?php

namespace SmartEnem\Http\Controllers;


use Illuminate\Support\Facades\Mail;
use SmartEnem\Forms\ContatoForm;
use SmartEnem\Mail\SendMailable;
use SmartEnem\Models\Mensagem;

class ContactosController extends Controller
{
    /**
     * @var Mensagem
     */
    private $name;


    /**
     * ContactosController constructor.
     */
    public function __construct(Mensagem $name)
    {
        $this->name = $name;
    }

    public function index()
    {
        $form = \FormBuilder::create(ContatoForm::class, [
            'url' => route('send.email'),
            'method' => 'POST'
        ]);
        return view('contatos.index', compact('form'));
    }

    public function resp(){
        return view('contatos.resp');
    }


    /**
     * @param Mensagem $name
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function mail()
    {
        $form = \FormBuilder::create(ContatoForm::class);
        if (!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $name= $form->getFieldValues();

        Mail::to(env('EMAIL_TO_ADRESS', 'c2sequipe@gmail'))->send(new SendMailable($name));

        return view('contatos.resp');


    }

}
