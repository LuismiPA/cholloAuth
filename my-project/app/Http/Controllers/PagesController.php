<?php

namespace App\Http\Controllers;

use App\Models\Chollo;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index($filtro='')
    {
        /* $chollos = Chollo::all(); */
        if($filtro=="nuevos"){
            $chollos=Chollo::orderBy('updated_at', 'ASC')->paginate(3);
            $titulo="NUESTROS CHOLLOS MAS RECIENTES";
            $title="Chollos nuevos";
        }else if($filtro=="destacados"){
            $chollos=Chollo::orderBy('precio', 'ASC')->paginate(3);
            $titulo="NUESTROS CHOLLOS DESTACADOS";
            $title="Chollos Destacados";
        }else{
            $chollos=Chollo::paginate(3);
            $titulo="NUESTRA SELECCION DE CHOLLOS";
            $title="Chollos";
        }
        
        return view('index',compact('chollos','titulo','title'));
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
            $cholloNuevo->save();
            if($cholloNuevo->imagen===true){
                $imageName= $cholloNuevo->id."-"."chollo-severo".".".$request->imagen->extension();
                $cholloNuevo-> imagen = $request->imagen->move(public_path('assets/images'),$imageName);
            }


            return back()->with('mensaje', 'Chollo agregado'); 

           
        }
        public function detalles($id){
            $chollo=Chollo::findOrFail($id);

            return view('chollo', compact('chollo'));
        }

        public function editar($id){
            $chollo=Chollo::findOrFail($id);
            return view('editarChollo', compact('chollo'));
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

        public function eliminar($id) {
            $chollo = Chollo::findOrFail($id);
            $chollo -> delete();
          
            return redirect('index') -> with('mensaje', 'Chollo Eliminado');
          }
}
