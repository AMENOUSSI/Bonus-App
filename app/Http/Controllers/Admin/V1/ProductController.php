<?php

namespace App\Http\Controllers\Admin\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);

        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.products.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required',
        ]);

        try {
            Product::create($validatedData);

            return redirect()->route('admin.products.index')->with('success', 'Produit ajoute avec Succes!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add product:'. $e->getMessage());
        }


    }

        //return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required',
        ]);


        try {
            $product->update($request->all());

            return redirect()->route('admin.products.index')->with('success', 'Produit modifie avec succes!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add product:'. $e->getMessage());
        }

    }

    public function destroy(Product $product)
    {
        if (!auth()->user()->can('delete produits')) {
            abort(403, 'Vous n\'avez pas l\'autorisation de supprimer cet utilisateur.');
        }
        try {
            $product->delete();

            return redirect()->route('admin.products.index')->with('success', 'Produit supprime avec succes.');
        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add product:'. $e->getMessage());
        }
    }
}
