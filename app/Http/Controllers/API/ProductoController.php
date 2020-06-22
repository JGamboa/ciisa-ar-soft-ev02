<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CreateProductoAPIRequest;
use App\Http\Requests\API\UpdateProductoAPIRequest;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = new Producto();

        $items = $items->get();

        return response()->json($items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductoAPIRequest $request)
    {
        $input = $request->validated();
        $producto = Producto::create($input);

        return response()->json($producto);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //Lo que hace esto es generar la query select * from tblProducto where codigoProd = {id} <-- el id que se paso por parametro
        return response()->json($producto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateProductoAPIRequest  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductoAPIRequest $request, Producto $producto)
    {
        $input = $request->validated();
        $producto->update($input);
        $producto->refresh();
        return response()->json($producto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return response()->json(['message' => 'producto eliminado exitosamente', 'data' => $producto], 204);
    }
}
