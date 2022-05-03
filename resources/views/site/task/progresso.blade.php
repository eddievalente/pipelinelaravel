@extends('layouts.site')

@section('content')

@php
  $titulo = 'Inform Task Progress';
  $breadcrumb = Array();
  $breadcrumb[] = '<a href="'.route('site.pipeline.ficha',$pipe->token).'" >'.$pipe->pipeline.'</a>';
  $breadcrumb[] = '<a href="'.route('site.action.ficha',$action->token).'" >'.$action->acao.'</a>';
  $botoes = Array();
@endphp

@include('layouts.header', compact( 'titulo' ,'breadcrumb' ,'botoes'  ) )

<div id="ficha">
  <table width=100%><tr><th width=100%; >Pipeline</th></tr><tr><td data-label="Pipeline">{{$pipe->pipeline}}</td></tr></table>
  <table width=100%><tr><th width=100%; >Action</th></tr><tr><td data-label="Action">{{$action->acao}}</td></tr></table>
  <table width=100%><tr><th width=100%; >Task</th></tr><tr><td data-label="Task">{{$obj->tarefa}}</td></tr></table>
  <table width=100%><tr><th width=100%; >Instructions</th></tr><tr><td  style=""  data-label="Instructions">{!!nl2br($obj->instrucao)!!}</td></tr></table>
</div>
<div id="formulario" >
  <form action="{{route('site.task.progressoupdate')}}" method="POST" class="form" enctype="multipart/form-data" id="FRMF7A48BC4E7638ACFAD04D740A04C2D86">
  @csrf   
  @method('PUT')
  <fieldset>
    <input type="hidden" name="id_pipeline" value="{{$pipe->id_pipeline}}"/>
    <input type="hidden" name="id_acao" value="{{$action->id_acao}}"/>
    <input type="hidden" name="token" value="{{$obj->token}}"/>
    <input type="hidden" name="tarefa" value="{!!$obj->tarefa!!}"/>
    <input type="hidden" name="instrucao" value="{!!$obj->instrucao!!}"/>
    <div class="campo  larg_10" >
      <span class="etiqueta" id="dtinicio_lb" >Start Date</span>
      <span class="controle"><input type="date" name="dtinicio" id="dtinicio"value="{{$obj->dtinicio}}" autocomplete="off" /></span>
    </div>
    <div class="campo  larg_10" >
      <span class="etiqueta" id="dtentrega_lb" >Due Date</span>
      <span class="controle"><input type="date" name="dtentrega" id="dtentrega"value="{{$obj->dtentrega}}" autocomplete="off" /></span>
    </div>
    <div class="campo larg_30" ><span class="etiqueta" id="prioridade_lb" >Priority</span>
      <span class="controle">
        {!! get_vet_prioridade($obj->prioridade) !!}
      </span>
    </div>
    <div class="campo larg_25" ><span class="etiqueta" id="progresso_lb" >Percent Done</span>
      <span class="controle">
        {!! get_vet_progresso($obj->progresso) !!}
      </span>
    </div>
    <div class="campo larg_25" ><span class="etiqueta" id="indicador_lb" >Delivery Bias</span>
      <span class="controle">
        {!! get_vet_progresso_vies($obj->indicador) !!}
      </span>
    </div>
  </fieldset>
  <div class=botoeira>
    <button type="button" name="cancelar" class=cancelar value="Cancelar" onclick="location.href='{{route('site.task.ficha',$obj->token)}}'">Cancel</button>
    <button type="submit" name="ok" class=ok value="ok" >OK</button>
  </div>
  </form>
</div>

@endsection