<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserTableSeeder::class);
        $this->call(CurrencyTableSeeder::class);
        $this->call(NumberFormatTableSeeder::class);
        $this->call(DateFormatTableSeeder::class);
        $this->call(GoalTypeTableSeeder::class);
        $this->call(AccountTypeTableSeeder::class);
        $this->call(BudgetTableSeeder::class);
        $this->call(AccountTableSeeder::class);
        $this->call(PayeeTableSeeder::class);
         $this->call(BankTableSeeder::class);
        $this->call(EnvelopTableSeeder::class);
        $this->call(EnvelopSubCategoriesTableSeeder::class);
        $this->call(EnvelopGoalTableSeeder::class);
        // $this->call(GoalTransactionTableSeeder::class);
        // $this->call(AccountTableSeeder::class);
        $this->call(MortgageTableSeeder::class);
        $this->call(TransactionTableSeeder::class);
        $this->call(EnvelopGoalTransactionTableSeeder::class);

    }
}
