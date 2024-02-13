<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Livro;

class LivroController extends Controller
{
    public function lista()
    {
        $livros = Livro::all(); 

        return view('lista', ['livros' => $livros]);
    }

    public function adicionar()
    {
        return view('adicionar');
    }

    public function inicial()
    {
        return view('inicial');
    }

    public function adicionarLivro(Request $request)
    {
        $this->validar($request);

        $livro = new Livro();

        $livro->titulo = $request->titulo;
        $livro->lançamento = $request->lançamento;
        $livro->genero = $request->genero;
        $livro->autor = $request->autor;
        $livro->paginas = $request->paginas;

        $livro->save();
        session()->flash('success', 'Livro adicionado com sucesso!');
        return redirect('/adicionar');
    }

    public function deletar($id)
    {
        $livro = Livro::find($id);
        $livro->delete();
        return redirect('/lista');
    }

    public function atualizar($id)
    {
        $livro = Livro::find($id);
        return view('atualizar', ['livro' => $livro]);
    }

    public function atualizarLivro(Request $request)
    {
        $this->validar($request);
        $livro = Livro::find($request->id);
        $livro->titulo = $request->titulo;
        $livro->lançamento = $request->lançamento;
        $livro->genero = $request->genero;
        $livro->autor = $request->autor;
        $livro->paginas = $request->paginas;

        $livro->save();
        session()->flash('success', 'Livro atualizado com sucesso!');
        return view('atualizar', ['livro' => $livro]);
    }

    public function filtrar(Request $request)
    {
        $this->validar($request);

        $livros = Livro::query();

        if ($request->titulo != null) {
            $livros = $livros->where('titulo', 'like', '%'.$request->titulo.'%');
        }
        
        if ($request->data_inicial != null) {
            $livros = $livros->where('lançamento', '>=', $request->data_inicial);
        }

        if ($request->data_final != null) {
            $livros = $livros->where('lançamento', '<=', $request->data_final);
        }

        if ($request->genero != null) {
            $livros = $livros->where('genero', $request->genero);
        }
        
        if ($request->autor != null) {
            $livros = $livros->where('autor', 'like', '%'.$request->autor.'%');
        }

        $livros = $livros->get();

        return view('lista', ['livros' => $livros]);
    }

    private function validar(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255|min:3',
            'lançamento' => 'required|date|before_or_equal:now',
            'genero' => 'required',
            'autor' => 'required|max:255|min:3|alpha',
            'paginas' => 'required|integer|min:1|max:9999',
        ]);
    }

}