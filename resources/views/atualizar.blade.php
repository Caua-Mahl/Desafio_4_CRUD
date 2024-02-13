@extends('layouts.main')

@section('titulo', 'Atualizar Livro')

@section('conteudo')

@if (session('success'))
    <div style="color:green;">
        {{ session('success') }}
    </div>
    <br>
@endif

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h1>Atualizar Livros</h1>

<form action="/atualizar/{{$livro->id}}" method="post">
    @csrf
    @method('put')

    <input type="hidden" name="id" value="{{$livro->id}}">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" value="{{$livro->titulo}}" required/>
    <br>
    <label for="lançamento">Lançamento:</label>
    <input type="date" name="lançamento" value="{{$livro->lançamento}}" required>
    <br>
    <label for="genero">Gênero:</label>
    <select name="genero" required id="genero">
        <option value="Ação">Ação</option>
        <option value="Clássico">Clássico</option>
        <option value="Drama">Drama</option>
        <option value="Ficção">Ficção</option>
        <option value="Mistério">Mistério</option>
        <option value="Romance">Romance</option>
    </select>
    <br>
    <label for="autor">Autor:</label>
    <input type="text" name="autor" value="{{$livro->autor}}" required>
    <br>
    <label for="paginas">Páginas:</label>
    <input type="number" name="paginas" value="{{$livro->paginas}}" required>
    <br>
    <input type="submit" value="Atualizar">
</form>
<br>
<a href="/lista">Voltar</a>

<script>
document.getElementById('genero').value = '{{$livro->genero}}';
</script>

@endsection

