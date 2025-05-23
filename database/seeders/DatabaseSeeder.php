<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Profiler\Profile;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'ChieuAhha',
            'email' => 'hoangmanhchie@gamil.com',
            'password' => '1111',
        ]);

        //products

        $data = [
            [
                'name' => 'Product 1',
                'image' => 'product_1.png',
                'price' => 120,
                'description' => 'Mô tả sản phẩm 1',
                'category' => 'women',
                'label' => 'sale',
                'discount' => 0,
            ],
            [
                'name' => 'Product 2',
                'image' => 'product_2.png',
                'price' => 135,
                'description' => 'Mô tả sản phẩm 2',
                'category' => 'men',
                'label' => 'sale',
                'discount' => 0,
            ],
            [
                'name' => 'Product 3',
                'image' => 'product_3.png',
                'price' => 220,
                'description' => 'Mô tả sản phẩm 3',
                'category' => '',
                'label' => '',
                'discount' => 0,
            ],
            [
                'name' => 'Product 4',
                'image' => 'product_4.png',
                'price' => 150,
                'description' => 'Mô tả sản phẩm 4',
                'category' => '',
                'label' => '',
                'discount' => 0,
            ],
            [
                'name' => 'Product 5',
                'image' => 'product_5.png',
                'price' => 250,
                'description' => 'Mô tả sản phẩm 5',
                'category' => '',
                'label' => '',
                'discount' => 0,
            ],
            [
                'name' => 'Product 6',
                'image' => 'product_6.png',
                'price' => 310,
                'description' => 'Mô tả sản phẩm 6',
                'category' => '',
                'label' => '',
                'discount' => 0,
            ],
            [
                'name' => 'Product 7',
                'image' => 'product_7.png',
                'price' => 299,
                'description' => 'Mô tả sản phẩm 7',
                'category' => '',
                'label' => '',
                'discount' => 0,
            ],
            [
                'name' => 'Product 8',
                'image' => 'product_8.png',
                'price' => 430,
                'description' => 'Mô tả sản phẩm 8',
                'category' => '',
                'label' => '',
                'discount' => 0,
            ],
            [
                'name' => 'Product 9',
                'image' => 'product_9.png',
                'price' => 410,
                'description' => 'Mô tả sản phẩm 9',
                'category' => '',
                'label' => '',
                'discount' => 0,
            ],
            [
                'name' => 'Product 10',
                'image' => 'product_10.png',
                'price' => 180,
                'description' => 'Mô tả sản phẩm 10',
                'category' => '',
                'label' => '',
                'discount' => 0,
            ],
        ];

        foreach ($data as $item) {
            Product::create($item);
        }
    }
}
