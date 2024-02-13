<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class InsertLivrosIntoLivrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('livros')->insert([
            [
                'titulo' => 'Dom Quixote',
                'lançamento' => '1615-01-01',
                'genero' => 'Clássico',
                'autor' => 'Miguel de Cervantes',
                'paginas' => '863',
                'created_at' => '2024-02-12 16:52:02',
                'updated_at' => '2024-02-12 16:52:02'
            ],
            [
                'titulo' => 'Jogos Vorazes',
                'lançamento' => '2010-08-24',
                'genero' => 'Ficção',
                'autor' => 'Suzanne Collins',
                'paginas' => '400',
                'created_at' => '2024-02-12 16:52:02',
                'updated_at' => '2024-02-12 16:52:02'
            ],
            [
                'titulo' => 'Para todos os garotos que já amei',
                'lançamento' => '2017-05-02',
                'genero' => 'Romance',
                'autor' => 'Jenny Han',
                'paginas' => '320',
                'created_at' => '2024-02-12 16:52:02',
                'updated_at' => '2024-02-12 16:52:02'
            ],
            [
                'titulo' => 'Um de nós está mentindo',
                'lançamento' => '2021-12-07',
                'genero' => 'Mistério',
                'autor' => 'Karen M. McManus',
                'paginas' => '384',
                'created_at' => '2024-02-12 16:52:02',
                'updated_at' => '2024-02-12 16:52:02'
            ],
            [
                'titulo' => 'Divergente',
                'lançamento' => '2013-10-22',
                'genero' => 'Ação',
                'autor' => 'Veronica Roth',
                'paginas' => '502',
                'created_at' => '2024-02-12 16:52:02',
                'updated_at' => '2024-02-12 16:52:02'
            ]            
        ]);
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
