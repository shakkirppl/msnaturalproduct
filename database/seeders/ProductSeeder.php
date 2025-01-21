<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Define products and their related data with translations
        $products = [
            [
                'product_name' => 'Hair Care Oil',
                'product_name_ar' => 'زيت العناية بالشعر',
                'description' => 'This hair oil which is Made with pure coconut oil with 21 herbs treats various hair issues like hair fall, dandruff, ...',
                'description_ar' => 'ا الزيت مصنوع من زيت جوز الهند النقي مع 21 نوعًا من الأعشاب ويعالج مشاكل الشعر المختلفة مثل تساقط الشعر، قشرة الرأس،',
                'has_size' => true,
                'package_type' => 'Single',
                'sizes' => ['250 ml', '500 ml', '1 Liter']
            ],
            [
                'product_name' => 'Skin Care Oil',
                'product_name_ar' => 'زيت العناية بالشعر',
                'description' => 'This hair oil which is Made with pure coconut oil with 21 herbs treats various hair issues like hair fall, dandruff, ...',
                'description_ar' => 'ا الزيت مصنوع من زيت جوز الهند النقي مع 21 نوعًا من الأعشاب ويعالج مشاكل الشعر المختلفة مثل تساقط الشعر، قشرة الرأس،',
                'has_size' => true,
                'package_type' => 'Single',
                'sizes' => ['250 ml', '500 ml', '1 Liter']
            ],
            [
                'product_name' => 'Face Pack Powder',
                'product_name_ar' => 'زيت العناية بالشعر',
                'description' => null,
                'description_ar' => null,
                'description_ar' => null,
                'has_size' => false,
                'package_type' => 'Single',
                'sizes' => ['NONE']
            ],
            [
                'product_name' => 'Hair Care Oil 250ml + Skin Care Oil 250ml Combo',
                'product_name_ar' => 'زيت العناية بالشعر',
                'description' => null,
                'description_ar' => null,
                'has_size' => false,
                'package_type' => 'Combo',
                'sizes' => ['NONE']
            ],
            [
                'product_name' => 'Hair Care Oil 500ml + Skin Care Oil 500ml Combo',
                'product_name_ar' => 'زيت العناية بالشعر',
                'description' => null,
                'description_ar' => null,
                'has_size' => false,
                'package_type' => 'Combo',
                'sizes' => ['NONE']
            ],
            [
                'product_name' => '1 L Hair Care Oil + 1 L Skin Care Oil Combo',
                'product_name_ar' => 'زيت العناية بالشعر',
                'description' => null,
                'description_ar' => null,
                'has_size' => false,
                'package_type' => 'Combo',
                'sizes' => ['NONE']
            ],
            // Add more products as needed
        ];
    
        // Insert products and associated sizes
        foreach ($products as $productData) {
            $productId = DB::table('products')->insertGetId([
                'product_name' => json_encode($productData['product_name']), // Store as JSON
                'description' => json_encode($productData['description']),
                'product_name_ar' => json_encode($productData['product_name_ar']), // Store as JSON
                'description_ar' => json_encode($productData['description_ar']),
                'has_size' => $productData['has_size'],
                'package_type' => $productData['package_type']
            ]);
    
            // Insert product sizes if the product has sizes
            if ($productData['has_size'] && !empty($productData['sizes'])) {
                foreach ($productData['sizes'] as $size) {
                    DB::table('product_sizes')->insert([
                        'product_id' => $productId,
                        'size' => $size
                    ]);
                }
            }
        }
    
       
    
      
    }
    
}
