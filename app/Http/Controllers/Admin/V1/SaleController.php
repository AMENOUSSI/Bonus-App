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

        $product = Product::findOrFail($validatedData['product_id']);
        $totalPrice = $validatedData['quantity'] * $product->price;
        $sale = Sale::create([
            'user_id' => $validatedData['user_id'],
            'product_id' => $validatedData['product_id'],
            'quantity' => $validatedData['quantity'],
            'total_price' => $totalPrice,
        ]);

        $period = now()->format('d/m/y H:i'); // Exemple de période à utiliser pour le calcul
        CalculateBonuses::dispatch($period);

        // Rediriger vers une page de succès ou une autre action appropriée
        return redirect()->route('sales.index')->with('success', 'Sale created successfully.');



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

            // Calcul de la période, exemple basé sur l'année et le mois
            $period = now()->format('Y-m');
            CalculateBonuses::dispatch($period);

            return redirect()->route('sales.index')->with('success', 'Sale updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the sale: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        try {
            $sale->delete();
            $period = now()->format('Y-m');
            CalculateBonuses::dispatch($period);

            return redirect()->route('sales.index')->with('success', 'Sale updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the sale: ' . $e->getMessage());
        }
    }
}
