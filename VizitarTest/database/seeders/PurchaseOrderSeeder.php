<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Product;
use App\Models\PurchaseOrder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = Customer::all();

        // Iterate through each customer
        $customers->each(function (Customer $customer) {
            // Generate fake purchase orders for each customer
            $customer->purchaseOrders()->saveMany(PurchaseOrder::factory(5)->make()->each(function ($order) {
                // Attach products to each purchase order
                $products = Product::inRandomOrder()->limit(rand(1, 5))->get();
                $order->products()->attach($products->pluck('id'), ['quantity' => rand(1, 10)]);
            }));
        });
    }
}
