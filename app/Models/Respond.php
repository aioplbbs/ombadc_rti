<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respond extends Model
{
    use HasFactory;

    protected $fillable = ['rti_id', 'subject', 'message', 'attachments'];

    protected $casts = [
        "attachments" => 'array'
    ];

    public function rti()
    {
        return $this->belongsTo(Rti::class, 'rti_id');
    }
}
