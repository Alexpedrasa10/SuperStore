<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return $this->sendResponse($products, 'Productos mostrados con exito.');
    }

    public function store(Request $request)
    {
        try {

            $campos = $request->validate([
                'name' => 'required|string|max:200',
                'description' => 'required|string',
                'image_url' => 'required|url',
                'cta_url' => 'required|url',
                'categories' => 'array'
            ]);
    
            $product = Product::create($campos);

            if ($request->has('categories')) {
                $product->categories()->sync($request->categories);
            }
    
            return $this->sendResponse($product, 'Productos creado con exito.', 201);

        } catch (ValidationException $ve) {
            
            return $this->sendResponse($ve->errors(), 'Errores en la validacion.', 422);
        }
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (empty($product)) {
            return $this->sendResponse(null, 'No hay productos con ese id.', 400);
        }

        return $this->sendResponse($product, 'Productos encontrado con exito.', 200);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (empty($product)) {
            return $this->sendResponse(null, 'No hay productos con ese id.', 400);
        }

        $update = $request->all();
        $product->fill($update);
        $product->save();

        if ($request->has('categories')) {
            $product->categories()->sync($request->categories);
        }

        return $this->sendResponse($product, 'Productos actualizado con exito.', 201);
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (empty($product)) {
            return $this->sendResponse(null, 'No hay productos con ese id.', 400);
        }
        
        $product->delete();

        return $this->sendResponse($product, 'Productos eliminado con exito.', 200);
    }
}

