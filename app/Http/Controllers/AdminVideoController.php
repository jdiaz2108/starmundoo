<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;

class AdminVideoController extends Controller
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
        $videos = Video::all()->sortKeysDesc();
        return view('admin.videos.listar', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.videos.create');
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
            'link' => 'unique:videos',
        ]);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
        }
        $data = $request->all();
        $video = new Video($data);

        $video->save();

        alert()->autoclose(3000)->success('Se ha Creado el elemento con exito!', 'Creado');
        return redirect('/admin/videos');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('admin.videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {

        $data = $request->all();
        $video->fill($data);

        $video->save();

        alert()->autoclose(3000)->success('Se ha Editado el elemento con exito!', 'Editado');
        return redirect('/admin/videos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->delete();
        alert()->autoclose(3000)->success('Se ha eliminado el elemento con exito!', 'Eliminado');
        return redirect('/admin/videos');
    }
}
