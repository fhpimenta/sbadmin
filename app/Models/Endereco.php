<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{

    protected $table = 'endereco';

    protected $fillable = ['pessoas_id', 'rua', 'numero', 'cep', 'bairro'];

    public $timestamps = true;

    public function pessoa()
    {
        return $this->belongsTo('App\Models\Pessoa');
    }
}