@extends('layouts.main')

@section('titulo', 'Lista de livros')

@section('conteudo')

<a href="/"><-Voltar</a>

<?php
    if ($livros->isEmpty()) {
        echo "<p style='color:red;'>Nenhum livro encontrado</p>";
    }
?>

<h1>Livros</h1>

<h2>filtros</h2>

<form action="/lista/filtrar" method="get">
    @csrf
    <label for="titulo">Título:</label>
    <input type="text" name="titulo">
    <br>
    <label for="data_inicial">Data inicial:</label>
    <input type="date" name="data_inicial">
    <br>
    <label for="data_final">Data final:</label>
    <input type="date" name="data_final">
    <br>
    <label for="genero">Gênero:</label>
    <select name="genero">
        <option value="">Sem filtro</option>
        <option value="Ação">Ação</option>
        <option value="Clássico">Clássico</option>
        <option value="Drama">Drama</option>
        <option value="Ficção">Ficção</option>
        <option value="Mistério">Mistério</option>
        <option value="Romance">Romance</option>
    </select>
    <br>
    <label for="autor">Autor:</label>
    <input type="text" name="autor">
    <br>
    <input type="submit" value="filtrar">
</form>

@foreach ($livros as $livro)

    <div onclick="mostrarInfo(this)">
       
        <h2 style="font-size: 20px;" >--{{$livro->titulo}}</h2>

        <p class="escondido" style="display:none;">
            <strong>Lançamento:</strong> {{ $livro->lançamento }}
            <strong>Gênero:</strong> {{ $livro->genero }}  
            <strong>Autor:</strong> {{ $livro->autor }}
            <strong>Páginas:</strong> {{ $livro->paginas }}
        </p>

        <div style="display:flex;">
            <form class="escondido" style="display: none;" action="/deletar/{{$livro->id}}" method="post">
                @csrf
                <input type="submit" value="deletar">
            </form>

            <form class="escondido" style="display: none;" action="atualizar/{{$livro->id}}" method="get">
                @csrf
                <input type="submit" value="atualizar">
            </form>
        </div>

    </div>
    <br> 

@endforeach

<script>
    function mostrarInfo(div) {
        var infos = div.getElementsByClassName("escondido");
        for (var i = 0; i < infos.length; i++) {
            if (infos[i].style.display === "none") {
                infos[i].style.display = "block";
            } else {
                infos[i].style.display = "none";
            }
        }
    }
</script>
