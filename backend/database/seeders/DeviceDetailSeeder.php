<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DeviceDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $deviceDetails = [
            [
                'primary_hardware_type' => 'Tablet',
                'os_version' => '7.0',
                'vendor' => 'Google',
                'browser_version' => '52.0.2743.98',
                'browser_name' => 'Chrome',
                'model' => 'Pixel C',
                'os_name' => 'Android',
                'browser_rendering_engine' => 'Blink',
            ],
            [
                'primary_hardware_type' => 'Mobile Phone',
                'os_version' => '10',
                'vendor' => 'Huawei',
                'browser_version' => '112.0.0.0',
                'browser_name' => 'Chrome',
                'model' => 'MAR-LX1A',
                'os_name' => 'Android',
                'browser_rendering_engine' => 'Blink',
            ],
            [
                'primary_hardware_type' => 'Mobile Phone',
                'os_version' => '12.0',
                'vendor' => 'Apple',
                'browser_version' => '12.0',
                'browser_name' => 'Safari',
                'model' => 'iPhone',
                'os_name' => 'iOS',
                'browser_rendering_engine' => 'WebKit',
            ],
            [
                'primary_hardware_type' => 'Tablet',
                'os_version' => '4.4.3',
                'vendor' => 'Amazon',
                'browser_version' => '47.1.79',
                'browser_name' => 'Amazon Silk',
                'model' => 'Kindle Fire HDX 7',
                'os_name' => 'Android',
                'browser_rendering_engine' => 'Blink',
            ],
            [
                'primary_hardware_type' => 'Tablet',
                'os_version' => '18.3',
                'vendor' => 'Apple',
                'browser_version' => '112.0.5615.46',
                'browser_name' => 'Chrome',
                'model' => 'iPad',
                'os_name' => 'iPadOS',
                'browser_rendering_engine' => 'WebKit',
            ],
            [
                'primary_hardware_type' => 'Mobile Phone',
                'os_version' => '12',
                'vendor' => 'Redmi',
                'browser_version' => '112.0.0.0',
                'browser_name' => 'Chrome',
                'model' => 'Note 9 Pro',
                'os_name' => 'Android',
                'browser_rendering_engine' => 'Blink',
            ],
            [
                'primary_hardware_type' => 'Tablet',
                'os_version' => '12',
                'vendor' => 'Samsung',
                'browser_version' => '80.0.3987.119',
                'browser_name' => 'Chrome',
                'model' => 'SM-X906C',
                'os_name' => 'Android',
                'browser_rendering_engine' => 'Blink',
            ],
            [
                'primary_hardware_type' => 'Tablet',
                'os_version' => '10',
                'vendor' => 'Acer',
                'browser_version' => null,
                'browser_name' => 'Chrome',
                'model' => 'ACTAB1021',
                'os_name' => 'Android',
                'browser_rendering_engine' => 'Blink',
            ],
            [
                'primary_hardware_type' => 'Mobile Phone',
                'os_version' => '13',
                'vendor' => 'Samsung',
                'browser_version' => '112.0.0.0',
                'browser_name' => 'Chrome',
                'model' => 'SM-A515U',
                'os_name' => 'Android',
                'browser_rendering_engine' => 'Blink',
            ],
            [
                'primary_hardware_type' => 'Tablet',
                'os_version' => '5.0.2',
                'vendor' => 'LG',
                'browser_version' => '34.0.1847.118',
                'browser_name' => 'Chrome',
                'model' => 'V410',
                'os_name' => 'Android',
                'browser_rendering_engine' => 'Blink',
            ],
        ];

        foreach ($deviceDetails as $device) {
            DB::table('device_details')->updateOrInsert(
                [
                    'primary_hardware_type' => $device['primary_hardware_type'],
                    'os_version' => $device['os_version'],
                    'vendor' => $device['vendor'],
                    'model' => $device['model'],
                ],
                $device
            );
        }
    }
}
