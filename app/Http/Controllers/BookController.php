<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $auther = $request->query('auther');
        $books = Book::byAuther($auther)->get();
        return response()->json($books , 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validatedData = $request->validate([
          'title' => 'required|string|max:255',
          'auther' => 'required|string|max:255',
          'description' => 'nullable|string|max:255',
       ]);
       $book = Book::create($validatedData);
       return response()->json($book,201);
    }
    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json(null,204);
    }
}
