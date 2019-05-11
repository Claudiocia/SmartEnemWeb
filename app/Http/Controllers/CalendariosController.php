<?php

namespace SmartEnem\Http\Controllers;

use Illuminate\Http\Request;
use SmartEnem\Models\Evento;
use SmartEnem\Repositories\EventoRepository;

class CalendariosController extends Controller
{
    /**
     * @var EventoRepository
     */
    private $repository;

    /**
     * CalendariosController constructor.
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
        $eventos = $this->repository->orderBy('ordem_mes', 'ASC')->all();
        return view('calendarios.index', compact('eventos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        return view('calendarios.show', compact('evento'));
    }

}
