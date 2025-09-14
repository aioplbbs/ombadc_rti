<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Rti extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = ["user_id", "full_name", "gardian_type", "identity", "gardian_name", "permanent_address", "request_information", "is_info_given", "info_by_authority", "application_fee", "application_fee_challan", "is_bpl", "concent"];

    protected $casts = [
        "permanent_address" => 'array',
        "request_information" => 'array',
        "concent" => 'array'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('identity_documents');
        $this->addMediaCollection('challan_documents');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getFullAddressAttribute()
    {
        $address = $this->permanent_address;
        if (is_array($address)) {
            return implode(', ', array_filter($address));
        }

        return (string) $address;
    }
}