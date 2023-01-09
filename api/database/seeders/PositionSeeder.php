<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table((new Position())->getTable())
            ->insert([
                ['name' => 'Lawyer'],
                ['name' => 'Content manager'],
                ['name' => 'Security'],
                ['name' => 'Designer'],
            ]);
    }
}
