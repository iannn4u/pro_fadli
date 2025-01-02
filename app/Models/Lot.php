<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    use HasFactory;

    protected $guarded = ["id_lot"];

    public $primaryKey = "id_lot";

    
    public function daily() {
        return $this->belongsTo(Daily::class, 'id_daily');
    }
}
