<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientUser = User::where('email', 'client@example.com')->first();
        $architectUser = User::where('email', 'architect@example.com')->first();

        if ($clientUser && $architectUser) {
            DB::table('projects')->insert([
                [
                    'name' => 'Modern Villa in Casablanca',
                    'description' => 'A luxury villa with a sea view, featuring a modern design, swimming pool, and garden.',
                    'client_id' => $clientUser->id,
                    'architect_id' => $architectUser->id,
                    'status' => 'active',
                    'start_date' => now(),
                    'end_date' => now()->addMonths(6),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
