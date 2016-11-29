@extends ('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Clientes <a href="cliente/create"><button class="btn btn-success">Nuevo</button></a></h3>
        @include('almacen.cliente.search')
    </div>
</div>


<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Contraseña</th>
                <th>Direccion</th>
                <th>Telefono</th>
                </thead>
                @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->idCliente}}</td>
                    <td>{{ $cliente->nombre}}</td>
                    <td>{{ $cliente->correo}}</td> 
                    <td>{{ $cliente->contrasena}}</td> 
                    <td>{{ $cliente->direccion}}</td> 
                    <td>{{ $cliente->telefono}}</td> 
                    <td>
                        <a href="{{URL::action('ClienteController@edit',$cliente->idCliente)}}"><button class="btn btn-info">Editar</button></a>
                        <a href=""data-target="#modal-delete-{{$cliente->idCliente}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                    </td>
                </tr>
                @include('almacen.cliente.modal')
                @endforeach
            </table>
        </div>
        {{$clientes->render()}}
    </div>
</div>
@endsection