<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class DemandeMigration extends Model
{
    use HasFactory;

    protected $fillable = [
        'contract',
        'current_offre',
        'desired_offre',
        'gsm',
        'state',
        'message',
        'client_id',
    ];
    
}