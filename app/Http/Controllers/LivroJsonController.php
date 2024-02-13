<?php 
namespace App\Http\Controllers;

use App\Models\Livro;
use App\Http\Resources\LivroResource;
use Illuminate\Http\Request;

class LivroJsonController{

    public function lista(){
        try{
            $livros = Livro::all();
            return response()->json([
                'message' => 'Livros encontrados',
                'results' => LivroResource::collection($livros),
            ])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
            } catch(\Exception $e){
            return response()->json(['erro' => 'Erro ao buscar livros'], 400);
        }
    }
    public function buscarLivro($id){
        try{
            $livro = Livro::find($id);
            return response()->json([
                'message' => 'Livro encontrado',
                'results' => new LivroResource($livro),
            ])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        } catch(\Exception $e){
            return response()->json(['erro' => 'Erro ao buscar livro'], 400);
        }
    }  

    public function adicionarLivro(Request $request){
        try {
            $dados = $request->all();
            $livro = Livro::create($dados);

            return response()->json(['message' => 'Livro adicionado com sucesso', 'livro' => new LivroResource($livro)], 200);
        }
        catch(\Exception $e){
            return response()->json(['erro' => 'Erro ao adicionar livro'], 400);
        }
    }

    public function deletar($id){
        try{
            $livro = Livro::find($id);
            $livro->delete();
            return response()->json(['message' => 'Livro deletado com sucesso'], 200);
        } catch(\Exception $e){
            return response()->json(['erro' => 'Erro ao deletar livro'], 400);
        }
    }

    public function atualizarLivro(Request $request){
        try{
            $livro = Livro::find($request->id);
            $livro->titulo = $request->titulo;
            $livro->lançamento = $request->lançamento;
            $livro->genero = $request->genero;
            $livro->autor = $request->autor;
            $livro->paginas = $request->paginas;
            $livro->save();
            return response()->json(['message' => 'Livro atualizado com sucesso'], 200);
        } catch(\Exception $e){
            return response()->json(['erro' => 'Erro ao atualizar livro'], 400);
        }
    }
    

}

?>