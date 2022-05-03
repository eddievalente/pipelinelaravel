@extends('layouts.site')

@section('content')

@php
  $titulo = 'Pipelines';
  $breadcrumb = Array();
  $botoes = Array();
  $rota = route('site.pipeline.novo');
  $botoes[] = '<a href="'.$rota.'" >new pipeline</a>';
@endphp

@include('layouts.header', compact( 'titulo' ,'breadcrumb' ,'botoes'  ) )

<div id=dashboard>
<div id=fullpanel style="height: calc( 80vh - 150px );"><table class=listapipe>

@forelse ($lista as $pipe)
  <tr><td class=pipeline colspan=3 width=65% >{{$pipe->ordem}} &bull; <a href="{{ route('site.pipeline.ficha',['id' => $pipe->token]) }}" >{{$pipe->pipeline}}</a></td>
  <td class=pipeline width=35%><table style="width:100%; border: 0;"><tr>
  {!! get_schedule_title() !!}
  </tr></table></td>
  </tr>
  @php
    $lista_actions = $pipe->actions();
  @endphp
  @foreach( $lista_actions as $action )
    @php
      $lista_task = $action->tasks();
      $q_task = count($lista_task);
    @endphp
    @if ( $q_task == 0 )
      <tr>
      <td class=acao width=18% >{{$pipe->ordem}}.{{$action->ordem}} &bull; <a href="{{ route('site.action.ficha',['id' => $action->token]) }}" >{{$action->acao}}</a></td>
      <td class=tarefa width=82% colspan=3>&nbsp;</td>
      </tr>
    @else
      <tr>
      <td class=acao width=18% rowspan={{$q_task}} >{{$pipe->ordem}}.{{$action->ordem}} &bull; <a href="{{ route('site.action.ficha',['id' => $action->token]) }}" >{{$action->acao}}</a></td>
      @foreach( $lista_task as $task )
        @php
          $idtask = $task->id_task;
          $o_task = $task->ordem;
          $t_token = $task->token;
          $instrucao = $task->instrucao;
          $dtinicio = $task->dtinicio;
          $dtentrega = $task->dtentrega;
          $progresso = $task->progresso;
          $indicador = $task->indicador;
          $prioridade = $task->prioridade;
          $dtentrega_str = get_strdata($dtentrega);
          if ( empty($dtentrega_str) ) $dtentrega_str = 'N/I';
          $cor_prioridade = get_prioridade_cor($prioridade);
          $prioridade_str = get_prioridade($prioridade);
          $prioridade_str = '<span class=prioridade_tag style="border: solid 1px '.$cor_prioridade.';">'.$prioridade_str.'</span>';
          $progresso_str = get_str_progresso($dtinicio,$progresso,$indicador);
          $icone = '<icone class="icon fa-bolt" style="background: '.$cor_prioridade.'; margin:0; display: block; float: right; "></icone>';
          if ( $progresso < 100 ) $icone = '<a href="'.route('site.task.progresso',['id' => $task->token]).'" title="Inform Progress">'.$icone.'</a>';
        @endphp 
        <td width=35% class=tarefa><a href="{{ route('site.task.ficha',['id' => $task->token]) }}" >{{$task->tarefa}}</a></td>
        <td width=12% class=tarefa><b>{!! $dtentrega_str !!}{!!$icone!!}</b><br/>{!! $prioridade_str !!}</td>
        <td width=35% class=dia><table style="width:100%; border: 0;">
          <tr>{!! get_schedule($dtinicio,$dtentrega,$prioridade) !!}</tr>
          <tr><td style="border:0; padding: 5px 0 0 0;" colspan=20>{!! $progresso_str !!}</td></tr>
        </table></td>
        </tr>
      @endforeach
    @endif
  @endforeach
@empty
  <span class=msg_info>CREATE YOUR FIRST PIPELINE!</span>
@endforelse
    
</table></div>
</div>

@endsection