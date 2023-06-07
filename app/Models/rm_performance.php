<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rm_performance extends Model
{
    use HasFactory;
    protected $table ='rm_performance';

    public function customer()
    {
        return $this->belongsTo(customer::class);
    }

    public function vendor()
    {
        return $this->belongsTo(vendor::class);
    }

    public function line()
    {
        return $this->belongsTo(line::class);
    }

     public function rak()
    {
        return $this->belongsTo(rak::class);
    }
}
