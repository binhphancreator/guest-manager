<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Guest;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'group_name'
    ];

    public function guests()
    {
        return $this->hasMany(Guest::class);
    }
}
