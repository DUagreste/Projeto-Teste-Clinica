<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordem extends Model
{
    use HasFactory;

    // Define os campos que podem ser preenchidos.
    protected $fillable = ['paciente_id'];


    // Define relação pertence-a-um com o model "Paciente" usando o campo "paciente_id".
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

}
