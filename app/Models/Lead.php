<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'surname',
        'email',
        'status',
        'created_at',
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
