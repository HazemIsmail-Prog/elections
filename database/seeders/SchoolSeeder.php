<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schools = [
            ['id' => '1',   'name' => 'مدرسة 1'     ],
            ['id' => '2',   'name' => 'مدرسة 2'     ],
            ['id' => '3',   'name' => 'مدرسة 3'     ],
            ['id' => '4',   'name' => 'مدرسة 4'     ],
            ['id' => '5',   'name' => 'مدرسة 5'     ],
            ['id' => '6',   'name' => 'مدرسة 6'     ],
            ['id' => '7',   'name' => 'مدرسة 7'     ],
            ['id' => '8',   'name' => 'مدرسة 8'     ],
            ['id' => '9',   'name' => 'مدرسة 9'     ],
            ['id' => '10',  'name' => 'مدرسة 10'    ],
            ['id' => '11',  'name' => 'مدرسة 11'    ],
            ['id' => '12',  'name' => 'مدرسة 12'    ],
            ['id' => '13',  'name' => 'مدرسة 13'    ],
            ['id' => '14',  'name' => 'مدرسة 14'    ],
            ['id' => '15',  'name' => 'مدرسة 15'    ],
            ['id' => '16',  'name' => 'مدرسة 16'    ],
            ['id' => '17',  'name' => 'مدرسة 17'    ],
            ['id' => '18',  'name' => 'مدرسة 18'    ],
            ['id' => '19',  'name' => 'مدرسة 19'    ],
            ['id' => '20',  'name' => 'مدرسة 20'    ],
        ];
        School::insert($schools);   
     }
}
