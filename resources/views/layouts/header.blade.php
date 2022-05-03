<div class="breadcrumb">
  <span class=inicio>Personal Task Manager</span>
  <span class=divisor>&gt;</span><a href="{{route('site.home')}}" >My Tasks</a>
  @foreach ($breadcrumb as $link)
    <span class=divisor>&gt;</span>{!! $link !!}
  @endforeach
  <span class=divisor>&gt;</span><span class=texto>{{$titulo}}</span>
</div>
<div class=header>
  <div class=esquerda>{{$titulo}}</div>
  <div class=direita>&nbsp;</div>
  <div class=painel_botao>
    @foreach ($botoes as $botao)
      <span class=botao>{!! $botao !!}</span>
    @endforeach
  </div>      
</div>