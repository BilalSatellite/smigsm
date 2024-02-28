<?php

namespace Database\Seeders;

use App\Models\Ic\IcAttribute;
use App\Models\Ic\IcBrand;
use App\Models\Ic\IcCategory;
use App\Models\Ic\IcType;
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
        //Ic Brands
        $brandics = [
            'Qualcomm', 'Mediatek', 'Spreadtrum', 'Exynos', 'Samsung',
            'Apple', 'Kirin', 'Broadcom', 'Intel', 'Rda/Coolsand', 'Infineon',
            'Rockchip', 'Allwinner', 'SanDisk', 'SK hynix', 'Toshiba', 'Alliance', 'ATP',
            'Greenliant', 'Micron', 'Texas Instruments'
        ];
        foreach ($brandics as $brandic) {
            IcBrand::create(
                ['name' => $brandic, 'slug' => Str::slug($brandic)]
            );
        }
        // Ic Categoreis
        $Cotegoryics = [
            'Processor', 'Power', 'Memory', 'Network', 'Display',
            'Graphic', 'Audio',  'Camera', 'BackLight',
            'Touch', 'Connectivity', 'Vibrater'
        ];
        foreach ($Cotegoryics as $Cotegoryic) {
            IcCategory::create(
                ['name' => $Cotegoryic, 'slug' => Str::slug($Cotegoryic)]
            );
        }

        // Ic Types
        $ictypes = [
            // processor
            ['name' => 'SOC', 'desc' => 'System-on-a-Chip', 'ic_categorie_id' => 1],
            ['name' => 'CPU',  'desc' => 'Central processing unit', 'ic_categorie_id' => 1],
            ['name' => 'MPU', 'desc' => 'Mobile processing unit', 'ic_categorie_id' => 1],
            ['name' => 'GPU', 'desc' => 'Grafic processing unit', 'ic_categorie_id' => 1],
            //power
            ['name' => 'PM',  'desc' => 'Power Managment', 'ic_categorie_id' => 2],
            ['name' => 'PMI',  'desc' => 'Power Managment Interface', 'ic_categorie_id' => 2],
            ['name' => 'LDO',  'desc' => 'Low-dropout', 'ic_categorie_id' => 2],
            //memory
            ['name' => 'eMMC',  'desc' => 'embedded Multi Media Card', 'ic_categorie_id' => 3],
            ['name' => 'eMCP',  'desc' => 'embedded Multi Chip Packages', 'ic_categorie_id' => 3],
            ['name' => 'UFS',  'desc' => 'Universal Flash Storage', 'ic_categorie_id' => 3],
            ['name' => 'uMCP',  'desc' => 'UFS-based multichip package', 'ic_categorie_id' => 3],
            //network
            ['name' => '2G:PA',  'desc' => 'Second-Generation Power Amplifier', 'ic_categorie_id' => 4],
            ['name' => '3G:PA',  'desc' => 'Third-Generation Power Amplifier', 'ic_categorie_id' => 4],
            ['name' => '4G:PA',  'desc' => 'Fourth-Generation Power Amplifier', 'ic_categorie_id' => 4],
            ['name' => '5G:PA',  'desc' => '5th-Generation Power Amplifier', 'ic_categorie_id' => 4],
            ['name' => 'WTR',  'desc' => 'Wireless Transmitter Receiver', 'ic_categorie_id' => 4],
            ['name' => 'RF',  'desc' => 'Radio Frequency', 'ic_categorie_id' => 4],

        ];
        foreach ($ictypes as $ictype) {

            IcType::create(
                [
                    'name' => $ictype['name'],
                    'slug' => Str::slug($ictype['name']),
                    'desc' => $ictype['desc'],
                    'ic_categorie_id' => $ictype['ic_categorie_id']
                ]
            );
        }
        //Ic Attributes
        $Icattributes = [

            ['RamSupport', ['LPDDR1', 'LPDDR1E', 'LPDDR2', 'LPDDR2E', 'LPDDR3', 'LPDDR3E', 'LPDDR4', 'LPDDR4X', 'LPDDR5', 'LPDDR5X']],
            ['eMMC:Ver', ['Ver4.3', 'Ver4.4', 'Ver4.41', 'Ver4.5', 'Ver5.0', 'Ver5.01', 'Ver5.1', 'Ver5.1A']],
            ['eMMC:ReVer', ['Ver1.5', 'Ver1.6', 'Ver1.7', 'Ver1.8']],
            ['BGA', ['BGA153', 'BGA162', 'BGA169', 'BGA221', 'BGA254', 'BGA280', 'BGA529']],
            ['Memory:Size', ['1GB', '2GB', '4GB', '6GB', '8GB', '10GB', '16GB', '12GB', '16GB', '32GB', '64GB', '128GB', '256GB', '512GB']],
            ['UFS:Ver', ['2.0', '2.1', '3.0', '3.1', '4.0', '4.1', '4.2']],

        ];
        foreach ($Icattributes as $Icattribute) {
            IcAttribute::create(
                [
                    'name' => $Icattribute[0],
                    'values' => $Icattribute[1]
                ]
            );
        }
    }
}
