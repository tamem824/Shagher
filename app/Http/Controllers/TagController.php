<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',

            'types' => ['required', 'array']
        ]);

        Tag::create([
            'name' => $request->name,
            'types' => $request->types
        ]);


        return redirect()->route('admin.tags.index');
    }

    public function show(Tag $tag)
    {

        return view('admin.tags.show', compact('tag'));
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);

        return view('admin.tags.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'types' => 'required|array',
            'types.*' => 'string',
        ]);

        $tag->update([
            'name' => $request->name,
            'types' => $request->types,

        ]);

        return redirect()->route('admin.tags.index');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index');
    }
}
