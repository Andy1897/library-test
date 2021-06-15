<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class BookController extends Controller
{
    protected $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $books = $this->book->all()->load('author');

        return view('admin.books.index', ['books' => $books]);
    }

    /**
     * @return Application|Factory|View|RedirectResponse
     */
    public function create()
    {
        $authors = Author::all();

        if ($authors->count() == 0) {
            return redirect()->back()->with('error', 'Необходимо добавить автора');
        }

        return view('admin.books.create', ['authors' => $authors]);
    }

    /**
     * @param BookRequest $request
     * @return RedirectResponse
     */
    public function store(BookRequest $request): RedirectResponse
    {
        $this->book->create($request->validated());

        return response()->redirectToRoute('admin.books.index')->with('status', 'Книга успешно создана');
    }

    /**
     * @param Book $book
     * @return Application|Factory|View
     */
    public function edit(Book $book)
    {
        $authors = Author::all();

        return view('admin.books.edit', ['book' => $book, 'authors' => $authors]);
    }

    /**
     * @param BookRequest $request
     * @param Book $book
     * @return RedirectResponse
     */
    public function update(BookRequest $request, Book $book): RedirectResponse
    {
        $book->update($request->validated());

        return redirect()->route('admin.books.index')->with('status', 'Книга успешно обновлена');
    }

    /**
     * @param Book $book
     * @return RedirectResponse
     */
    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();

        return redirect()->route('admin.books.index')->with('status', 'Книга удалена');
    }
}
