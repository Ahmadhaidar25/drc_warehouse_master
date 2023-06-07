<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class line extends Model
{
    use HasFactory;
    protected $table = 'line';

    public function rm_performance()
    {
     return $this->hashMany(rm_performance::class);
 }
}
