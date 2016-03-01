<?php
namespace App\Http\Controllers\Saf;
use App\Http\Controllers\Controller;
use App\Models\Pessoa;

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

        $quantPessoas = $pessoa->quant();

        return view('dashboard.index', ['quantPessoas' => $quantPessoas]);
    }
}