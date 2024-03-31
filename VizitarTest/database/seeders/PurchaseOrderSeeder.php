<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Product;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();
        $customers = Customer::all();

        foreach ($customers as $customer) {
            //Create multiple purchase orders for each customer
            $purchaseOrders = PurchaseOrder::factory(2)->create([
                'customer_id' => $customer->id,
            ]);

            //Selecting 3 random products to use in each order
            $selectedProducts = $products->random(3);

            foreach ($purchaseOrders as $purchaseOrder) {
                foreach ($selectedProducts as $product) {
                    // Attach the product to the purchase order using the pivot table
                    PurchaseOrderItem::query()->create([
                        'purchase_order_id' => $purchaseOrder->id,
                        'product_id' => $product->id,
                    ]);
                }
            }
        }
    }
}
