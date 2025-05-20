<x-layouts.app :title="__('Editar Aparelho Elétrico')" :dark-mode="auth()->user()->pref_dark_mode">
  <head>
      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>
  <div>
    <h1>Editar Aparelho Elétrico</h1>

    <form action="{{ route('aparelho_eletrico.update', $aparelho_eletrico) }}" method="POST">
      @csrf
      @method('PUT')

      <div>
        <label for="marca">Marca</label><br>
        <input
          type="number"
          name="marca"
          id="marca"
          value="{{ old('marca', $aparelho_eletrico->marca) }}"
          required
        >
      </div>

      <div style="margin-top:1em;">
        <label for="codigo">Código</label><br>
        <input
          type="text"
          name="codigo"
          id="codigo"
          maxlength="30"
          value="{{ old('codigo', $aparelho_eletrico->codigo) }}"
          required
        >
      </div>

      <div style="margin-top:1em;">
        <label for="nome">Nome</label><br>
        <input
          type="text"
          name="nome"
          id="nome"
          value="{{ old('nome', $aparelho_eletrico->nome) }}"
          required
        >
      </div>

      <div style="margin-top:1em;">
        <label for="potencia">Potência (W)</label><br>
        <input
          type="number"
          name="potencia"
          id="potencia"
          value="{{ old('potencia', $aparelho_eletrico->potencia) }}"
        >
      </div>

      <div style="margin-top:1em;">
        <label for="voltagem_minima">Voltagem Mínima</label><br>
        <input
          type="number"
          name="voltagem_minima"
          id="voltagem_minima"
          value="{{ old('voltagem_minima', $aparelho_eletrico->voltagem_minima) }}"
        >
      </div>

      <div style="margin-top:1em;">
        <label for="voltagem_maxima">Voltagem Máxima</label><br>
        <input
          type="number"
          name="voltagem_maxima"
          id="voltagem_maxima"
          value="{{ old('voltagem_maxima', $aparelho_eletrico->voltagem_maxima) }}"
        >
      </div>

      <div style="margin-top:1em;">
        <label for="corrente_maxima_entrada">Corrente Máxima de Entrada (A)</label><br>
        <input
          type="number"
          name="corrente_maxima_entrada"
          id="corrente_maxima_entrada"
          step="0.01"
          value="{{ old('corrente_maxima_entrada', $aparelho_eletrico->corrente_maxima_entrada) }}"
        >
      </div>

      <div style="margin-top:1em;">
        <button type="submit">Atualizar</button>
        <a href="{{ route('aparelho_eletrico.show', $aparelho_eletrico) }}">Cancelar</a>
      </div>
    </form>
  </div>
</x-layouts.app>
