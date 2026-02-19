<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsApiController extends Controller {
    public function index() {
        return News::latest()->get();
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable'
        ]);

        return News::create($data);
    }

    public function show($id) {
        return News::findOrFail($id);
    }

    public function update(Request $request, $id) {
        $news = News::findOrFail($id);
        $news->update($request->all());
        return $news;
    }

    public function delete($id) {
        News::findOrFail($id)->delete();
        return response()->json(['message' => 'Deleted']);
    }
}

