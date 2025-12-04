<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {

        $id = session('user.id');

        $user = User::find($id)->toArray();

        $notes = User::find($id)
                    ->notes()
                    ->with('category')
                    ->orderBy('created_at','desc')
                    ->get();
        
        $categorias = Category::all();


        return view('home',compact('categorias','notes'));
    }


}
