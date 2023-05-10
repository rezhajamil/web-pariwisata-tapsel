<?php

namespace Database\Seeders;

use App\Models\DestinationType;
use Illuminate\Database\Seeder;

class DestTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Air Terjun',
            ],
            [
                'name' => 'Danau',
            ],
        ];

        foreach ($data as $key => $data) {
            DestinationType::create($data);
        }
    }
}
