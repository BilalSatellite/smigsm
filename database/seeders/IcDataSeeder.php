<?php

namespace Database\Seeders;

use App\Models\Ic\BrandIc;
use Illuminate\Support\Str;
use App\Models\Ic\CategorieIc;
use Illuminate\Database\Seeder;
use App\Models\Ic\SubCategorieIc;
use Illuminate\Support\Facades\DB;
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
        $subcategoryics = [
            ['name' => 'SOC', 'slug' => 'soc', 'desc' => 'System-on-a-Chip', 'categorie_ic_id' => 1],
            ['name' => 'CPU', 'slug' => 'cpu', 'desc' => 'Central processing unit', 'categorie_ic_id' => 1],
            ['name' => 'MPU', 'slug' => 'mpu', 'desc' => 'Mobile processing unit', 'categorie_ic_id' => 1],
            ['name' => 'PM', 'slug' => 'pm', 'desc' => 'Power Managment', 'categorie_ic_id' => 2],
            ['name' => 'PMI', 'slug' => 'pmi', 'desc' => 'Power Managment Interface', 'categorie_ic_id' => 2],
            ['name' => 'LDO', 'slug' => 'ldo', 'desc' => 'Low-dropout', 'categorie_ic_id' => 2],
            ['name' => 'eMMC', 'slug' => 'emmc', 'desc' => 'embedded Multi Media Card', 'categorie_ic_id' => 3],
            ['name' => 'eMCP', 'slug' => 'emcp', 'desc' => 'embedded Multi Chip Packages', 'categorie_ic_id' => 3],
        ];
        SubCategorieIc::insert($subcategoryics);
    }
}
