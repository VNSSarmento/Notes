<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Hamcrest\Description;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;

class NoteController extends Controller
{
    public function index(){
        $notes = Note::with('User')
                    ->where('id_user',session('user.id'))
                    ->get();
    }

     public function create(Request $request)
    {
        $validated = $request->validate(
            [
                'category' => 'required|string|max:20',
                'title' => 'required|string',
                'content' => 'required|string'
            ],
            [
                'category.required' => 'Insira a categoria da sua nota',
                'title.required'    => 'Insira o título da sua nota',
                'content.required'  => 'Insira o conteúdo da sua nota',
            ]
        );

        $note = $validated;
        //quando eu faço $variavel['algo'] estou inserindo um index na variavel
        $note['user_id'] = session('user.id');
        $note['id_category'] = $request->input('category');

        Note::create($note);

        return redirect()->back()->with('success', 'Nota criada com sucesso!');
    }

    public function destroy($id){
        try{
            
            $id = Crypt::decrypt($id);
        }
        catch(DecryptException $e){   
           return redirect()->route('home');
        }

        $note = Note::findOrFail($id);
        $note->delete();
        return redirect()->route('home')->with('deleteNote','Nota excluida com sucesso!');
    }
    
    public function edit($id){
        try{
            $id = Crypt::decrypt($id);
            
        }catch(DecryptException $e){
            
            return redirect()->route('home')->with('editNote','Nota Editada com sucesso!');
        }
    }
}
