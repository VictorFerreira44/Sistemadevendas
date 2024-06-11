<h1>{{ $produto->nome }}</h1>

<p>Descrição: {{ $produto->descricao }}</p>
<p>Preço: R$ {{ $produto->preco }}</p>

<a href="{{ route('produtos.edit', $produto->id)}}">Editar</a>
<form action="{{ route('produtos.destroy', $produto->id)}}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">Excluir</button>
</form>