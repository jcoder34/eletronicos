<x-layouts.app>
  <head>
      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>
  <div>
    <h1>{{ $marca->nome }}</h1>

    <p>{{ $marca->id }}</p>

    <div>
      <a href="{{ route('marca.create') }}">Cadastrar Marca</a>
      <a href="{{ url()->previous() }}">Voltar</a>
    </div>
  </div>
</x-layouts.app>
