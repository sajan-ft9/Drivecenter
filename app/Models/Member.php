<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'userid',
        'image',
        'email',
        'phone',
        'address',
        'vehicle',
    ];

    public function payments(){
        return $this->hasMany(Payment::class);
    }

    public function attendances(){
        return $this->hasMany(Attendance::class);
    }
}
