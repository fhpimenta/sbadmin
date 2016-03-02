<?php
namespace App\Http\Controllers\Saf;
use App\Http\Controllers\Controller;
use App\Models\Funcao;
use App\Models\Pessoa;
use DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pessoa = new Pessoa();
        $quantPessoas = $pessoa->all()->count();

        $funcao = new Funcao();
        $arrQuant = $funcao->quantByFuncao();
        //dd($arrQuant);
        return view('dashboard.index', ['quantPessoas' => $quantPessoas,'arrQuant' => $arrQuant]);
    }
}