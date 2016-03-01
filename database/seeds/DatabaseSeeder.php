<?php

use App\Models\Funcao;
use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->command->info("User Table Seeded");

        $this->call(FuncoesTableSeeder::class);
        $this->command->info("Funcoes Table Seeded");
    }
}

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $user = new User();

        $user->name = "Felipe Pimenta";
        $user->email = "fhpimenta12@gmail.com";
        $user->password = bcrypt('123456');

        $user->save();
    }
}

class FuncoesTableSeeder extends Seeder
{
    public function run()
    {
        // Funcao = Associado
        $funcao1 = new Funcao();
        $funcao1->funcao = "Associado";
        $funcao1->descricao = "É toda pessoa que deseja se tornar um membro, mediante pagamento de mensalidade";

        $funcao1->save();

        // Funcao = Doador
        $funcao2 = new Funcao();
        $funcao2->funcao = "Doador";
        $funcao2->descricao = "É toda pessoa que doa uma quantia em dinheiro, mas sem necessariante precisa está associado ao centro espirita";

        $funcao2->save();

        // Funcao = Clube do Livro
        $funcao3 = new Funcao();
        $funcao3->funcao = "Clube do Livro";
        $funcao3->descricao = "É toda pessoa que deseja se tornar participante do Clube do Livro";

        $funcao3->save();

        // Funcao = Prestador de Serviço
        $funcao4 = new Funcao();

        $funcao4->funcao = "Prestador de Serviços";
        $funcao4->descricao = "É toda pessoa que presta algum tipo de serviço ao Centro Espirita";

        $funcao4->save();
    }
}
