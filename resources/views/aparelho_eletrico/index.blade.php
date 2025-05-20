<x-layouts.app :title="__('Aparelhos Elétricos')">
  <head>
      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>
  <div>
    <div>
      <h1>Aparelhos Elétricos</h1>
      <a href="{{ route('aparelho_eletrico.create') }}">Cadastrar Aparelho Elétrico</a>
    </div>

    @if($aparelhos_eletricos->isEmpty())
      <p>Nenhum aparelho elétrico cadastrado.</p>
    @else
      <table border="1" cellpadding="8" cellspacing="0">
        <thead>
          <tr>
            <th>Id</th>
            <th>Marca</th>
            <th>Código</th>
            <th>Nome</th>
            <th>Potência</th>
            <th>Voltagem Mínima</th>
            <th>Voltagem Máxima</th>
            <th>Corrente Máxima de Entrada</th>
          </tr>
        </thead>
        <tbody>
          @foreach($aparelhos_eletricos as $aparelho_eletrico)
            <tr>
              <td>{{ $aparelho_eletrico->id }}</td>
              <td>{{ $aparelho_eletrico->marca }}</td>
              <td>{{ $aparelho_eletrico->codigo }}</td>
              <td>{{ $aparelho_eletrico->nome }}</td>
              <td>{{ $aparelho_eletrico->potencia }}</td>
              <td>{{ $aparelho_eletrico->voltagem_minima }}</td>
              <td>{{ $aparelho_eletrico->voltagem_maxima }}</td>
              <td>{{ $aparelho_eletrico->corrente_maxima_entrada }}</td>
              <td>
                <a href="{{ route('aparelho_eletrico.show', $aparelho_eletrico) }}">Ver</a>
                |
                <a href="{{ route('aparelho_eletrico.edit', $aparelho_eletrico) }}">Editar</a>
                |
                <form action="{{ route('aparelho_eletrico.destroy', $aparelho_eletrico) }}" method="POST" style="display:inline" onsubmit="return confirm('Tem certeza que deseja excluir este aparelho?')">
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
