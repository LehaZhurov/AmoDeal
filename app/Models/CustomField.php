<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EnumItem;
class CustomField extends Model
{
    use HasFactory;

    protected $fillable = [
        'fieldId',
        'fieldCode',
        'fieldName',
    ];


    public function enums(){
        return $this->belongsToMany(EnumItem::class);
    }
    
}
