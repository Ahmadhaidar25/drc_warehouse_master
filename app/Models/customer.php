<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $table ='customer';

    public function rm_performance()
    {
       return $this->hashMany(rm_performance::class);
    }
}
