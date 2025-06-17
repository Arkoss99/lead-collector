<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeadStat extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'new_count',
        'contacted_count',
        'closed_count',
    ];
}
