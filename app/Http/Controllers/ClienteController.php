<?php

namespace easymarket\Http\Controllers;

use Illuminate\Http\Request;

use easymarket\Http\Requests;
use easymarket\Cliente;
    use Illuminate\Support\Facades\Redirect;
use easymarket\Http\Requests\ClienteFormRequest;
use DB;

class ClienteController extends Controller
{
    
    public function __construct() {    
     
    }
    public function index(Request $request){
        if($request)
        {
            $query=trim($request->get('searchText'));
            $clientes=DB::table('cliente')->where('nombre','LIKE','%'.$query.'%')            
            ->paginate(4);
            return view('almacen.cliente.index',['clientes'=>$clientes, "searchText"=>$query]);
            
        }
    }
    public function create(){
        return view("almacen.cliente.create");
    }
    public function store(ClienteFormRequest $request){
        $cliente=new Cliente;
        $cliente->nombre=$request->get('nombre');
        $cliente->correo=$request->get('correo');
        $cliente->contrasena=$request->get('contrasena');
        $cliente->direccion=$request->get('direccion');
        $cliente->telefono=$request->get('telefono');
        $cliente->save();
        return Redirect::to('almacen/cliente');
    }
    public function show($id){
        return view('almacen.cliente.show',["cliente"=>  Cliente::findOrFail($id)]);
        
    }        
    public function edit($id){
        return view('almacen.cliente.edit',["cliente"=>  Cliente::findOrFail($id)]);
    }
    public function update(ClienteFormRequest $request,$id){
        
        $cliente=Cliente::findOrFail($id);
        $cliente->nombre=$request->get('nombre');
        $cliente->update();
        return Redirect::to('almacen/cliente');
    }
    public function destroy($id){
        $cliente=Cliente::findOrFail($id);
        $cliente->delete();
        return Redirect::to('almacen/cliente');
    }
}
