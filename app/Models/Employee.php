<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['company_id','first_name','last_name','email','phone','deleted_at'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
