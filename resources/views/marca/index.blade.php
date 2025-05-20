<x-layouts.app :title="__('Marcas')">
  <head>
      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>
  <div>
    <div>
      <h1>Marcas</h1>
      <a href="{{ route('marca.create') }}">+ Nova Marca</a>
    </div>

    @if($marcas->isEmpty())
      <p>Nenhuma marca foi cadastrada.</p>
    @else
      <table border="1" cellpadding="8" cellspacing="0">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach($marcas as $marca)
            <tr>
              <td>{{ $marca->id }}</td>
              <td>{{ $marca->nome }}</td>
              <td>
                <a href="{{ route('marca.show', $marca) }}">Ver</a>
                |
                <a href="{{ route('marca.edit', $marca) }}">Editar</a>
                |
                <form action="{{ route('marca.destroy', $marca) }}" method="POST" style="display:inline" onsubmit="return confirm('Tem certeza que deseja excluir esta marca?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit">Excluir</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
</x-layouts.app>
