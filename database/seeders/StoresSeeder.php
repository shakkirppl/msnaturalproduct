<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stores;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class StoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $stores = [
            [
                'store_name' => 'India Store',
                'country_id' => 1,
                'admin_user_name' => 'admin_india',
                'password' => 'password123', // Store plain password temporarily for hashing
            ],
            [
                'store_name' => 'Oman Store',
                'country_id' => 2,
                'admin_user_name' => 'admin_oman',
                'password' => 'password123',
            ],
            [
                'store_name' => 'UAE Store',
                'country_id' => 3,
                'admin_user_name' => 'admin_uae',
                'password' => 'password123',
            ],
            [
                'store_name' => 'Qatar Store',
                'country_id' => 4,
                'admin_user_name' => 'admin_qatar',
                'password' => 'password123',
            ],
        ];

        foreach ($stores as $storeData) {
            // Create the store
            $store = Stores::create([
                'store_name' => $storeData['store_name'],
                'country_id' => $storeData['country_id'],
                'admin_user_name' => $storeData['admin_user_name'],
                'password' => $storeData['password'],
                'created_by' => 1,
            ]);

            // Create the user associated with the store
            User::create([
                'name' => ucfirst($storeData['admin_user_name']), // Using admin_user_name as user name
                'email' => $storeData['admin_user_name'] . '@ms.com', // Assign a dummy email
                'password' => Hash::make($storeData['password']), // Hash the password
                'role_id'=> 4,
                'store_id'=>$store->id,
                'created_by'=>1,
            ]);
        }
    }
}
