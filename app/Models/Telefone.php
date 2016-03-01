<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{

    protected $table = 'telefones';

    protected $fillable = ['pessoas_id', 'numero', 'tipo'];

    public $timestamps = true;

    public function pessoa()
    {
        return $this->belongsTo('App\Models\Pessoa');
    }
}