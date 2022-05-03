@extends('layouts.site')

@section('content')

@php
  $titulo = 'Edit Task';
  $breadcrumb = Array();
  $breadcrumb[] = '<a href="'.route('site.pipeline.ficha',$pipe->token).'" >'.$pipe->pipeline.'</a>';
  $breadcrumb[] = '<a href="'.route('site.action.ficha',$action->token).'" >'.$action->acao.'</a>';
  $botoes = Array();
@endphp

@include('layouts.header', compact( 'titulo' ,'breadcrumb' ,'botoes'  ) )

<div id="formulario" >
  <form action="{{route('site.task.editconfirma')}}" method="POST" class="form" enctype="multipart/form-data" id="FRMF7A48BC4E7638ACFAD04D740A04C2D86">
  @csrf      
  @method('PUT')
  <fieldset>
    <input type="hidden" name="id_pipeline" value="{{$pipe->id_pipeline}}"/>
    <input type="hidden" name="id_acao" value="{{$action->id_acao}}"/>
    <input type="hidden" name="token" value="{{$obj->token}}"/>
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
    <div class="campo  larg_100" >
      <span class="etiqueta" id="tarefa_lb" >Task</span>
      <span class="controle"><input name="tarefa" type="text" id="tarefa" value="{{$obj->tarefa}}"  maxlength=100 /></span>
    </div>
    <div class="campo  larg_100" >
      <span class="etiqueta" id="instrucao_lb" >Instructions</span>
      <span class="controle"><textarea class=normal name="instrucao" id="instrucao" rows=10 width=100% >{{$obj->instrucao}}</textarea></span>
     </div>
  </fieldset>
  <div class=botoeira>
    <button type="button" name="cancelar" class=cancelar value="Cancelar" onclick="location.href='{{route('site.task.ficha',$obj->token)}}'">Cancel</button>
    <button type="submit" name="ok" class=ok value="ok" >OK</button>
  </div>
  </form>
</div>

@endsection