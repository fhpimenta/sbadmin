<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;

class Funcao extends Model
{

    protected $table = 'funcoes';

    protected $fillable = ['funcao', 'descricao'];

    public $timestamps = true;

    public function pessoas()
    {
        return $this->belongsToMany('App\Models\Pessoa', 'pessoas_funcoes', 'funcoes_id', 'pessoas_id');
    }

    public function quantByFuncao()
    {
        $idsFuncoes = DB::table($this->table)->select('id')->get();

        $funcoes = array();
        foreach($idsFuncoes as $obj)
        {
            $funcoes[] = DB::select('select f.id,f.funcao,count(pf.funcoes_id) as quant from '.$this->table.' as f inner join
                                    pessoas_funcoes as pf on f.id = pf.funcoes_id
                                    where f.id = ?', [$obj->id]);
        }
        return $funcoes;
    }
}