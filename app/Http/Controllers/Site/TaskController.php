<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pipeline;
use App\Models\Action;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
       $action = Action::where('token',$id)->first();
       $pipe = Pipeline::where('id_pipeline',$action->id_pipeline)->first();
       $obj = Task::where('token','xxx')->first();
       return view('site.task.create',['obj' => $obj, 'pipe' => $pipe, 'action' => $action]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $counts = Task::where('id_acao',$request->id_acao)->get();
      $total_counts = $counts->count();
      //
      $obj = Task::create($request->all());
      $obj->ordem = $total_counts + 1;
      $obj->token = md5($obj->id_task);
      $obj->save();
      return redirect()->route('site.task.ficha',['id' => $obj->token]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $obj = Task::where('token',$id)->first();
       $action = Action::where('id_acao',$obj->id_acao)->first();
       $pipe = Pipeline::where('id_pipeline',$obj->id_pipeline)->first();
       return view('site.task.show',['obj' => $obj, 'pipe' => $pipe, 'action' => $action]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $obj = Task::where('token',$id)->first();
       $action = Action::where('id_acao',$obj->id_acao)->first();
       $pipe = Pipeline::where('id_pipeline',$obj->id_pipeline)->first();        
       return view('site.task.edit',['obj' => $obj, 'pipe' => $pipe, 'action' => $action]);
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
      $obj = Task::where('token',$params["token"])->first();
      $obj->dtinicio = $params["dtinicio"];
      $obj->dtentrega = $params["dtentrega"];
      $obj->prioridade = $params["prioridade"];
      $obj->tarefa = $params["tarefa"];
      $obj->instrucao = $params["instrucao"];      
      $obj->update();
      return redirect()->route('site.task.ficha',['id' => $obj->token]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $obj = Task::where('token',$id)->first();
      $action = Action::where('id_acao',$obj->id_acao)->first();
      $ordem = $obj->ordem;
      $obj->delete();
      
      Task::where([['ordem','>',$ordem],['id_acao',$action->id_acao]])->decrement('ordem');
      return redirect()->route('site.action.ficha',['id' => $action->token]);
    }
    
    public function up($id)
    {
       $obj = Task::where('token',$id)->first();
       $action = Action::where('id_acao',$obj->id_acao)->first();
       //
       $ordem = $obj->ordem;
       $nova_ordem = $ordem - 1;
       $n_obj = Task::where([['ordem',$nova_ordem],['id_acao',$obj->id_acao]])->first();
       $obj->ordem = $nova_ordem;
       $n_obj->ordem = $ordem;
       $obj->update();
       $n_obj->update();
       return redirect()->route('site.action.ficha',['id' => $action->token]);
    }

    public function down($id)
    {
       $obj = Task::where('token',$id)->first();
       $action = Action::where('id_acao',$obj->id_acao)->first();
       //
       $ordem = $obj->ordem;
       $nova_ordem = $ordem + 1;
       $n_obj = Task::where([['ordem',$nova_ordem],['id_acao',$obj->id_acao]])->first();
       $obj->ordem = $nova_ordem;
       $n_obj->ordem = $ordem;
       $obj->update();
       $n_obj->update();
       return redirect()->route('site.action.ficha',['id' => $action->token]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function progresso($id)
    {
       $obj = Task::where('token',$id)->first();
       $action = Action::where('id_acao',$obj->id_acao)->first();
       $pipe = Pipeline::where('id_pipeline',$obj->id_pipeline)->first();        
       return view('site.task.progresso',['obj' => $obj, 'pipe' => $pipe, 'action' => $action]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function progressoupdate(Request $request)
    {
      $params = $request->all();
      $obj = Task::where('token',$params["token"])->first();
      $obj->dtinicio = $params["dtinicio"];
      $obj->dtentrega = $params["dtentrega"];
      $obj->prioridade = $params["prioridade"];
      $obj->progresso = $params["progresso"];
      $obj->indicador = $params["indicador"];
      $obj->update();
      return redirect()->route('site.home');
    }
    
}
