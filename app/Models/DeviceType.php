<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeviceType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'note'];

    public function devices(): HasMany
    {
        return $this->hasMany(Device::class, 'type_id');
    }
}
