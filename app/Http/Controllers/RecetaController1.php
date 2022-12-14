<?php

namespace App\Http\Controllers;


use App\Models\Receta;
use App\Models\CategoriaReceta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class RecetaController1 extends Controller
{
  public function __construct(){
    $this->middleware('auth',['except'=>'show']);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //return "hola desde index()";
      $recetas=auth()->user()->recetas;
        return view('recetas.index')->with('recetas',$recetas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //DB::table('categoria_receta')->get()->pluck('nombre','id')->dd();
        //$categorias=DB::table('categoria_receta')->get()->pluck('nombre','id');
        $categorias=CategoriaReceta::all(['id','nombre']);
        return view('recetas.create')->with('categorias',$categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //validacion de los datos
      //dd($request['imagen']->store('upload-recetas','public'));
      $data=request()->validate([
        'titulo'=>'required|min:6',
        'categoria'=>'required',
        'preparacion'=>'required',
        'ingredientes'=>'required',
        'imagen'=>'required|image'
      ]);
      //obtener ruta de la imagen
      $ruta_imagen=$request['imagen']->store('upload-recetas','public');
      //rezise de la imagen
      $img=Image::make(public_path("storage/{$ruta_imagen}"))->fit(1000,550);
      $img->save();

      //almacenar en la DB
      /*DB::table('recetas')->insert([
        'titulo'=>$data['titulo'],
        'preparacion'=>$data['preparacion'],
        'ingredientes'=>$data['ingredientes'],
        'imagen'=>$ruta_imagen,
        'user_id'=>Auth::user()->id,
        'categoria_id'=>$data['categoria']*/

      auth()->user()->recetas()->create([
        'titulo'=>$data['titulo'],
        'preparacion'=>$data['preparacion'],
        'ingredientes'=>$data['ingredientes'],
        'imagen'=>$ruta_imagen,
        //'user_id'=>Auth::user()->id,
        'categoria_id'=>$data['categoria']
    ]);
    //    dd($request->all());
    return redirect()->action([RecetaController1::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        //$receta=Receta::findOrFail($receta);
        return view('recetas.show', compact('receta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        $categorias=CategoriaReceta::all(['id','nombre']);
        return view('recetas.edit',compact('categorias','receta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
      // Revisar el policy
      $this->authorize('update',$receta);
      //return $receta;
      //validando datos
      $data=request()->validate([
        'titulo'=>'required|min:6',
        'categoria'=>'required',
        'preparacion'=>'required',
        'ingredientes'=>'required'
      ]);
      //Asignar valores
      $receta->titulo=$data['titulo'];
      $receta->preparacion=$data['preparacion'];
      $receta->ingredientes=$data['ingredientes'];
      $receta->categoria_id=$data['categoria'];

      //si el usuario sube una nueva imagen
      if (request('imagen')) {
        $ruta_imagen=$request['imagen']->store('uplodad-recetas','public');
        //resize de la Imagen
        $img=Image::make(public_path("storage/{$ruta_imagen}"))->fit(1000,500);
        $img->save();
        //asignar al objeto
        $receta->imagen=$ruta_imagen;
      }
      $receta->save();
    //redireccionar
    return redirect()->action([RecetaController1::class, 'index']);
    //return redirect()->action('receta.update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
      //Ejecutar el policy
        $this->authorize('delete',$receta);
      //Eliminar Receta
        $receta->delete();
        return redirect()->action([RecetaController1::class, 'index']);
    }
}
