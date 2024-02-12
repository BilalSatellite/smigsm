<?php

namespace Database\Seeders;

use App\Models\Ic\BrandIc;
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
        $icbrands = [
            'Qualcomm', 'Mediatek', 'Spreadtrum', 'Exynos', 'Samsung',
            'Apple', 'Kirin', 'Broadcom', 'Intel', 'Rda/Coolsand', 'Infineon',
            'Rockchip', 'Allwinner', 'SanDisk', 'SK hynix', 'Toshiba', 'Alliance', 'ATP',
            'Greenliant', 'Micron', 'Texas Instruments'
        ];
        foreach ($icbrands as $brand) {
            BrandIc::create(
                ['name' => $brand, 'slug' => Str::slug($brand)]
            );
        }
    }
}
