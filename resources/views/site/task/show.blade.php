@extends('layouts.site')

@section('content')

@php
  $titulo = 'Ficha do Task';
  $breadcrumb = Array();
  $breadcrumb[] = '<a href="'.route('site.pipeline.ficha',$pipe->token).'" >'.$pipe->pipeline.'</a>';  
  $breadcrumb[] = '<a href="'.route('site.action.ficha',$action->token).'" >'.$action->acao.'</a>';
  $botoes = Array();
  $botoes[] = '<a href="'.route('site.task.editar',$obj->token).'" >edit</a>';
  $botoes[] = '<span id="btexcluir">Delete</span>';
@endphp

@include('layouts.header', compact( 'titulo' ,'breadcrumb' ,'botoes'  ) )

<div id="ficha">
<table width=100%>
  <tr><th width=40%;>Pipeline</th><th width=40%;>Action</th><th width=20%;>Priority</th></tr>
  <tr><td data-label="Pipeline">{{$pipe->pipeline}}</td><td data-label="Action">{{$action->acao}}</td><td data-label="Priority">{{get_prioridade($obj->prioridade)}}</td></tr></table>
<table width=100%>
  <tr><th width=80%;>Task</th><th width=10%;  >Start Date</th><th  width=10%;  >Due Date</th></tr>
  <tr><td data-label="Task">{{$obj->tarefa}}</td><td data-label="Start Date">{{get_strdata($obj->dtinicio)}}</td><td data-label="Due Date">{{get_strdata($obj->dtentrega)}}</td></tr></table>
<table width=100%>
  <tr><th width=100%;>Instructions</th></tr>
  <tr><td style="" data-label="Instructions">{!! nl2br($obj->instrucao) !!}</td></tr>
</table>
</div>

@endsection

@section('script')

<script src="{{ asset('js/zebra-dialog/zebra_dialog.min.js') }}"></script>

<script type="text/javascript">

    $("#btexcluir").click( function() {
     new $.Zebra_Dialog("Confirm to delete the task ?", {
      auto_focus_button: $("body.materialize").length ? false : true,
      type: "question",
      buttons: [
        {caption: "No", callback: function() { }},
        {caption: "Yes", callback: function() { $( location ).attr("href","{{ route('site.task.excluir',$obj->token) }}"); }}
      ]
      });
    });

</script>

@endsection