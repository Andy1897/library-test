<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function list(): JsonResponse
    {
        $books = Book::get(['id', 'title', 'author_id'])->load(['author' => function ($query) {
            return $query->select(['id', 'name']);
        }]);

        return response()->json($books);
    }

    public function byId($id): JsonResponse
    {
        $book = Book::select(['id', 'title', 'author_id'])->findOrFail($id)->load(['author' => function ($query) {
            return $query->select(['id', 'name']);
        }]);

        return response()->json($book);
    }

    public function update(Request $request): JsonResponse
    {
        $book = Book::findOrFail($request->id);
        $book->update([
            'title' => $request->title,
            'author_id' => $request->author_id
        ]);

        return response()->json($book->only(['id', 'title', 'author_id']));
    }

    public function destroy($id): JsonResponse
    {
        Book::findOrFail($id)->delete();

        return response()->json(['status' => 'ok']);
    }
}
