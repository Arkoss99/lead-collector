<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'surname',
        'email',
        'status',
        'created_at',
    ];
     protected $casts = [
        'phone' => 'encrypted',
    ];
    public function details()
    {
        return $this->hasMany(LeadDetail::class);
    }
    public function documents()
    {
        return $this->hasMany(LeadDocument::class);
    }
}
