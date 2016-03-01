<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PessoaFuncao extends Model
{

    protected $table = "pessoas_funcoes";

    protected $fillable = ['pessoas_id', 'funcoes_id'];

    public $timestamps = true;
}