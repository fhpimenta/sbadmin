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
        return $this->belongsToMany('App\Models\Funcao', 'pessoas_funcoes','pessoas_id', 'funcoes_id');
    }

    public function endereco()
    {
        return $this->hasOne('App\Models\Endereco', 'pessoas_id');
    }

    public function telefones()
    {
        return $this->hasMany('App\Models\Telefone', 'pessoas_id');
    }

    public function quant()
    {
        $quant = $this->all()->count();

        return $quant;
    }

}