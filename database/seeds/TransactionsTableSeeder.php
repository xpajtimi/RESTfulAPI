<?php

use App\Transaction;
use Illuminate\Database\Seeder;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transactionsQuantity = 1000;

        factory(Transaction::class, $transactionsQuantity)->create();
    }
}
