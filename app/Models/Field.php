<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Field extends Model
{
    use HasFactory;
    protected $with = ['fillable'];

 
    protected $table = 'fields';
    protected $fillable = ['display','name','type','created_at'];
    protected $guarded = ['id'];
    public $timestamps = true;


    public function fillable(){
        return $this->hasMany(FieldFillable::class);
    }

}
