@extends('layouts.site')

@section('content')

@php
  $titulo = 'Edit Action';
  $breadcrumb = Array();
  $breadcrumb[] = '<a href="'.route('site.pipeline.ficha',$pipe->token).'" >'.$pipe->pipeline.'</a>';
  $botoes = Array();
@endphp

@include('layouts.header', compact( 'titulo' ,'breadcrumb' ,'botoes'  ) )

<div id="formulario" >
  <form action="{{route('site.action.editconfirma')}}" method="POST" class="form" enctype="multipart/form-data" >
  @csrf
  @method('PUT')
  <fieldset>
    <input type="hidden" name="id_pipeline" value="{{$pipe->id_pipeline}}"/>
    <input type="hidden" name="ordem" value="{{$obj->ordem}}"/>
    <input type="hidden" name="token" value="{{$obj->token}}"/>
    <div class="campo  larg_100" >
      <span class="etiqueta" id="pipeline_lb" >Action</span>
      <span class="controle"><input name="acao" type="text" id="acao" value="{{$obj->acao}}"  maxlength=100 /></span>
    </div>
    <div class="campo  larg_100" >
       <span class="etiqueta" id="info_lb" >Info</span>
       <span class="controle"><textarea class=normal name="info" id="info" rows=10 width=100% >{{$obj->info}}</textarea></span>
     </div>
  </fieldset>
  <div class=botoeira>
    <button type="button" name="cancelar" class=cancelar value="Cancelar" onclick="location.href='{{route('site.action.ficha',$obj->token)}}'">Cancel</button>
    <button type="submit" name="ok" class=ok value="ok" >OK</button>
  </div>
  </form>
</div>

@endsection