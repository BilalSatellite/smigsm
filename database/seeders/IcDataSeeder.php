<?php

namespace Database\Seeders;

use App\Models\Ic\BrandIc;
use App\Models\Ic\CategorieIc;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IcDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brandics = [
            'Qualcomm', 'Mediatek', 'Spreadtrum', 'Exynos', 'Samsung',
            'Apple', 'Kirin', 'Broadcom', 'Intel', 'Rda/Coolsand', 'Infineon',
            'Rockchip', 'Allwinner', 'SanDisk', 'SK hynix', 'Toshiba', 'Alliance', 'ATP',
            'Greenliant', 'Micron', 'Texas Instruments'
        ];
        foreach ($brandics as $brandic) {
            BrandIc::create(
                ['name' => $brandic, 'slug' => Str::slug($brandic)]
            );
        }
        $Cotegoryics = [
            'Processor', 'Power', 'Memory', 'Network', 'Display',
            'Graphic', 'Audio',  'Camera', 'BackLight',
            'Touch', 'Connectivity', 'Vibrater'
        ];
        foreach ($Cotegoryics as $Cotegoryic) {
            CategorieIc::create(
                ['name' => $Cotegoryic, 'slug' => Str::slug($Cotegoryic)]
            );
        }
    }
}
