@extends('layouts.main')

@section('titulo', 'Adicionar Livros')

@section('conteudo')

<h1>Adicionar Livros</h1>

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

<form action="/adicionar" method="post">
    @csrf
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" required>
    <br>
    <label for="lançamento">Lançamento:</label>
    <input type="date" name="lançamento" required>
    <br>
    <label for="genero">Gênero:</label>
    <select name="genero" required>
        <option value="Ação">Ação</option>
        <option value="Clássico">Clássico</option>
        <option value="Drama">Drama</option>
        <option value="Ficção">Ficção</option>
        <option value="Mistério">Mistério</option>
        <option value="Romance">Romance</option>
    </select>
    <br>
    <label for="autor">Autor:</label>
    <input type="text" name="autor" required>
    <br>
    <label for="paginas">Páginas:</label>
    <input type="number" name="paginas" required>
    <br>
    <input type="submit" value="Adicionar">
</form>
<br>
<a href="/">Voltar</a>

@endsection