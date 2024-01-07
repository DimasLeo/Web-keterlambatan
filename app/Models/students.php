<?php

namespace App\Models;

use App\Models\rombels;
use App\Models\rayons;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    use HasFactory;
    protected $fillable = [
        'nis',
        'name',
        'rayon_id',
        'rombel_id',
        
    ];

    public function rombels()
    {
        return $this->belongsTo(rombels::class, 'rombel_id', 'id');
    }
    
    public function rayons()
    {
        return $this->belongsTo(rayons::class,'rayon_id', 'id');
    }

    public function lates()
    {
        return $this->belongsTo(lates::class, 's');
    }
}
