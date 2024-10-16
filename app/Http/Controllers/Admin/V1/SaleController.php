<?php

namespace App\Http\Controllers\Admin\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSaleRequest;
use App\Jobs\CalculateBonuses;
use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;
class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::with(['user', 'product'])->simplePaginate(10);
        return view('admin.sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $products = Product::all();

        return view('admin.sales.create', compact('users','products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        try {
            $product = Product::findOrFail($validatedData['product_id']);
            $totalPrice = $validatedData['quantity'] * $product->price;
            $sale = Sale::create([
                'user_id' => $validatedData['user_id'],
                'product_id' => $validatedData['product_id'],
                'quantity' => $validatedData['quantity'],
                'total_price' => $totalPrice,
            ]);

            // Rediriger vers une page de succès ou une autre action appropriée
            return redirect()->route('admin.sales.index')->with('success', 'vente enregistree avec succes!.');
        }catch (\Exception $e){
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'enregistrement de cette vente: ' . $e->getMessage());

        }






    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        $users = User::all();
        $products = Product::all();
        return view('admin.sales.edit', compact('sale','users','products'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        try {
            $product = Product::findOrFail($validatedData['product_id']);
            $totalPrice = $validatedData['quantity'] * $product->price;
            $sale->update([
                'user_id' => $validatedData['user_id'],
                'product_id' => $validatedData['product_id'],
                'quantity' => $validatedData['quantity'],
                'total_price' => $totalPrice,
            ]);

            return redirect()->route('admin.sales.index')->with('success', 'Les informations sur cette vente ont ete modifiees avec succes.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la modification de cette vente: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        if (!auth()->user()->can('delete vente')) {
            abort(403, 'Vous n\'avez pas l\'autorisation de supprimer cet utilisateur.');
        }
        try {
            $sale->delete();

            return redirect()->route('admin.sales.index')->with('success', 'Cette vente a ete supprimee avec succes.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la suppression de cette vente.: ' . $e->getMessage());
        }
    }
}
