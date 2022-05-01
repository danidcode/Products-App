@extends('layouts.layout')

@section('title')

Crear producto

@endsection

@section('content')
<div class="d-flex justify-content-center align-items text-center">
    <form autocomplete="off" class="shadow-lg form-control mb-3" action="/products/create" method="POST" onsubmit="return checkEmpty()">

        <h2 class="text-center mb-3">Crear producto</h2>
        Nombre <input class="form-control  mt-2 mb-2" name="nameProduct" type="text" id="name">
        Precio <input class="form-control  mt-2 mb-2" name="priceProduct" type="number" id="price">
        Observaciones <input class="form-control  mt-2 mb-2" name="commentsProduct" type="text" id="comments">
        Categoría <select class="form-control  mt-2 mb-2" name="categoryProduct">

            @foreach($category as $categories)
            <option value="{{$categories->CategoryID}}">{{$categories->Name}}</option>
            @endforeach
        </select>

        Almacén <select class="form-control  mt-2 mb-2" name="storeProduct">
            @foreach($almacenes as $almacen)
            <option value="{{$almacen->AlmacenID}}">{{$almacen->Ubicacion}}</option>
            @endforeach
        </select>

        {{csrf_field()}} <!-- evita ataques csrf -->
        <button class="btn btn-success mt-2 " name="buttonADD" type="submit">Añadir producto</button>
        <div id="alert" hidden class="alert alert-danger mt-2" role="alert">
            <p> Es obligatorio rellenar todos los campos. </p>
            <p> El campo Nombre debe tener mínimo 3 caracteres. </p>
        </div>
    </form>
</div>


<script type='text/javascript'>
    //script que verifica los requisitos pedidos en el enunciado a la hora de mandar el formulario
    function checkEmpty() {
        let name = document.getElementById("name").value;
        let price = document.getElementById("price").value;
        let comments = document.getElementById("comments").value;
        if (name.length < 3 || price == "" || comments == "") {
            document.getElementById("alert").hidden = false;
            return false;
        } else {
            return true
        }
    }
</script>

@endsection