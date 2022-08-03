<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'responsibleUserId',
        'groupId',
        'createdBy',
        'updatedBy',
        'createdAt',
        'updatedAt',
        'closestTaskAt',
        'accountId',
    ];
}
