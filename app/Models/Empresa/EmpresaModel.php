<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'nome_fantasia',
        'cnpj',
        'endereco_comercial',
        'email',
        'telefone',
        'cidade',
        'estado',
        'ano_fundacao',
        'empregados',
        'descricao',
        'status_empresa',
    ];

    protected $table = 'empresa';
}
