<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'             => 'category 1', 
            'description'      => 'category',
        ]);
        Category::create([
            'name'             => 'category 2', 
            'description'      => 'category',
        ]);
        Category::create([
            'name'             => 'category 3', 
            'description'      => 'category',
        ]);
        Category::create([
            'name'             => 'category 4', 
            'description'      => 'category',
        ]);
        Category::create([
            'name'             => 'category 5', 
            'description'      => 'category',
        ]);
        Product::create([
            'name'             => 'product 1', 
            'description'      => 'product',
            'price'            => '6000',
            'offer'            => '3000',
            'image'            => 'back-2_1627326624.webp',
            'available'        => 'yes',
            'category_id'      => '1',
        ]);
        Product::create([
            'name'             => 'product 2', 
            'description'      => 'product',
            'price'            => '6000',
            'offer'            => '3000',
            'image'            => 'back-2_1627326624.webp',
            'available'        => 'yes',
            'category_id'      => '1',
        ]);
        Product::create([
            'name'             => 'product 3', 
            'description'      => 'product',
            'price'            => '6000',
            'offer'            => '3000',
            'image'            => 'back-2_1627326624.webp',
            'available'        => 'yes',
            'category_id'      => '1',
        ]);
        Product::create([
            'name'             => 'product 4', 
            'description'      => 'product',
            'price'            => '6000',
            'offer'            => '3000',
            'image'            => 'back-2_1627326624.webp',
            'available'        => 'yes',
            'category_id'      => '1',
        ]);
        Product::create([
            'name'             => 'product 5', 
            'description'      => 'product',
            'price'            => '6000',
            'offer'            => '3000',
            'image'            => 'back-2_1627326624.webp',
            'available'        => 'yes',
            'category_id'      => '1',
        ]);
        Product::create([
            'name'             => 'product 1', 
            'description'      => 'product',
            'price'            => '6000',
            'offer'            => '3000',
            'image'            => 'back-2_1627326624.webp',
            'available'        => 'yes',
            'category_id'      => '1',
        ]);
        Product::create([
            'name'             => 'product 2', 
            'description'      => 'product',
            'price'            => '6000',
            'offer'            => '3000',
            'image'            => 'back-2_1627326624.webp',
            'available'        => 'yes',
            'category_id'      => '2',
        ]);
        Product::create([
            'name'             => 'product 3', 
            'description'      => 'product',
            'price'            => '6000',
            'offer'            => '3000',
            'image'            => 'back-2_1627326624.webp',
            'available'        => 'yes',
            'category_id'      => '2',
        ]);
        Product::create([
            'name'             => 'product 4', 
            'description'      => 'product',
            'price'            => '6000',
            'offer'            => '3000',
            'image'            => 'back-2_1627326624.webp',
            'available'        => 'yes',
            'category_id'      => '2',
        ]);
        Product::create([
            'name'             => 'product 5', 
            'description'      => 'product',
            'price'            => '6000',
            'offer'            => '3000',
            'image'            => 'back-2_1627326624.webp',
            'available'        => 'yes',
            'category_id'      => '2',
        ]);
        Product::create([
            'name'             => 'product 1', 
            'description'      => 'product',
            'price'            => '6000',
            'offer'            => '3000',
            'image'            => 'back-2_1627326624.webp',
            'available'        => 'yes',
            'category_id'      => '3',
        ]);
        Product::create([
            'name'             => 'product 2', 
            'description'      => 'product',
            'price'            => '6000',
            'offer'            => '3000',
            'image'            => 'back-2_1627326624.webp',
            'available'        => 'yes',
            'category_id'      => '3',
        ]);
        Product::create([
            'name'             => 'product 3', 
            'description'      => 'product',
            'price'            => '6000',
            'offer'            => '3000',
            'image'            => 'back-2_1627326624.webp',
            'available'        => 'yes',
            'category_id'      => '3',
        ]);
        Product::create([
            'name'             => 'product 4', 
            'description'      => 'product',
            'price'            => '6000',
            'offer'            => '3000',
            'image'            => 'back-2_1627326624.webp',
            'available'        => 'yes',
            'category_id'      => '3',
        ]);
        Product::create([
            'name'             => 'product 5', 
            'description'      => 'product',
            'price'            => '6000',
            'offer'            => '3000',
            'image'            => 'back-2_1627326624.webp',
            'available'        => 'yes',
            'category_id'      => '3',
        ]);
        Product::create([
            'name'             => 'product 1', 
            'description'      => 'product',
            'price'            => '6000',
            'offer'            => '3000',
            'image'            => 'back-2_1627326624.webp',
            'available'        => 'yes',
            'category_id'      => '4',
        ]);
        Product::create([
            'name'             => 'product 2', 
            'description'      => 'product',
            'price'            => '6000',
            'offer'            => '3000',
            'image'            => 'back-2_1627326624.webp',
            'available'        => 'yes',
            'category_id'      => '4',
        ]);
        Product::create([
            'name'             => 'product 3', 
            'description'      => 'product',
            'price'            => '6000',
            'offer'            => '3000',
            'image'            => 'back-2_1627326624.webp',
            'available'        => 'yes',
            'category_id'      => '4',
        ]);
        Product::create([
            'name'             => 'product 4', 
            'description'      => 'product',
            'price'            => '6000',
            'offer'            => '3000',
            'image'            => 'back-2_1627326624.webp',
            'available'        => 'yes',
            'category_id'      => '4',
        ]);
        Product::create([
            'name'             => 'product 5', 
            'description'      => 'product',
            'price'            => '6000',
            'offer'            => '3000',
            'image'            => 'back-2_1627326624.webp',
            'available'        => 'yes',
            'category_id'      => '4',
        ]);
        Product::create([
            'name'             => 'product 1', 
            'description'      => 'product',
            'price'            => '6000',
            'offer'            => '3000',
            'image'            => 'back-2_1627326624.webp',
            'available'        => 'yes',
            'category_id'      => '5',
        ]);
        Product::create([
            'name'             => 'product 2', 
            'description'      => 'product',
            'price'            => '6000',
            'offer'            => '3000',
            'image'            => 'back-2_1627326624.webp',
            'available'        => 'yes',
            'category_id'      => '5',
        ]);
        Product::create([
            'name'             => 'product 3', 
            'description'      => 'product',
            'price'            => '6000',
            'offer'            => '3000',
            'image'            => 'back-2_1627326624.webp',
            'available'        => 'yes',
            'category_id'      => '5',
        ]);
        Product::create([
            'name'             => 'product 4', 
            'description'      => 'product',
            'price'            => '6000',
            'offer'            => '3000',
            'image'            => 'back-2_1627326624.webp',
            'available'        => 'yes',
            'category_id'      => '5',
        ]);
        Product::create([
            'name'             => 'product 5', 
            'description'      => 'product',
            'price'            => '6000',
            'offer'            => '3000',
            'image'            => 'back-2_1627326624.webp',
            'available'        => 'yes',
            'category_id'      => '5',
        ]);

    }
}