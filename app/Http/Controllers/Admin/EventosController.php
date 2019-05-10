<?php

namespace SmartEnem\Http\Controllers\Admin;

use Illuminate\Http\Request;
use SmartEnem\Forms\EventoForm;
use SmartEnem\Http\Controllers\Controller;
use SmartEnem\Models\Evento;
use SmartEnem\Repositories\EventoRepository;

class EventosController extends Controller
{
    /**
     * @var EventoRepository
     */
    private $repository;

    /**
     * EventosController constructor.
     */
    public function __construct(EventoRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = $this->repository->orderBy('inicio', 'DESC')->paginate();
        return view('admin.eventos.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = \FormBuilder::create(EventoForm::class, [
            'url' => route('admin.eventos.store'),
            'method' => "POST"
        ]);

        return view('admin.eventos.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = \FormBuilder::create(EventoForm::class);

        if (!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }
        $data = $form->getFieldValues();
        $this->repository->create($data);

        $request->session()->flash('msg', 'Evento criado com sucesso!!');
        return redirect()->route('admin.eventos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Evento $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        return view('admin.eventos.show', compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Evento $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
        $form = \FormBuilder::create(EventoForm::class, [
            'url' => route('admin.eventos.update', [ 'evento' => $evento->id]),
            'method' => "PUT",
            'model' => $evento
        ]);

        return view('admin.eventos.edit', compact('form'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $form = \FormBuilder::create(EventoForm::class, [
            'data' => ['id' => $id]
        ]);

        if (!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }
        $data = $form->getFieldValues();
        $this->repository->update($data, $id);

        $request->session()->flash('msg', 'Evento alterado com suceso!!');
        return redirect()->route('admin.eventos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->repository->delete($id);
        $request->session()->flash('msg', 'Evento excluído com sucesso.');
        return redirect()->route('admin.eventos.index');
    }
}
