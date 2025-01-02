<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daily extends Model
{
    use HasFactory;

    protected $guarded = ["id_dialy"];

    public $primaryKey = "id_daily";
    
    public function lot() {
        return $this->belongsTo(Lot::class, 'id_lot');
    }
}
