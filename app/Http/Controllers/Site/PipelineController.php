<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pipeline;

class PipelineController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $lista = Pipeline::all();
       return view('site.pipeline.index',['lista' => $lista]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('site.pipeline.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $counts = Pipeline::select(\DB::raw('count(*) as qtd'))->get();
       $total_counts = Pipeline::count();
       //
       $obj = Pipeline::create($request->all());
       $obj->ordem = $total_counts + 1;
       $obj->token = md5($obj->id_pipeline);
       $obj->save();
       return redirect()->route('site.pipeline.show',['id' => $obj->token]);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $obj = Pipeline::where('token',$id)->first();
       return view('site.pipeline.show',['obj' => $obj]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $obj = Pipeline::where('token',$id)->first();
       return view('site.pipeline.edit',['obj' => $obj]);
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
      $obj = Pipeline::where('token',$params["token"])->first();
      $obj->pipeline = $params["pipeline"];
      $obj->info = $params["info"];
      $obj->update();
      return redirect()->route('site.pipeline.ficha',['id' => $obj->token]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $obj = Pipeline::where('token',$id)->first();
      $ordem = $obj->ordem;
      $obj->delete();
      Pipeline::where(['ordem','>',$ordem])->decrement('ordem');
      return redirect()->route('site.home');
    }
}
