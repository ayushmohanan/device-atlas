<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class DeviceDetail extends Model
{
    use HasFactory;
    protected $table = 'device_details';
    protected $fillable = [
        'primary_hardware_type',
        'os_version',
        'vendor',
        'browser_version',
        'browser_name',
        'model',
        'os_name',
        'browser_rendering_engine',
    ];
}
