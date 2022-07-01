<?php

namespace App\Http\Controllers;

use App\Models\Construction;
use App\Models\Item;
use App\Models\Material;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $construction = Construction::where('id', $id)->first();
        $orders = $construction->orders;
        $total = 0;
        foreach ($orders as $order) {
            $total += $order->total;
        }
        return view('orders.index')
            ->with('constructionId', $construction->id)
            ->with('constructionName', $construction->name)
            ->with('orders', $orders)
            ->with('total', $total);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $construction = Construction::where('id', $id)->first();
        return view('orders.create')
            ->with('materials', Material::all())
            ->with('constructionId', $construction->id)
            ->with('constructionName', $construction->name);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $price = $this->parsePrices($request->price);
        $quantity = intval($request->quantity);

        $order = Order::create([
            'date' => $request->date,
            'total' => $price * $quantity,
            'construction_id' => $request->construction_id,
        ]);
        Item::create([
            'order_id' => $order->id,
            'material_id' => $request->material,
            'price' => $price,
            'quantity' => $quantity,
        ]);

        return to_route('orders.edit', $order->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::where('id', $id)->first();

        return view('orders.edit')
            ->with('order', $order)
            ->with('materials', Material::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::where('id', $id)->first();
        $price = $this->parsePrices($request->price);
        $quantity = intval($request->quantity);
        $materialId = intval($request->material);

        Item::create([
            'order_id' => $order->id,
            'material_id' => $materialId,
            'price' => $price,
            'quantity' => $quantity,
        ]);

        $order->total = $order->total + ($price * $quantity);
        $order->save();

        return to_route('orders.edit', $order->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::where('id', $id)->first();
        $order->delete();
        return to_route('orders.index', $order->construction->id);
    }

    private function parsePrices($values): int
    {
        $prices = explode('+', $values);
        $total = 0;
        foreach ($prices as $price) {
            $total += floatval(str_replace(',', '.', $price));
        }
        return (int)($total * 100);
    }
}
