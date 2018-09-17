<?php

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
        $this->call(UsersTableSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(ComapiesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(OutletsTableSeeder::class);
        $this->call(ComapiesUsersTableSeeder::class);
        $this->call(PlansTableSeeder::class);
        $this->call(SuppliersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(AdsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(CartsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(CartsProductsTableSeeder::class);
        $this->call(OrdersProductsTableSeeder::class);
        $this->call(BrandsSuppliersTableSeeder::class);
        $this->call(StandingOrdersTableSeeder::class);
    }
}
