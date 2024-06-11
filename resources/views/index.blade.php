<h1>Listagem De Produtos<h1>

@@foreach ($produtos as $produto)
    <div class='produto'>
        <h2>{{ $produto->nome|e('html')}}</h2>    
        <p>{{ $produto->descricao }}</p>
        <p>Preço: R$ {{ $produto->preco }}</p>
        <a href="{{ route('produtos.show', $produto->id) }}">Ver Detalhes</a>
        <a href="{{ route('produtos.edit', $produto->id) }}">Editar</a>
        <form action="{{ route('produtos.destroy', $produto->id)}}" method="post">
            @csrf
            @method('delete')
            <button type='submit'>Excluir</button>
        </form>
    </div> 
@endforeach

<a href="{{ route('produtos.create')}}">Criar novo produto</a>






