@extends('layouts.site')

@section('content')

@php
  $lista = $obj->actions();
  $max_ordem = count($lista);
  $titulo = 'Ficha do Pipeline';
  $breadcrumb = Array();
  $botoes = Array();
  $botoes[] = '<a href="'.route('site.pipeline.editar',$obj->token).'" >edit</a>';
  if ( $max_ordem == 0 ) $botoes[] = '<span id="btexcluir">Delete</span>';
@endphp

@include('layouts.header', compact( 'titulo' ,'breadcrumb' ,'botoes'  ) )

<div id="ficha">
  <table width=100%>
    <tr><th  width=90%;  >Pipeline</th><th  width=10%;  >Actions</th></tr>
    <tr>
      <td data-label="Pipeline">{{ $obj->pipeline }}</td>
      <td data-label="Actions">{{ $max_ordem }}</td>
    </tr>
  </table>
  <table width=100%>
    <tr><th  width=100%;  >Info</th></tr>
    <tr>
      <td  style=""  data-label="Info">{!! nl2br($obj->info) !!}</td>
    </tr>
  </table>
</div>
<span class=divisor>
  <h1>Actions</h1>
  <div class=botoeira>
    <span class=botao><a href="{{ route('site.action.novo',$obj->token) }}" >new action</a></span>
  </div>
</span>
<div class="rolagem" style="height:30vh;" >
  <div class="scroll" id="8C9BD691-0861-9C1C-EFF8-B65FB2383D36_scroll" >
    <table class=sticky> 
      <tr><th width="85%"  class=sticky>Action</th><th width="10%"  class=sticky>Tasks</th><th width="5%"  class=sticky>Options</th></tr>
    </table>
    <table id="8C9BD691-0861-9C1C-EFF8-B65FB2383D36" class=""> 
      <tbody id="8C9BD691-0861-9C1C-EFF8-B65FB2383D36_corpo" >
      <thead><tr><th width="85%" class=vazio></th><th width="10%" class=vazio></th><th width="5%" class=vazio></th></tr></thead>
      <tbody id="8C9BD691-0861-9C1C-EFF8-B65FB2383D36_corpo" >

  @foreach ( $lista as $item )
    @php
      $ico_up = '';
      $ico_down = '';
      if ( $item->ordem > 1 ) {
        $ico_up = '<a href="'.route('site.action.up',$item->token).'" ><span class="icofiltro fa-arrow-up"  style="color:#DAA520;" ></span></a>';
      } else {
        $ico_up = '<span class="icofiltro fa-arrow-up"  style="color:silver;" ></span>';
      }
      if ( $item->ordem < $max_ordem ) {
        $ico_down = '<a href="'.route('site.action.down',$item->token).'" ><span class="icofiltro fa-arrow-down"  style="color:#DAA520;" ></span></a>';
      } else {
        $ico_down = '<span class="icofiltro fa-arrow-down"  style="color:silver;" ></span>';
      }
    @endphp
    <tr>
      <td>{{$obj->ordem}}.{{$item->ordem}} &bull; <a href="{{ route('site.action.ficha',$item->token) }}" >{{$item->acao}}</a></td>
      <td>{{count($item->tasks())}}</td>
      <td style=" text-align:center;" >{!!$ico_up!!}{!!$ico_down!!}</td>
    </tr>
  @endforeach      
      </tbody>
    </table>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


@endsection

@section('script')

<script src="{{ asset('js/zebra-dialog/zebra_dialog.min.js') }}"></script>

<script type="text/javascript">

    $("#btexcluir").click( function() {
     new $.Zebra_Dialog("Confirm to delete the pipeline ?", {
      auto_focus_button: $("body.materialize").length ? false : true,
      type: "question",
      buttons: [
        {caption: "No", callback: function() { }},
        {caption: "Yes", callback: function() { $( location ).attr("href","{{ route('site.pipeline.excluir',$obj->token) }}"); }}
      ]
      });
    });

</script>

@endsection
