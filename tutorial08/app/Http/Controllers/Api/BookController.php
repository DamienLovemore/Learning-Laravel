<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livros = Book::all();

        //Se não encontrou nada retorna status 204 (sucesso porém não tem nada pra retornar)
        if(count($livros) === 0)
            return response()->json([], 204);
        else//Caso contrário retorna os dados e sucesso no status
            return response()->json($livros, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book = Book::create($request->all());

        //Returns a JSON with the new model data array and the created(201) status
        return response()->json($book, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);

        //Se não achar retorna status de erro, e informa que não encontrou
        if(!$book)
            return response()->json(["message" => __('Book not found')], 404);

        return $book;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::find($id);
        if(!$book)
            return response()->json(["message" => __("Book not found")]);

        //Atualiza o livro e retorna o status de sucesso junto com os dados dos novos campos
        $book->update($request->all());
        return response()->json($book, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        if(!$book)
            return response()->json(["message" => __("Book not found")]);

        //Apaga o livro e retorna o status de sucesso
        $book->delete();
        return response()->json(["message" => __("Book deleted")], 200);
    }
}
