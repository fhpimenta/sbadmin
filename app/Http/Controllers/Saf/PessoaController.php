<?php
namespace App\Http\Controllers\Saf;
use App\Http\Controllers\Controller;
use App\Http\Requests\PessoaPostRequest;
use App\Models\Endereco;
use App\Models\Funcao;
use App\Models\Pessoa;
use App\Models\PessoaFuncao;
use DB;
use App\Models\Telefone;
use Laracasts\Flash\Flash;
use Symfony\Component\HttpFoundation\Request;

class PessoaController extends Controller
{

    public function getCreate()
    {
        $funcoes = Funcao::lists('funcao','id');
        return view('pessoa.create', ['funcoes' => $funcoes]);
    }

    public function postCreate(PessoaPostRequest $request)
    {
        DB::beginTransaction();
        try{

            $dataPessoa = [
                'nome' => strtoupper($request->input('nome')),
                'email' => !empty($request->input('email')) ? $request->input('email') : null,
                'cpf' => str_replace(['.', '-'], '', $request->input('cpf')),
                'data_nascimento' => $request->input('data_nascimento')
            ];
            //dd($dataPessoa);
            $pessoa = Pessoa::create($dataPessoa);

            $dataEndereco = [
                'pessoas_id' => $pessoa->id,
                'rua' => $request->input('rua'),
                'numero' => !empty($request->input('numero')) ? $request->input('numero') : 's/n',
                'cep' => $request->input('cep'),
                'bairro' => $request->input('bairro')
            ];

            Endereco::create($dataEndereco);

            foreach($request->input('telefones') as $value) {
                $dataTelefone = [
                    'pessoas_id' => $pessoa->id,
                    'numero' => $value
                ];

                Telefone::create($dataTelefone);
            }

            foreach($request->input('funcoes') as $value) {
                $dataFuncao = [
                    'pessoas_id' => $pessoa->id,
                    'funcoes_id' => $value
                ];

                PessoaFuncao::create($dataFuncao);
            }

            DB::commit();

            Flash::success('Pessoa cadastrada com sucesso!');
            return redirect('/');
        }catch(\Exception $e) {
            DB::rollback();
            Flash::error('Ocorreu um erro ao cadastrar a pessoa');
            return redirect('/pessoas/cadastrar');
        }
    }

    public function getPessoas(Request $request)
    {
        $funcoes = [
            'associados' => array(
                'id' => 1,
                'title' => 'Associados'
            ),
            'doadores' => array(
                'id' => 2,
                'title' => 'Doadores'
            ),
            'clubedolivro' => array(
                'id' => 3,
                'title' => 'Participantes do Clube do Livro'
            ),
            'prestadores' => array(
                'id' => 4,
                'title' => 'Prestadores de Serviços'
            )
        ];

        $uri = $request->path();

        $pessoas = DB::table('pessoas AS p')
                            ->join('pessoas_funcoes AS pf', 'p.id', '=', 'pf.pessoas_id')
                            ->join('funcoes AS f', 'f.id', '=', 'pf.funcoes_id')
                            ->select('p.*')
                            ->where('f.id', '=', $funcoes[$uri]['id'])
                            ->get();
        if(empty($pessoas)){
            $pessoas = null;
        }

        return view('pessoa.table', ['title' => $funcoes[$uri]['title'], 'pessoas' => $pessoas]);
    }

    public function getEdit($id)
    {
        $pessoa = Pessoa::find((int)$id);
        $funcoes = Funcao::lists('funcao','id');

        $options = array();
        //foreach($pessoa->funcoes as )

        return view('pessoa.edit', ['pessoa' => $pessoa, 'funcoes' => $funcoes]);
    }

    public function delete($id)
    {
        $id = (int)$id;

        $pessoa = Pessoa::find($id);
        $pessoa->delete();

        Flash::success('Pessoa deletada com sucesso!');
        return redirect()->back();
    }
}