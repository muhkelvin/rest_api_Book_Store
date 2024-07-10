<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function index()
    {
        return BookResource::collection(Book::paginate(10));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',

        ]);

        try {
            $book = Book::create([
                'title' => $request->title,
                'slug' => strtolower(Str::slug($request->title . '-'. Str::random(5))),
                'author' => $request->author,
                'description' => $request->description,
                'price' => $request->price,
                'category_id' => $request->category_id,
            ]);

            return response()->json([
                'message' => 'Book created successfully',
                'book' => new BookResource($book),
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create book',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function show(Book $book)
    {
        return new BookResource($book);
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        try {
            // Update hanya kolom yang ada di permintaan, lainnya gunakan nilai yang ada
            $book->update([
                'title' => $request->input('title', $book->title),
                'slug' => strtolower(Str::slug($request->input('title', $book->title) . '-'. Str::random(5))),
                'author' => $request->input('author', $book->author),
                'description' => $request->input('description', $book->description),
                'price' => $request->input('price', $book->price),
                'category_id' => $request->input('category_id', $book->category_id),
            ]);

            return response()->json([
                'message' => 'Book updated successfully',
                'book' => new BookResource($book),
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update book',
                'error' => $e->getMessage(),
            ], 400);
        }
    }


    public function destroy(Book $book)
    {
        try {
            $book->delete();

            return response()->json([
                'message' => 'Book deleted successfully',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete book',
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}
