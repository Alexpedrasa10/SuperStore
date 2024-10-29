<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return $this->sendResponse($categories, 'Categorias mostrados con exito.');
    }

    public function store(Request $request)
    {
        try {

            $campos = $request->validate([
                'name' => 'required|string|max:200',
                'description' => 'required|string|max:200',
            ]);
    
            $category = Category::create($campos);
    
            return $this->sendResponse($category, 'Categorias creado con exito.', 201);

        } catch (ValidationException $ve) {
            
            return $this->sendResponse($ve->errors(), 'Errores en la validacion.', 422);
        }
    }

    public function show($id)
    {
        $category = Category::find($id);

        if (empty($category)) {
            return $this->sendResponse(null, 'No hay categorias con ese id.', 400);
        }

        return $this->sendResponse($category, 'Categoria encontrado con exito.', 200);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (empty($category)) {
            return $this->sendResponse(null, 'No hay Categorias con ese id.', 400);
        }

        $update = $request->all();
        $category->fill($update);
        $category->save();

        return $this->sendResponse($category, 'Categorias actualizado con exito.', 201);
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if (empty($category)) {
            return $this->sendResponse(null, 'No hay Categorias con ese id.', 400);
        }
        
        $category->delete();

        return $this->sendResponse($category, 'Categorias eliminado con exito.', 200);
    }

    public function getProducts ($id)
    {
        $category = Category::find($id);

        if (empty($category)) {
            return $this->sendResponse(null, 'No hay Categorias con ese id.', 400);
        }

        return $this->sendResponse($category->products()->get(), 'Categoria encontrado con exito.', 200);
    }
}

