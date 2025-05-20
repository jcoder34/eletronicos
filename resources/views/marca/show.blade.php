
  <div>
    <h1>{{ $marca->nome }}</h1>

    <p>{{ $marca->id }}</p>

    <div>
      <a href="{{ route('marca.create') }}">Cadastrar Marca</a>
      <a href="{{ url()->previous() }}">Voltar</a>
    </div>
  </div>