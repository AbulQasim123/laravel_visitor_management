<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = ['department_name', 'contact_person'];

    public function getCreatedAtAttribute($value)
    {   
        return date('d-m-y H:i', strtotime($value));
    }
    public function getUpdatedAtAttribute($value)
    {   
        return date('d-m-y H:i', strtotime($value));
    }
}

