<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Products;
use App\Models\Category;
use App\Models\Almacenes;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function showProducts()
    {
        $products = Products::paginate(10);
        $category = Category::all(); //le paso todas las categorías existentes
        $almacenes = Almacenes::all();    //le paso todas las categorías existentes
        return view('listOfProducts', compact("products", "category", "almacenes"));
    }

    public function createProductView()
    {
        $category = Category::all(); //le paso todas las categorías existentes
        $almacenes = Almacenes::all();    //le paso todas las categorías existentes
        return view("createProduct", compact("category", "almacenes"));
    }

    public function createProduct(Request $request)
    {

        $product = new Products;
        $product->Name = $request->nameProduct;
        $product->Price = $request->priceProduct;
        $product->Observaciones = $request->commentsProduct;
        $product->CategoryID = $request->categoryProduct;
        $product->AlmacenID = $request->storeProduct;
        $product->save();

        return view("createSuccess");
    }

    public function updateProductView($ProductID)
    {
        $product = Products::findOrFail($ProductID);
        $category = Category::all(); //le paso todas las categorías existentes
        $almacenes = Almacenes::all();    //le paso todas las categorías existentes
        return view("updateProduct", compact("product", "category", "almacenes"));
    }

    public function updateProduct(Request $request)
    {
        //localiza al producto por la id y lo actualiza con el método update de eloquent
        Products::where('ProductID', $request->idProduct)->update([
            'Name' => $request->nameProduct,
            'Price' => $request->priceProduct,
            'Observaciones' => $request->commentsProduct,
            'CategoryID' => $request->categoryProduct,
            'AlmacenID' => $request->storeProduct
        ]);

        return view("updateSuccess");
    }

    public function deleteProduct(Request $request)
    {
        //Recoge el ID pasado como argumento y localiza un producto en la base de datos con dicho ID para eliminarlo
        $ID = $request->ProductID;
        $product = Products::findOrFail($ID);
        Products::where('ProductID', $ID)->delete();
        return view("deleteSuccess");
    }
}
