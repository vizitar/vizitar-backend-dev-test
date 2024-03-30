<?php

namespace Database\Seeders;

use App\Models\Customer;
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
        $purchaseOrders = PurchaseOrder::all();

        //Iterate through each customer
        foreach ($customers as $customer){
            $purchaseOrders = PurchaseOrder::factory(5)->make(); //create fake purchase orders

            $customer->purchaseOrders()->saveMany($purchaseOrders);

            foreach ($purchaseOrders as $purchaseOrder){
                //TODO pivot table seeder logic

            }
        }
            /*->each(function ($order) {
                // Attach products to each purchase order
                $products = Product::inRandomOrder()->limit(rand(1, 5))->get();
                $order->products()->attach($products->pluck('id'), ['quantity' => rand(1, 10)]);
            }));*/

    }
}
