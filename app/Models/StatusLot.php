<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusLot extends Model
{
    use HasFactory;

    protected $guarded = ["id_status_lot"];
    public $primaryKey = "id_status_lot";
}
