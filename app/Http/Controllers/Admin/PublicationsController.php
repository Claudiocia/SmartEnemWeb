<?php

namespace SmartEnem\Http\Controllers\Admin;

use Illuminate\Support\Arr;
use SmartEnem\Forms\PublicationForm;
use SmartEnem\Models\Publication;
use Illuminate\Http\Request;
use SmartEnem\Http\Controllers\Controller;
use SmartEnem\Repositories\PublicationRepository;

class PublicationsController extends Controller
{
    /**
     * @var PublicationRepository
     */
    private $repository;

    /**
     * PublicationsController constructor.
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
        $publications = $this->repository->orderBy('data', 'DESC')->paginate();
        return view('admin.publications.index', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = \FormBuilder::create(PublicationForm::class, [
            'url' => route('admin.publications.store'),
            'method' => "POST"
        ]);

        return view('admin.publications.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = \FormBuilder::create(PublicationForm::class);

        if (!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        $data['imagem'] = env('NO_IMAGE', 'icone.png');
        $this->repository->create($data);

        $request->session()->flash('msg', 'Publicação criada com Sucesso!!');
        return redirect()->route('admin.publications.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \SmartEnem\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication)
    {
        return view('admin.publications.show', compact('publication'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \SmartEnem\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit(Publication $publication)
    {
        $form = \FormBuilder::create(PublicationForm::class, [
            'url' => route('admin.publications.update', ['publication' => $publication]),
            'method' => "PUT",
            'model' => $publication,
            'data' => ['id' => $publication->id]
        ]);

        return view('admin.publications.edit', compact('form'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SmartEnem\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $form = \FormBuilder::create(PublicationForm::class, [
            'data' => ['id' => $id]
        ]);

        if (!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = Arr::except($form->getFieldValues(), 'imagem');
        $this->repository->update($data, $id);
        $request->session()->flash('msg', 'Publicação alterada com sucesso!');
        return redirect()->route('admin.publications.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SmartEnem\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->repository->delete($id);
        $request->session()->flash('msg', 'Publicação excluída com sucesso.');
        return redirect()->route('admin.publications.index');
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
