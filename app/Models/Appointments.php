<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'UID',
        'customerUID',
        'consultantUID',
        'startDate',
        'status'
    ];
    
}
