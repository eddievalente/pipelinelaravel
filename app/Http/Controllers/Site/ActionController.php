<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pipeline;
use App\Models\Action;

class ActionController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
       $pipe = Pipeline::where('token',$id)->first();
       $obj = Action::where('token','xxx')->first();
       return view('site.action.create',['obj' => $obj, 'pipe' => $pipe]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $counts = Action::where('id_pipeline',$request->id_pipeline)->get();
      $total_counts = $counts->count();
      //
      $obj = Action::create($request->all());
      $obj->ordem = $total_counts + 1;
      $obj->token = md5($obj->id_acao);
      $obj->save();
      return redirect()->route('site.action.ficha',['id' => $obj->token]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $obj = Action::where('token',$id)->first();
       $pipe = Pipeline::where('id_pipeline',$obj->id_pipeline)->first();
       return view('site.action.show',['obj' => $obj, 'pipe' => $pipe]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $obj = Action::where('token',$id)->first();
       $pipe = Pipeline::where('id_pipeline',$obj->id_pipeline)->first();
       return view('site.action.edit',['obj' => $obj, 'pipe' => $pipe]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $params = $request->all();
      $obj = Action::where('token',$params["token"])->first();
      $obj->acao = $params["acao"];
      $obj->info = $params["info"];
      $obj->update();
      return redirect()->route('site.action.ficha',['id' => $obj->token]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $obj = Action::where('token',$id)->first();
      $pipe = Pipeline::where('id_pipeline',$obj->id_pipeline)->first();
      $ordem = $obj->ordem;
      $obj->delete();
      
      Action::where([['ordem','>',$ordem],['id_pipeline',$obj->id_pipeline]])->decrement('ordem');
      return redirect()->route('site.pipeline.ficha',['id' => $pipe->token]);
    }
    
    public function up($id)
    {
       $obj = Action::where('token',$id)->first();
       $pipe = Pipeline::where('id_pipeline',$obj->id_pipeline)->first();
       //
       $ordem = $obj->ordem;
       $nova_ordem = $ordem - 1;
       $n_obj = Action::where([['ordem',$nova_ordem],['id_pipeline',$obj->id_pipeline]])->first();
       $obj->ordem = $nova_ordem;
       $n_obj->ordem = $ordem;
       $obj->update();
       $n_obj->update();
       return redirect()->route('site.pipeline.ficha',['id' => $pipe->token]);
    }

    public function down($id)
    {
       $obj = Action::where('token',$id)->first();
       $pipe = Pipeline::where('id_pipeline',$obj->id_pipeline)->first();
       //
       $ordem = $obj->ordem;
       $nova_ordem = $ordem + 1;
       $n_obj = Action::where([['ordem',$nova_ordem],['id_pipeline',$obj->id_pipeline]])->first();
       $obj->ordem = $nova_ordem;
       $n_obj->ordem = $ordem;
       $obj->update();
       $n_obj->update();
       return redirect()->route('site.pipeline.ficha',['id' => $pipe->token]);
    }
    
}
