<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Field extends Model
{
    use HasFactory;
 

 
    protected $table = 'fields';
    protected $fillable = ['display','name','type','rules','notices','created_at'];
    protected $guarded = ['id'];
    public $timestamps = true;


    public function fillables(){
        return $this->hasMany(FieldFillable::class,'field_id');
    }



    public function forms(){
        return $this->belongsToMany(Form::class, 'form_field','field_id','form_id')->withPivot('notices');  
    }

    

}
