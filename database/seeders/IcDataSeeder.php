<?php

namespace Database\Seeders;

use App\Models\Ic\AttributeIc;
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
            ['name' => 'SOC', 'desc' => 'System-on-a-Chip', 'categorie_ic_id' => 1],
            ['name' => 'CPU',  'desc' => 'Central processing unit', 'categorie_ic_id' => 1],
            ['name' => 'MPU', 'desc' => 'Mobile processing unit', 'categorie_ic_id' => 1],
            ['name' => 'PM',  'desc' => 'Power Managment', 'categorie_ic_id' => 2],
            ['name' => 'PMI',  'desc' => 'Power Managment Interface', 'categorie_ic_id' => 2],
            ['name' => 'LDO',  'desc' => 'Low-dropout', 'categorie_ic_id' => 2],
            ['name' => 'eMMC',  'desc' => 'embedded Multi Media Card', 'categorie_ic_id' => 3],
            ['name' => 'eMCP',  'desc' => 'embedded Multi Chip Packages', 'categorie_ic_id' => 3],
        ];
        foreach ($subcategoryics as $subcategoryic) {

            SubCategorieIc::create(
                [
                    'name' => $subcategoryic['name'],
                    'slug' => Str::slug($subcategoryic['name']),
                    'desc' => $subcategoryic['desc'],
                    'categorie_ic_id' => $subcategoryic['categorie_ic_id']
                ]
            );
        }

        $Icattributes = [
            ['Processor:Type', ['SOC', 'CPU', 'MPU']],
            ['Processor:RamSupport', ['LPDDR1', 'LPDDR1E', 'LPDDR2', 'LPDDR2E', 'LPDDR3', 'LPDDR3E', 'LPDDR4', 'LPDDR4X', 'LPDDR5', 'LPDDR5X']],
            ['Power:Type', ['PM', 'PMI', 'LDO', 'PMU']],
            ['Memory:Type', ['RAM', 'eMMC', 'eMCP', 'UFS', 'uMCP']],
            ['eMMC:Ver', ['Ver4.3', 'Ver4.4', 'Ver4.41', 'Ver4.5', 'Ver5.0', 'Ver5.01', 'Ver5.1', 'Ver5.1A']],
            ['eMMC:ReVer', ['Ver1.5', 'Ver1.6', 'Ver1.7', 'Ver1.8']],
            ['BGA', ['BGA153', 'BGA162', 'BGA169', 'BGA221', 'BGA254', 'BGA280', 'BGA529']],
            ['Memory:Size', ['2GB', '4GB', '8GB', '16GB', '32GB', '64GB', '128GB', '256GB', '512GB']],
            ['UFS:Ver', ['2.0', '2.1', '3.0', '3.1', '4.0', '4.1', '4.2']],
            ['Ram:Type', ['LPDDR1', 'LPDDR1E', 'LPDDR2', 'LPDDR2E', 'LPDDR3', 'LPDDR3E', 'LPDDR4', 'LPDDR4X', 'LPDDR5', 'LPDDR5X']],
            ['Ram:Size', ['1GB', '2GB', '4GB', '6GB', '8GB', '10GB', '12GB', '16GB']],
            ['Network:Type', ['2G:PA', '3G:PA', '4G:PA', '5G:PA', 'WTR']],
        ];

        foreach ($Icattributes as $Icattribute) {
            AttributeIc::create(
                [
                    'name' => $Icattribute[0],
                    'values' => $Icattribute[1]
                ]
            );
        }
    }
}
