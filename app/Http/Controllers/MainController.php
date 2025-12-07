<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $id = session('user.id');

        $user = User::find($id)->toArray();

        $notes = User::find($id)
            ->notes()
            ->with('category')
            ->orderBy('created_at', 'desc');


        if ($request->filled('category')) {
            $notes->where('id_category', $request->category);
        }

        $categoryNotes = Category::whereHas('notes', function ($e) use ($id) {
            $e->where('user_id', $id);
        })->get();

        $notes =  $notes->get();

        $categorias = Category::all();




        return view('home', compact('categorias', 'notes', 'categoryNotes'));
    }
}
