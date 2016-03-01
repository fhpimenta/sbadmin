<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Funcao extends Model
{

    protected $table = 'funcoes';

    protected $fillable = ['funcao', 'descricao'];

    public $timestamps = true;

    public function pessoas()
    {
        return $this->belongsToMany('App\Models\Pessoa', 'pessoas_funcoes');
    }
}