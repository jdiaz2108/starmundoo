<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class AdminCategoriaController extends Controller
{
    public function __construct(){
    $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.categoria.listar', compact('categorias'));
        return $categorias;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'nombre' => 'unique:categorias',
        ]);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $categoria = new Categoria();

        $categoria->fill($request->except('imagen'));

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/imagenes/categorias/', $name);
            $categoria->imagen = $name;
        }

        if($request->input('nombre')) {
        $var = str_replace(" ", "_", $request->input('nombre'));
        $categoria->slug = $var;
        }

        $categoria->save();

        alert()->autoclose(3000)->success('Se ha Creado el elemento con exito!', 'Creado');
        return redirect('/admin/categorias');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        return view('admin.categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        $categoria->fill($request->except('imagen'));

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/imagenes/categorias/', $name);
            $categoria->imagen = $name;
        }

        if($request->input('nombre')) {
        $var = str_replace(" ", "_", $request->input('nombre'));
        $categoria->slug = $var;
        }

        $categoria->save();

        alert()->autoclose(3000)->success('Se ha Editado el elemento con exito!', 'Editado');
        return redirect('/admin/categorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        $file_path = public_path().'/imagenes/categorias/'.$categoria->imagen;
        \File::delete($file_path);
        $categoria->delete();
        alert()->autoclose(3000)->success('Se ha eliminado el elemento con exito!', 'Eliminado');
        return redirect('/admin/categorias');
    }
}
