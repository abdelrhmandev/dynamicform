<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class FormElement extends Model
{
 
    protected $table = 'form_elements';
    protected $fillable = ['display','name','type','is_required','notices','fillable'];
    protected $guarded = ['id'];
}
