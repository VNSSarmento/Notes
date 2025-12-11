<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(Request $request){
        $validated = $request->validate([
            'nameCategory' => 'required|string|min:3'
        ],
        [
            'nameCategory.required' => 'Insira um nome para a nova categoria!',
            'nameCategory.min' => 'Nome da categoria tem que ter no minimo :min caracter'
        ]);

        $category['user_id'] = session('user.id');
        $category = $validated; 

        return Category::create();
    }
}
