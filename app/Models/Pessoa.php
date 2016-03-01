<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{

    protected $table = 'pessoas';

    protected $fillable = ['nome', 'email', 'cpf', 'data_nascimento'];

    public $timestamps = true;

    public function funcoes()
    {
        return $this->belongsToMany('App\Models\Funcao', 'pessoas_funcoes');
    }

    public function endereco()
    {
        return $this->hasOne('App\Models\Endereco');
    }

    public function telefones()
    {
        return $this->hasMany('App\Models\Telefone');
    }

    public function quant()
    {
        $quant = $this->all()->count();

        return $quant;
    }

}