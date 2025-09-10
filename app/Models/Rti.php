<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rti extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ["user_id", "full_name", "gardian_type", "gardian_name", "permanent_address", "request_information", "is_info_given", "info_by_authority", "application_fee", "application_fee_challan", "is_bpl", "concent"];

    protected $casts = [
        "permanent_address" => 'array',
        "request_information" => 'array',
        "concent" => 'array'
    ];
}