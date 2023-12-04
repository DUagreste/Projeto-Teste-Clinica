<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exame extends Model
{
    use HasFactory;

    // Define os campos que podem ser preenchidos.
    protected $fillable = ['nome', 'tipo', 'paciente_id'];

    // Define uma relação muitos-para-muitos com o model Paciente.
    public function pacientes() {
        return $this->belongsToMany(Paciente::class);
    }

    // Define uma relação pertence-a-um com o model Ordem.
    public function ordems() {
        return $this->belongsTo(Ordem::class);
    }
}
