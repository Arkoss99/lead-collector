<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeadFile extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'lead_id',
        'file_path',
        'uploaded_at',
    ];

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }
}
