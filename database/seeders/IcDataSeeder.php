<?php

namespace Database\Seeders;

use App\Models\Ic\Power;
use App\Models\Ic\IcType;
use App\Models\Ic\IcBrand;
use Illuminate\Support\Str;
use App\Models\Ic\Processor;
use App\Models\Ic\IcCategory;
use App\Models\Ic\IcAttribute;
use App\Models\Ic\Memory;
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
            ['name' => 'Ram',  'desc' => 'Randem access Memory', 'ic_categorie_id' => 3],
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

        //Processor
        $processors = [
            ['name' => 'MSM6550A', 'ram_support' => ['LPDDR3'],  'ic_categorie_id' => 1, 'ic_brand_id' => 1, 'ic_type_id' => 1, 'user_id' => 1],
            ['name' => 'SM4375', 'ram_support' => ['LPDDR4'],  'ic_categorie_id' => 1, 'ic_brand_id' => 1, 'ic_type_id' => 1, 'user_id' => 1],
            ['name' => 'SM8475', 'ram_support' => ['LPDDR5'],  'ic_categorie_id' => 1, 'ic_brand_id' => 1, 'ic_type_id' => 1, 'user_id' => 1],
            ['name' => 'MT6216', 'ram_support' => ['LPDDR3'],  'ic_categorie_id' => 1, 'ic_brand_id' => 2, 'ic_type_id' => 1, 'user_id' => 1],
            ['name' => 'MT6797', 'ram_support' => ['LPDDR3'],  'ic_categorie_id' => 1, 'ic_brand_id' => 2, 'ic_type_id' => 1, 'user_id' => 1],
            ['name' => 'SC9610', 'ram_support' => ['LPDDR2'],  'ic_categorie_id' => 1, 'ic_brand_id' => 3, 'ic_type_id' => 1, 'user_id' => 1],
            ['name' => 'SC7727S', 'ram_support' => ['LPDDR4'],  'ic_categorie_id' => 1, 'ic_brand_id' => 3, 'ic_type_id' => 1, 'user_id' => 1],
            ['name' => 'Kirin 9000', 'ram_support' => ['LPDDR2'],  'ic_categorie_id' => 1, 'ic_brand_id' => 7, 'ic_type_id' => 1, 'user_id' => 1],
            ['name' => 'Kirin 990', 'ram_support' => ['LPDDR3'],  'ic_categorie_id' => 1, 'ic_brand_id' => 7, 'ic_type_id' => 1, 'user_id' => 1],

        ];

        foreach ($processors as $processor) {

            Processor::create(
                [
                    'name' => $processor['name'],
                    'slug' => Str::slug($processor['name']),
                    'ram_support' => $processor['ram_support'],
                    'ic_categorie_id' => $processor['ic_categorie_id'],
                    'ic_brand_id' => $processor['ic_brand_id'],
                    'ic_type_id' => $processor['ic_type_id'],
                    'user_id' => $processor['user_id'],
                ]
            );
        }
        //powers
        $powers = [
            ['name' => 'pm8953',   'ic_categorie_id' => 2, 'ic_brand_id' => 1, 'ic_type_id' => 5, 'user_id' => 1],
            ['name' => 'pm6350',   'ic_categorie_id' => 2, 'ic_brand_id' => 1, 'ic_type_id' => 5, 'user_id' => 1],
            ['name' => 'SMB1351-022',   'ic_categorie_id' => 2, 'ic_brand_id' => 1, 'ic_type_id' => 6, 'user_id' => 1],
            ['name' => 'MT6177MV',   'ic_categorie_id' => 2, 'ic_brand_id' => 2, 'ic_type_id' => 5, 'user_id' => 1],
            ['name' => 'MT6353V',   'ic_categorie_id' => 2, 'ic_brand_id' => 2, 'ic_type_id' => 6, 'user_id' => 1],
            ['name' => 'SC2721G',   'ic_categorie_id' => 2, 'ic_brand_id' => 3, 'ic_type_id' => 5, 'user_id' => 1],
            ['name' => 'UMP510G5',   'ic_categorie_id' => 2, 'ic_brand_id' => 3, 'ic_type_id' => 6, 'user_id' => 1],
            ['name' => 'HI6421',   'ic_categorie_id' => 2, 'ic_brand_id' => 7, 'ic_type_id' => 5, 'user_id' => 1],
            ['name' => 'hi6563',   'ic_categorie_id' => 2, 'ic_brand_id' => 7, 'ic_type_id' => 6, 'user_id' => 1],

        ];
        foreach ($powers as $power) {

            Power::create(
                [
                    'name' => $power['name'],
                    'slug' => Str::slug($power['name']),
                    'ic_categorie_id' => $power['ic_categorie_id'],
                    'ic_brand_id' => $power['ic_brand_id'],
                    'ic_type_id' => $power['ic_type_id'],
                    'user_id' => $power['user_id'],
                ]
            );
        }

        //Memorys
        $memorys = [
            ['name' => 'km58374',   'ic_categorie_id' => 3, 'ic_brand_id' => 5, 'ic_type_id' => 8, 'user_id' => 1],
            ['name' => 'km84756',   'ic_categorie_id' => 3, 'ic_brand_id' => 14, 'ic_type_id' => 9, 'user_id' => 1],
            ['name' => 'm839594',   'ic_categorie_id' => 3, 'ic_brand_id' => 8, 'ic_type_id' => 10, 'user_id' => 1],
            ['name' => 'sk8945',   'ic_categorie_id' => 3, 'ic_brand_id' => 15, 'ic_type_id' => 8, 'user_id' => 1],
            ['name' => 'to48273',   'ic_categorie_id' => 3, 'ic_brand_id' => 16, 'ic_type_id' => 10, 'user_id' => 1],
            ['name' => 'SC2721',   'ic_categorie_id' => 3, 'ic_brand_id' => 20, 'ic_type_id' => 9, 'user_id' => 1],
            ['name' => 'UMP510G5',   'ic_categorie_id' => 3, 'ic_brand_id' => 21, 'ic_type_id' => 10, 'user_id' => 1],
            ['name' => 'sce6421',   'ic_categorie_id' => 3, 'ic_brand_id' => 9, 'ic_type_id' => 8, 'user_id' => 1],
            ['name' => 'jdye9955',   'ic_categorie_id' => 3, 'ic_brand_id' => 10, 'ic_type_id' => 8, 'user_id' => 1],

        ];
        foreach ($memorys as $memory) {

            Memory::create(
                [
                    'name' => $memory['name'],
                    'slug' => Str::slug($memory['name']),
                    'ic_categorie_id' => $memory['ic_categorie_id'],
                    'ic_brand_id' => $memory['ic_brand_id'],
                    'ic_type_id' => $memory['ic_type_id'],
                    'user_id' => $memory['user_id'],
                ]
            );
        }
    }
}
