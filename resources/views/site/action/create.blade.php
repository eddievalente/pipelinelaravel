@extends('layouts.site')

@section('content')

@php
  $titulo = 'Create Action';
  $breadcrumb = Array();
  $breadcrumb[] = '<a href="'.route('site.pipeline.ficha',$pipe->token).'" >Nome do Pipeline</a>';
  $botoes = Array();
@endphp

@include('layouts.header', compact( 'titulo' ,'breadcrumb' ,'botoes'  ) )

<div id="formulario" >
  <form action="{{route('site.action.novoconfirma')}}" method="POST" class="form" enctype="multipart/form-data" >
  @csrf
  <fieldset>
    <input type="hidden" name="id_pipeline" value="{{$pipe->id_pipeline}}"/>
    <div class="campo  larg_100" >
      <span class="etiqueta" id="pipeline_lb" >Pipeline</span>
      <span class="controle"><input name="acao" type="text" id="acao" value="New Action"  maxlength=100 /></span>
    </div>
    <div class="campo  larg_100" >
       <span class="etiqueta" id="info_lb" >Info</span>
       <span class="controle"><textarea class=normal name="info" id="info" rows=10 width=100% ></textarea></span>
     </div>
  </fieldset>
  <div class=botoeira>
    <button type="button" name="cancelar" class=cancelar value="Cancelar" onclick="location.href='{{route('site.pipeline.ficha',$pipe->token)}}'">Cancel</button>
    <button type="submit" name="ok" class=ok value="ok" >OK</button>
  </div>
  </form>
</div>

@endsection