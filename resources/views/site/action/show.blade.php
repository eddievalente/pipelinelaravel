@extends('layouts.site')

@section('content')

@php
  $lista = $obj->tasks();
  $max_ordem = count($lista);
  $titulo = 'Ficha do Action';
  $breadcrumb = Array();
  $breadcrumb[] = '<a href="'.route('site.pipeline.ficha',$pipe->token).'" >'.$pipe->pipeline.'</a>';  
  $botoes = Array();
  $botoes[] = '<a href="'.route('site.action.editar',$obj->token).'" >edit</a>';
  if ( $max_ordem == 0 ) $botoes[] = '<span id="btexcluir">Delete</span>';
@endphp

@include('layouts.header', compact( 'titulo' ,'breadcrumb' ,'botoes'  ) )

<div id="ficha">
  <table width=100%>
    <tr><th  width=45%;  >Pipeline</th><th  width=45%;  >Action</th><th  width=10%;  >Tasks</th></tr>
    <tr>
      <td style=""  data-label="Pipeline">{{ $pipe->pipeline }}</td>
      <td style=""  data-label="Action">{{ $obj->acao }}</td>
      <td style=""  data-label="Tasks">None</td>
    </tr></table>
  <table width=100%>
    <tr><th  width=100%;  >Info</th></tr>
    <tr>
      <td  style=""  data-label="Info">{!! nl2br($obj->info) !!}</td>
    </tr>
  </table>
</div>
<span class=divisor>
  <h1>Tasks</h1>
  <div class=botoeira>
    <span class=botao><a href="{{ route('site.task.novo',$obj->token) }}" >new task</a></span>
  </div>
</span>
<div class="rolagem" style="height:50vh;" >
  <div class="scroll" id="011BBD48-D183-7E9C-3828-9D6A1116EC89_scroll" >
  <table class=sticky> 
   <tr><th width="50%"  class=sticky>Task</th><th width="10%"  class=sticky>Due Date</th><th width="20%"  class=sticky>Priority</th><th width="15%"  class=sticky>Progress</th><th width="5%"  class=sticky>Options</th></tr>
  </table>
  <table id="011BBD48-D183-7E9C-3828-9D6A1116EC89" class=""> 
  <tbody id="011BBD48-D183-7E9C-3828-9D6A1116EC89_corpo" >
  <thead><tr><th width="50%" class=vazio></th><th width="10%" class=vazio></th><th width="20%" class=vazio></th><th width="15%" class=vazio></th><th width="5%" class=vazio></th></tr></thead>
  <tbody id="011BBD48-D183-7E9C-3828-9D6A1116EC89_corpo" >
  @foreach ( $lista as $item )
    @php
      $ico_up = '';
      $ico_down = '';
      if ( $item->ordem > 1 ) {
        $ico_up = '<a href="'.route('site.task.up',$item->token).'" ><span class="icofiltro fa-arrow-up"  style="color:#DAA520;" ></span></a>';
      } else {
        $ico_up = '<span class="icofiltro fa-arrow-up"  style="color:silver;" ></span>';
      }
      if ( $item->ordem < $max_ordem ) {
        $ico_down = '<a href="'.route('site.task.down',$item->token).'" ><span class="icofiltro fa-arrow-down"  style="color:#DAA520;" ></span></a>';
      } else {
        $ico_down = '<span class="icofiltro fa-arrow-down"  style="color:silver;" ></span>';
      }
    @endphp
    <tr>
      <td>{{$pipe->ordem}}.{{$obj->ordem}}.{{$item->ordem}} &bull; <a href="{{ route('site.task.ficha',$item->token) }}" >{{$item->tarefa}}</a></td>
      <td>{{get_strdata($item->dtinicio)}}</td>
      <td>{{get_prioridade($item->prioridade)}}</td>
      <td>{{get_progresso($item->progresso)}}</td>
      <td style=" text-align:center;" >{!!$ico_up!!}{!!$ico_down!!}</td>
    </tr>
  @endforeach
  </tbody>
  </table></div>
</div>
 
<div id="dialog" title="Basic dialog" style="display:none;" >
  <p>This is the default dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the &apos;x&apos; icon.</p>
</div>

@endsection

@section('script')

<script src="{{ asset('js/zebra-dialog/zebra_dialog.min.js') }}"></script>

<script type="text/javascript">

    $("#btexcluir").click( function() {
     new $.Zebra_Dialog("Confirm to delete the action ?", {
      auto_focus_button: $("body.materialize").length ? false : true,
      type: "question",
      buttons: [
        {caption: "No", callback: function() { }},
        {caption: "Yes", callback: function() { $( location ).attr("href","{{ route('site.action.excluir',$obj->token) }}"); }}
      ]
      });
    });

</script>

@endsection
