<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Note;
use App\Models\User;
use App\Services\Operations;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    public function index(Request $request): View
    {
        $id = session('user.id');

        $user = User::find($id)->toArray();
        
        $notes = User::find($id)
            ->notes()
            ->with('category')
            ->orderBy('updated_at', 'desc');

        if ($request->filled('category')) {
            $notes->where('id_category', Operations::decrypt($request->category));
        }

        $categoryNotes = Category::whereHas('notes', function ($e) use ($id) {
            $e->where('user_id', $id);
        })->get();

        $categorias = Category::all();

        $notes =  $notes->Paginate(7);
        
        return view('home', compact('categorias', 'notes', 'categoryNotes'));
    
    }

}
