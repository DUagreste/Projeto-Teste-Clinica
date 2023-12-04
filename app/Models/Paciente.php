<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    // Define os campos que podem ser preenchidos.
    protected $fillable = ['nome', 'cpf'];

    // Define uma relação "um para muitos" com o modelo Exame.
    public function exames()
    {
        return $this->hasMany(Exame::class);
    }

    // Define uma relação "um para muitos" com o modelo Ordem.
    public function ordems() {
        return $this->hasMany(Ordem::class);
    }
}
