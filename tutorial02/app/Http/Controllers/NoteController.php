<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Http\Controllers\Controller;
use App\Http\Requests\NoteStoreRequest;
use App\Http\Requests\NoteUpdateRequest;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::latest()->paginate(5);

        return view("notes.index", compact("notes"))->with("maxNotes", (request()->input("page", 1) * 5));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("notes.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NoteStoreRequest $request)
    {
        Note::create($request->validated());

        return redirect()->route("notes.index")->with("success", "Nota criada com sucesso.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        return view("notes.show", compact("note"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        return view("notes.edit", compact("note"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NoteUpdateRequest $request, Note $note)
    {
        $note->update($request->validated());

        return redirect()->route("notes.index")->with("success", "Nota alterada com sucesso.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->route("notes.index")->with("success", "Nota apagada com sucesso.");
    }
}