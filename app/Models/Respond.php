<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Respond extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['rti_id', 'subject', 'message'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('mail_attachment');
    }

    public function rti()
    {
        return $this->belongsTo(Rti::class, 'rti_id');
    }
}
