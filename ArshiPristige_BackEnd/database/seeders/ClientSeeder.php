<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientUser = User::where('email', 'client@example.com')->first();

        if ($clientUser) {
            DB::table('clients')->insert([
                [
                    'user_id' => $clientUser->id,
                    'company_name' => 'Prestige Constructions',
                    'sector' => 'Real Estate',
                    'address' => '123 Main Street, Rabat, Morocco',
                    'phone' => '+212 5 37 00 00 00',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
