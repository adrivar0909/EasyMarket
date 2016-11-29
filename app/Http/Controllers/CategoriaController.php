<?php

namespace easymarket\Http\Controllers;

use Illuminate\Http\Request;

use easymarket\Http\Requests;
use easymarket\Categoria;
use Illuminate\Support\Facades\Redirect;
use easymarket\Http\Requests\CategoriaFormRequest;
use DB;

class CategoriaController extends Controller
{
    public function __construct() {    
     
    }
    public function index(Request $request){
        if($request)
        {
            $query=trim($request->get('searchText'));
            $categorias=DB::table('categoria')->where('nombre','LIKE','%'.$query.'%')
            ->paginate(2);
            return view('almacen.categoria.index',['categorias'=>$categorias,"searchText"=>$query]);
        }
    }
    public function create(){
        return view("almacen.categoria.create");
    }
    public function store(CategoriaFormRequest $request){
        $categoria=new Categoria;
        $categoria->nombre=$request->get('nombre');
        $categoria->save();
        return Redirect::to('almacen/categoria');
    }
    public function show($id){
        return view('almacen.categoria.show',["categoria"=>  Categoria::findOrFail($id)]);
        
    }        
    public function edit($id){
        return view('almacen.categoria.edit',["categoria"=>  Categoria::findOrFail($id)]);
    }
    public function update(CategoriaFormRequest $request,$id){
        
        $categoria=Categoria::findOrFail($id);
        $categoria->nombre=$request->get('nombre');
        $categoria->update();
        return Redirect::to('almacen/categoria');
    }
    public function destroy($id){
        $categoria=Categoria::findOrFail($id);
        $categoria->destroy ();
        return Redirect::to('almacen/categoria');
    }
}
