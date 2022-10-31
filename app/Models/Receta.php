<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;
protected $fillable=[
  'titulo','preparacion','ingredientes','imagen','categoria_id'
];
    //obtiene la categoria de la receta via FK
    public function categoria(){
      return $this->belongsTo(CategoriaReceta::class);
    }
    //obtiene la categoria del usuario via FK
    public function autor(){
      return $this->belongsTo(User::class, 'user_id');
    }
}
