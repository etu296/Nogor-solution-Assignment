<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    
    protected $fillable = ['name','email','image','gender','skill'];

    public function setSkillAttribute($value)
    {
        $this->attributes['skill'] = json_encode($value);
    }

    public function getSkillAttribute($value)
    {
        return $this->attributes['skill'] = json_decode($value);
    }

}
