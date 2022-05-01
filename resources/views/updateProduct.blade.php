@extends('layouts.layout')

@section('title')

Actualizar producto

@endsection

@section('content')
<div class="d-flex justify-content-center align-items text-center">
    <form autocomplete="off" class="shadow-lg form-control mb-3" action="/products/update" method="POST" onsubmit="return checkEmpty()">

        <h2 class="text-center mb-3">Editar producto</h2>
        ID <input class="form-control mt-2 mb-2" type="number" readonly name="idProduct" value="{{ $product->ProductID }}">
        Nombre <input class="form-control mt-2 mb-2" id="name" name="nameProduct" type="text" value="{{ $product->Name }}">
        Precio <input class="form-control mt-2 mb-2" name="priceProduct" id="price" type="number" value="{{ $product->Price }}">
        Observaciones <input class="form-control mt-2 mb-2" name="commentsProduct" id="comments" type=" text" value="{{ $product->Observaciones }}">

        Categoría <select class="form-control mt-2 mb-2" name="categoryProduct">
            @foreach ($category as $category)
            @if($category->CategoryID === $product->CategoryID)
            <option value="{{$category->CategoryID}}" selected>{{ $category->Name }} </option>
            @else <option value="{{$category->CategoryID}}">{{ $category->Name }} </option>
            @endif

            @endforeach
        </select>

        Almacén <select class="form-control mt-2 mb-2" name="storeProduct">
            @foreach ($almacenes as $almacen)
            @if($almacen->AlmacenID === $product->AlmacenID)
            <option value="{{$almacen->AlmacenID }}" selected>{{ $almacen->Ubicacion }} </option>
            @else <option value="{{$almacen->AlmacenID }}">{{ $almacen->Ubicacion }} </option>
            @endif

            @endforeach
        </select>
        {{csrf_field()}} <!-- evita ataques csrf -->
        <button class="btn btn-success mt-2 " name="buttonEdit" type="submit">Editar producto</button>
        <div id="alert" hidden class="alert alert-danger mt-2" role="alert">
            <p> Es obligatorio rellenar todos los campos. </p>
            <p> El campo Nombre debe tener mínimo 3 caracteres. </p>
        </div>
    </form>
</div>

<script type='text/javascript'>
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