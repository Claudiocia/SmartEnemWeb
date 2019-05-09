<?php

namespace SmartEnem\Http\Controllers;

use Illuminate\Http\Request;
use SmartEnem\Models\Publication;
use SmartEnem\Repositories\PublicationRepository;

class NoticiasController extends Controller
{
    /**
     * @var PublicationRepository
     */
    private $repository;

    /**
     * NoticiasController constructor.
     * @param PublicationRepository $repository
     */
    public function __construct(PublicationRepository $repository)
    {
        /** @var TYPE_NAME $repository */
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publications = $this->repository->orderBy('data', 'DESC');
        return view('noticias.index', compact('publications'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication)
    {
        return view('noticias.show', compact('publication'));
    }

    public function thumbAsset(Publication $publication)
    {
        return response()->download($publication->thumb_path);
    }

    public function thumbSmallAsset(Publication $publication)
    {
        return response()->download($publication->thumb_small_path);
    }
}
