<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Purchase;

class PurchaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Purchase::firstOrCreate(['paymentmethod' => 'コンビニ払い']);
        Purchase::firstOrCreate(['paymentmethod' => 'カード払い']);
    }
}
