<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'category_id' => 2,
            'brand_id' => 5,
            'name' => 'ROG Zephyrus G14 (2023)',
            'slug' => 'rog-zephyrus-g14-2023',
            'price' => 23999000,
            'description' => '<p>Type: GA402NJ-R735K6G-O</p><p>Operating System: AMD Ryzen™ 7 7735HS Mobile Processor (8-core/16-thread, 16MB L3 cache, up to 4.7 GHz max boost)</p><p>Graphics Card: NVIDIA® GeForce RTX™ 3050 Laptop GPU ROG Boost: 1782MHz at 95W (1732MHz Boost Clock+50MHz OC, 80W+15W Dynamic Boost)<p><p>Memory: 8GB DDR5 on board 8GB DDR5-4800 SO-DIMM Max Capacity: 24GB Support dual channel memory</p><p>Display: 14-inch, FHD+ 16:10 (1920 x 1200, WUXGA), IPS-level anti-glare display, sRGB: 100%, Adobe: 75.35% Refresh Rate: 144Hz, Response Time: 3ms, Adaptive-Sync, Pantone Validated, MUX Switch, Support Dolby Vision HDR</p><p>Storage: 512GB PCIe® 4.0 NVMe™ M.2 SSD</p><p>Ports I/O: 1x 3.5mm Combo Audio Jack, 1x HDMI 2.1 FRL, 2x USB 3.2 Gen 2 Type-A, 1x USB 3.2 Gen 2 Type-C support display, 1x Type C USB 4 support DisplayPort™ / power delivery, 1x card reader (microSD) (UHS-II) </p><p>Camera: 1080P FHD IR Camera for Windows Hello</p><p>Audio: Smart Amp Technology, Dolby Atmos, AI noise-canceling technology, Hi-Res certification, Built-in 3-microphone array, 4-speaker system with Smart Amplifier Technology</p><p>Networks and Coms: Wi-Fi 6E(802.11ax) (Triple band) 2*2 + Bluetooth® 5.3 Wireless Card</p><p>Battery: ø6.0, 200W AC Adapter, Output: 20V DC, 10A, 200W, Input: 100-240V AC, 50/60Hz universal</p><p>Weight: 1.65 Kg</p><p>Dimension(W x D x H): 31.2 x 22.7 x 1.85 cm</p>',
            'stock' => 5
        ]);

        Product::factory(20)->create();
    }
}
