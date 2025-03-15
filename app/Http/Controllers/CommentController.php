<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Property;

class CommentController extends Controller
{
    public function store(Request $request, Property $property)
    {
        $request->validate([
            'content' => 'required|string|max:500',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'property_id' => $property->id,
            'content' => $request->content,
            'rating' => $request->rating,
        ]);

        return back()->with('success', 'Comentario agregado correctamente.');
    }
}
