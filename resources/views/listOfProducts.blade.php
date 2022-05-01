@extends('layouts.layout')

@section('title')
Lista de productos
@endsection
@section('content')


<div class="container">
    <div class="row">
        <div class="col">
            <table class="d-flex justify-content-center table">
                <tr>
                    <th class="text-center">ID</th>
                    <th class="">Nombre</th>
                    <th class="">Precio</th>
                    <th>Observaciones</th>
                    <th class="">Categoría</th>
                    <th>Almacén</th>
                    <th class="text-center"> Acciones </th>
                </tr>
                @foreach ($products as $product)


                <tr>
                    <td class="">{{ $product->ProductID }}</td>
                    <td>{{ $product->Name }}</td>
                    <td>{{ $product->Price }}</td>
                    <td>{{ $product->Observaciones }}</td>
                    @foreach ($category as $categories)
                    @if($categories->CategoryID == $product->CategoryID)
                    <td>{{ $categories->Name }}</td>
                    @endif
                    @endforeach

                    @foreach ($almacenes as $almacen)
                    @if($almacen->AlmacenID == $product->AlmacenID)
                    <td>{{ $almacen->Ubicacion }}</td>
                    @endif
                    @endforeach

                    <td><a class="btn btn-primary" href="{{url('/products/update' , $product->ProductID)}}"> Editar </a> -
                        <a class="btn btn-danger" data-table="{{$product->ProductID}}" data-toggle="modal" data-name="{{$product->Name}}" data-id="{{$product->ProductID}}" href="#scrapModal"> Borrar </button>
                    </td>
                </tr>

                @endforeach

            </table>
            <div class="d-flex justify-content-center "> {{$products->links()}}</div>

        </div>
    </div>
</div>
<!-- Modal -->
<form method="post" action="#" class="formModal">
    <div class="modal fade" id="scrapModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center">
                    <h5 class="modal-title " id="exampleModalLabel">Borrar producto</h5>

                </div>
                <div class="modal-body text-center ">
                    ¿Está seguro que desea borrar el producto?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="botonCerrar" data-dismiss="modal">Cerrar</button>
                    <button type="submit" value="" name="ProductID" class="btn btn-danger delete">Borrar</a>
                        {{csrf_field()}} <!-- evita ataques csrf -->
                </div>
            </div>
        </div>
    </div>
</form>
<script type='text/javascript'>
    //pequeño script para capturar el id del producto a borrar en el modal
    $('#scrapModal').on('show.bs.modal', function(e) {
        let table = $(e.relatedTarget).data('table')
        let action = 'products/delete'
        $('.formModal').attr('action', action)
    })
    //función para colocar el nombre e id del producto a la hora de borrar
    $('#scrapModal').on('show.bs.modal', function(event) {
        var valueButton = $(event.relatedTarget).data('id'); //value para el botón
        var myID = " <p class='idModal mt-3'> ID:  " +
            $(event.relatedTarget).data('id') + "</p>"
        var myName = " <p class='nombreModal mt-3'> Nombre: " +
            $(event.relatedTarget).data('name') + "</p>";
        $(this).find(".modal-body").append(myName);
        $(this).find(".modal-body").append(myID);
        $('.delete').attr('value', valueButton)
    });

    //Limpiar modal-body de propiedades de productos al darle a cerrar en vez de borrar
    $("#botonCerrar").click(function(event) {
        $(".idModal").empty();
        $(".nombreModal").empty();
    })
</script>
@endsection