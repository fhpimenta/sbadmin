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

        $idsFuncoes = DB::table('funcoes')->select('id')->get();

        dd($idsFuncoes);

        return view('dashboard.index', ['quantPessoas' => $quantPessoas]);
    }
}