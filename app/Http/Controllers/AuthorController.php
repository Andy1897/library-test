<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $authors = Author::all();

        return view('admin.authors.index', ['authors' => $authors]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.authors.create');
    }

    /**
     * @param AuthorRequest $request
     * @return RedirectResponse
     */
    public function store(AuthorRequest $request): RedirectResponse
    {

        Author::create([
            'name' => $request->name
        ]);

        session()->flash('status', 'Автор успешно добавлен');
        return redirect()->route('admin.authors.index');
    }

    /**
     * @param Author $author
     * @return Application|Factory|View
     */
    public function edit(Author $author)
    {
        return view('admin.authors.edit', ['author' => $author]);
    }

    /**
     * @param Request $request
     * @param Author $author
     * @return RedirectResponse
     */
    public function update(Request $request, Author $author): RedirectResponse
    {
        $request->validate([
            'name' => 'required'
        ]);

        $author->update([
            'name' => $request->name
        ]);

        session()->flash('status', 'Автор успешно обновлен');
        return redirect()->route('admin.authors.index');
    }

    /**
     * @param Author $author
     * @return RedirectResponse
     */
    public function destroy(Author $author): RedirectResponse
    {
        $author->delete();
        session()->flash('status', 'Автор удален');

        return redirect()->route('admin.authors.index');
    }
}
