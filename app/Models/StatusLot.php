<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusLot extends Model
{
    use HasFactory;
    
    protected $guarded = ["id_status"];
    public $primaryKey = "id_status";

    public function user() {
        return $this->belongsTo(User::class, 'changed_by', 'id_user');
    }
}
