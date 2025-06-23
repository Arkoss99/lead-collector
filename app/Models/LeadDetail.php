<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeadDetail extends Model
{

    use HasFactory, SoftDeletes;
    protected $fillable = [
        'lead_id',
        'question_id',
        'answer',
    ];

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }
    public function question()
    {
        return $this->belongsTo(LeadQuestion::class);
    }
    
}

