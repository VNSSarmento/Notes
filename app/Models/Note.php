<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    /** @use HasFactory<\Database\Factories\NoteFactory> */
    use HasFactory;

        protected $fillable = [
        'id_category',
        'title',
        'content',
        'user_id',
    ];

    public function diferencaDeDIas(){
        return $this->created_at->diffInDays(now());
    }

    public function user(){
       return $this->belongsTo(User::class,'id_user');
    }

    public function category (){
        return $this->belongsTo(Category::class,'id_category');
    }
}