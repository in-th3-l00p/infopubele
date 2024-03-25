<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
			City::factory()->create(['name'=>'Alba']);
			City::factory()->create(['name'=>'Arad']);
			City::factory()->create(['name'=>'Argeș']);
			City::factory()->create(['name'=>'Bacău']);
			City::factory()->create(['name'=>'Bihor']);
			City::factory()->create(['name'=>'Bistrița-Năsăud']);
			City::factory()->create(['name'=>'Botoșani']);
			City::factory()->create(['name'=>'Brașov']);
			City::factory()->create(['name'=>'Brăila']);
			City::factory()->create(['name'=>'București']);
			City::factory()->create(['name'=>'Buzău']);
			City::factory()->create(['name'=>'Caraș-Severin']);
			City::factory()->create(['name'=>'Călărași']);
			City::factory()->create(['name'=>'Cluj']);
			City::factory()->create(['name'=>'Constanța']);
			City::factory()->create(['name'=>'Covasna']);
			City::factory()->create(['name'=>'Dâmbovița']);
			City::factory()->create(['name'=>'Dolj']);
			City::factory()->create(['name'=>'Galați']);
			City::factory()->create(['name'=>'Giurgiu']);
			City::factory()->create(['name'=>'Gorj']);
			City::factory()->create(['name'=>'Harghita']);
			City::factory()->create(['name'=>'Hunedoara']);
			City::factory()->create(['name'=>'Ialomița']);
			City::factory()->create(['name'=>'Iași']);
			City::factory()->create(['name'=>'Ilfov']);
			City::factory()->create(['name'=>'Maramureș']);
			City::factory()->create(['name'=>'Mehedinți']);
			City::factory()->create(['name'=>'Mureș']);
			City::factory()->create(['name'=>'Neamț']);
			City::factory()->create(['name'=>'Olt']);
			City::factory()->create(['name'=>'Prahova']);
			City::factory()->create(['name'=>'Satu Mare']);
			City::factory()->create(['name'=>'Sălaj']);
			City::factory()->create(['name'=>'Sibiu']);
			City::factory()->create(['name'=>'Suceava']);
			City::factory()->create(['name'=>'Teleorman']);
			City::factory()->create(['name'=>'Timiș']);
			City::factory()->create(['name'=>'Tulcea']);
			City::factory()->create(['name'=>'Vaslui']);
			City::factory()->create(['name'=>'Vâlcea']);
			City::factory()->create(['name'=>'Vrancea']);
    }
}
