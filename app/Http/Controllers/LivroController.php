<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Livro;

class LivroController extends Controller
{
    public function lista()
    {
        try
        {
            $livros = Livro::all();
        }
        catch (\Exception $e)
        {
            return redirect('/');
        }
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
        
        try
        {
            $livro->save();
        }
        catch (\Exception $e)
        {
            return redirect('/adicionar');
        }

        session()->flash('success', 'Livro adicionado com sucesso!');
        return redirect('/adicionar');
    }

    public function deletar($id)
    {
        try 
        {
            $livro = Livro::find($id);
            if ($livro) {
                $livro->delete();
            } else {
                throw new \Exception("Livro não encontrado");
            }
        }
        catch (\Exception $e)
        {
            return redirect('/lista');
        }
        
        return redirect('/lista');
    }
    
    public function atualizar($id)
    {
        try
        {
            $livro = Livro::findOrFail($id);
        }
        catch (\Exception $e)
        {
            return redirect('/lista');
        }

        return view('atualizar', ['livro' => $livro]);
    }

    public function atualizarLivro(Request $request)
    {
        $this->validar($request);
        try 
        {
            $livro = Livro::find($request->id); 
            if ($livro) {
                $livro->titulo = $request->titulo;
                $livro->lançamento = $request->lançamento;
                $livro->genero = $request->genero;
                $livro->autor = $request->autor;
                $livro->paginas = $request->paginas;
                $livro->save();
            } else {
                throw new \Exception("Livro não encontrado");
            }
        }
        catch (\Exception $e)
        {
            return redirect('/atualizar/'.$request->id)->with('error', 'Erro ao atualizar livro!');
        }
    
        session()->flash('success', 'Livro atualizado com sucesso!');
        return view('atualizar', ['livro' => $livro]);
    }
    
    public function filtrar(Request $request)
    {
        //$this->validar($request);

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
        
        try
        {
            $livros = $livros->get();
        }
        catch (\Exception $e)
        {
            return redirect('/lista');
        }

        return view('listaFiltrada', ['livros' => $livros]);
    }

    private function validar(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255|min:3',
            'lançamento' => 'required|date|before_or_equal:now',
            'genero' => 'required',
            'autor' => 'required|max:255|min:3|regex:/^[a-zA-Z\s]+$/',
            'paginas' => 'required|integer|min:1|max:9999',
        ]);
    }

}