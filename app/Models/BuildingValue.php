<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class BuildingValue extends Model
{
    use HasFactory;
 

 
    protected $table = 'building_values';
    protected $fillable = ['form_id','field_id','field_fillable_id','fill_answer_text'];
    public $timestamps = false;



 


}
