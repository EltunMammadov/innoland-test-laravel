<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller {
    public function index() {
        $news = News::latest()->get();
        return view('news.index', compact('news'));
    }

    public function create() {
        return view('news.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        News::create($data);
        return redirect()->route('news.index');
    }

    public function edit(News $news) {
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, News $news) {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        $news->update($data);
        return redirect()->route('news.index');
    }

    public function delete(News $news) {
        $news->delete();
        return back();
    }
}
