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
        $Icattribute = [
            ['name' => 'Processor:Type', 'values' => json_encode(['SOC', 'CPU', 'MPU'])],
            ['name' => 'Processor:RamSupport', 'values' => json_encode(['LPDDR1', 'LPDDR1E', 'LPDDR2', 'LPDDR2E', 'LPDDR3', 'LPDDR3E', 'LPDDR4', 'LPDDR4X', 'LPDDR5', 'LPDDR5X'])],
            ['name' => 'Power:Type', 'values' => json_encode(['PM', 'PMI', 'LDO', 'PMU'])],
            ['name' => 'Memory:Type', 'values' => json_encode(['RAM', 'eMMC', 'eMCP', 'UFS', 'uMCP'])],
            ['name' => 'eMMC:Ver', 'values' => json_encode(['Ver4.3', 'Ver4.4', 'Ver4.41', 'Ver4.5', 'Ver5.0', 'Ver5.01', 'Ver5.1', 'Ver5.1A'])],
            ['name' => 'eMMC:ReVer', 'values' => json_encode(['Ver1.5', 'Ver1.6', 'Ver1.7', 'Ver1.8'])],
            ['name' => 'BGA', 'values' => json_encode(['BGA153', 'BGA162', 'BGA169', 'BGA221', 'BGA254', 'BGA280', 'BGA529'])],
            ['name' => 'Memory:Size', 'values' => json_encode(['2GB', '4GB', '8GB', '16GB', '32GB', '64GB', '128GB', '256GB', '512GB'])],
            ['name' => 'UFS:Ver', 'values' => json_encode(['2.0', '2.1', '3.0', '3.1', '4.0', '4.1', '4.2'])],
            ['name' => 'Ram:Type', 'values' => json_encode(['LPDDR1', 'LPDDR1E', 'LPDDR2', 'LPDDR2E', 'LPDDR3', 'LPDDR3E', 'LPDDR4', 'LPDDR4X', 'LPDDR5', 'LPDDR5X'])],
            ['name' => 'Ram:Size', 'values' => json_encode(['1GB', '2GB', '4GB', '6GB', '8GB', '10GB', '12GB', '16GB'])],
            ['name' => 'Network:Type', 'values' => json_encode(['2G:PA', '3G:PA', '4G:PA', '5G:PA', 'WTR'])],
        ];
        AttributeIc::insert($Icattribute);
    }
}
