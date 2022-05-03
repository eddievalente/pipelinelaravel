@extends('layouts.site')

@section('content')

@php
  $titulo = 'Create Pipeline';
  $breadcrumb = Array();
  $botoes = Array();
@endphp

@include('layouts.header', compact( 'titulo' ,'breadcrumb' ,'botoes'  ) )


<div id="formulario" >
  <form action="{{route('site.pipeline.novoconfirma')}}" method="POST" class="form" enctype="multipart/form-data" >
  @csrf
  <fieldset>
    <div class="campo  larg_100" >
      <span class="etiqueta" id="pipeline_lb" >Pipeline</span>
      <span class="controle"><input name="pipeline" type="text" id="pipeline" value="New Pipeline"  maxlength=100 /></span>
    </div>
    <div class="campo  larg_100" >
       <span class="etiqueta" id="info_lb" >Info</span>
       <span class="controle"><textarea class=normal name="info" id="info" rows=10 width=100% ></textarea></span>
     </div>
  </fieldset>
  <div class=botoeira>
    <button type="button" name="cancelar" class=cancelar value="Cancelar" onclick="location.href='{{route('site.home')}}'">Cancel</button>
    <button type="submit" name="ok" class=ok value="ok" >OK</button>
  </div>
  </form>
</div>


@endsection