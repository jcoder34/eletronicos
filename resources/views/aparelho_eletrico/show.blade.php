
  <div>
    <h1>{{ $aparelho_eletrico->nome }}</h1>
    <h2>Código: {{ $aparelho_eletrico->codigo }}</h2>

      <p>{{ $aparelho_eletrico->id }}</p>

      <p>Marca: {{ $aparelho_eletrico->marca }}</p>

      @if($aparelho_eletrico->potencia)
        <p>Potência (W): {{ $aparelho_eletrico->potencia }}</p>
      @endif
      @if($aparelho_eletrico->voltagem_minima)
        <p>Voltagem Mínima: {{ $aparelho_eletrico->voltagem_minima }}</p>
      @endif
      @if($aparelho_eletrico->voltagem_maxima)
        <p>Voltagem Máxima: {{ $aparelho_eletrico->voltagem_maxima }}</p>
      @endif
      @if($aparelho_eletrico->corrente_maxima_entrada)
        <p>Corrente Máxima de Entrada (A): {{ $aparelho_eletrico->corrente_maxima_entrada }}</p>
      @endif

    <div>
      <a href="{{ route('aparelho_eletrico.create') }}">Novo Aparelho Elétrico</a>
      <a href="{{ url()->previous() }}">Voltar</a>
    </div>
  </div>