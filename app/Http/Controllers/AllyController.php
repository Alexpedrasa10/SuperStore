<?php

namespace App\Http\Controllers;

use App\Models\Ally;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AllyController extends Controller
{
    public function index()
    {
        $categories = Ally::all();
        return $this->sendResponse($categories, 'Aliados mostrados con exito.');
    }

    public function store(Request $request)
    {
        try {

            $campos = $request->validate([
                'name' => 'required|string|max:200',
                'email' => 'required|email',
                'categories' => 'array', 
            ]);
    
            $ally = Ally::create($campos);

            if ($request->has('categories')) {
                $ally->categories()->sync($request->categories);
            }
    
            return $this->sendResponse($ally, 'Aliados creado con exito.', 201);

        } catch (ValidationException $ve) {
            
            return $this->sendResponse($ve->errors(), 'Errores en la validacion.', 422);
        }
    }

    public function show($id)
    {
        $ally = Ally::find($id);

        if (empty($ally)) {
            return $this->sendResponse(null, 'No hay Aliados con ese id.', 400);
        }

        return $this->sendResponse($ally, 'Aliado encontrado con exito.', 200);
    }

    public function update(Request $request, $id)
    {
        $ally = Ally::find($id);

        if (empty($ally)) {
            return $this->sendResponse(null, 'No hay Aliados con ese id.', 400);
        }

        $update = $request->all();
        $ally->fill($update);
        $ally->save();

        if ($request->has('categories')) {
            $ally->categories()->sync($request->categories);
        }

        return $this->sendResponse($ally, 'Aliados actualizado con exito.', 201);
    }

    public function destroy($id)
    {
        $ally = Ally::find($id);

        if (empty($ally)) {
            return $this->sendResponse(null, 'No hay Aliados con ese id.', 400);
        }
        
        $ally->delete();

        return $this->sendResponse($ally, 'Aliados eliminado con exito.', 200);
    }

    public function products ($id)
    {
        $ally = Ally::find($id);
        dump($ally);
        if (empty($ally)) {
            return $this->sendResponse(null, 'No hay Aliados con ese id.', 400);
        }

        $catIds = $ally->categories()->pluck('category_id');
        dump($catIds);
        $products = Product::whereHas('categories', function ($query) use ($catIds) {
            $query->whereIn('categories.id', $catIds);
        })->get();

        return $this->sendResponse($products, 'Aliado encontrado con exito.', 200);
    }
}
