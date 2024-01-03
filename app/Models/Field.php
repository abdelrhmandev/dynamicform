<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Field extends Model
{
    use HasFactory;
    protected $with = ['FieldFillable'];

 
    protected $table = 'fields';
    protected $fillable = ['display','name','type','notices','created_at'];
    protected $guarded = ['id'];
    public $timestamps = true;


    public function FieldFillable(){
        return $this->hasMany(FieldFillable::class,'field_id');
    }

}
