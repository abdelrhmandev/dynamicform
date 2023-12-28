<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class FieldElement extends Model
{
 
    protected $table = 'fields';
    protected $fillable = ['name','display','type','notices','fillable'];
    protected $guarded = ['id'];
}
