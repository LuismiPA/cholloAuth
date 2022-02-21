<?php

namespace App\Http\Controllers;

use App\Models\Chollo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function formChollo(){
        return view('formChollo');
    }
    public function crearChollo(Request $request)
        {
            $cholloNuevo = new Chollo;
            $request -> validate([
                'titulo' => 'required',
                'descripcion' => 'required',
                'url' => 'required|url',
                'categoria' => 'required',
                'precio' => 'required',
                'precio_descuento' => 'required',
                'disponible' => 'required'    
            ]);

            $cholloNuevo-> titulo = $request->titulo;
            $cholloNuevo-> descripcion = $request->descripcion;
            $cholloNuevo-> url = $request->url;
            $cholloNuevo-> categoria=$request->categoria;
            $cholloNuevo-> precio=$request->precio;
            $cholloNuevo-> precio_descuento=$request->precio_descuento;
            $cholloNuevo-> disponible=$request->disponible;
            $cholloNuevo-> user_id = auth()->user()->id;
            $cholloNuevo->save();
            if($cholloNuevo->imagen===true){
                $imageName= $cholloNuevo->id."-"."chollo-severo".".".$request->imagen->extension();
                $cholloNuevo-> imagen = $request->imagen->move(public_path('assets/images'),$imageName);
            }


            return redirect()->route('index')->with('mensaje', 'Chollo agregado'); 

           
        } 

        public function update(Request $request,$id){
            $request -> validate([
                'titulo' => 'required',
                'descripcion' => 'required',
                'url' => 'required|url',
                'categoria' => 'required',
                'precio' => 'required',
                'precio_descuento' => 'required',
                'disponible' => 'required'    
            ]);

            $chollo=Chollo::findOrFail($id);
            $chollo-> titulo = $request->titulo;
            $chollo-> descripcion = $request->descripcion;
            $chollo-> url = $request->url;
            $chollo-> categoria=$request->categoria;
            $chollo-> precio=$request->precio;
            $chollo-> precio_descuento=$request->precio_descuento;
            $chollo-> disponible=$request->disponible;
            $chollo->save();
            
            if($request->imagen!==null){
                $imageName= $chollo->id."-"."chollo-severo".".".$request->imagen->extension();
                $chollo-> imagen = $request->imagen->move(public_path('assets/images'),$imageName);
            }
            return back()->with('mensaje', 'Chollo actualizado'); ;
        }

    public function editar($id){
        $chollo=Chollo::findOrFail($id);
        return view('editarChollo', compact('chollo'));
    }

    public function eliminar($id) {
        $chollo = Chollo::findOrFail($id);
        $chollo -> delete();
      
        return back() -> with('mensaje', 'Chollo Eliminado');
      }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }
}
