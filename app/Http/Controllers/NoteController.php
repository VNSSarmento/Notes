<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Services\Operations;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {   
        
        /* $notes = Note::with('User')
            ->where('id_user', session('user.id'))
            ->get(); */
}

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'category' => 'required|string',
                'title' => 'required|string',
                'content' => 'required|string|min:10'
            ],
            [
                'category.required' => 'Insira a categoria da sua nota',
                'title.required'    => 'Insira o título da sua nota',
                'content.required'  => 'Insira o conteúdo da sua nota',
                'content.min' => 'o conteúdo precisa ter mais de :max caracteres'
                //se eu quiser colocar um validador apara caracter, eu posso colocar => 'a quatidade de caracter tem que ser no minimo :min caracteres' 
                //esse min: vai trazer a quantidade que ta la em cima EX 'required|string|min: 30
            ]
        );

        $note = $validated;
        //quando eu faço $variavel['algo'] estou inserindo um index na variavel
        $note['user_id'] = session('user.id');
        $note['id_category'] = $request->input('category');

        Note::create($note);

        return redirect()->back()->with('success', 'Nota criada com sucesso!');
    }

    public function destroy($id)
    {
        $id = Operations::decrypt($id);
        
        $notes = Note::findOrFail($id);
        $notes->delete();

        return redirect()->route('home')->with('deleteNote', 'Nota excluida com sucesso!');

    }

    public function edit($id)
    {
        $note = Note::findOrFail($id);
        return response()->json(['note' => $note, 'category' => $note->id_category]);
     
    }

    public function update(Request $request,$id){
            
            $validated = $request->validate(
            [
                'category' => 'required|string',
                'title' => 'required|string',
                'content' => 'required|string|min:10'
            ],
            [
                'category.required' => 'Insira a categoria da sua nota',
                'title.required'    => 'Insira o título da sua nota',
                'content.required'  => 'Insira o conteúdo da sua nota',
                'content.min' => 'o conteúdo precisa ter mais de :max caracteres'
            ]
        );

        if(empty($id)){
            redirect()->route('home');
        };

        $note = Note::findOrFail($id);

        $noteUpdate = $validated;

        $note->update($noteUpdate);

        return redirect()->back()->with('noteUpdate','Sua nota foi atualizada com sucesso!');
    }

}
