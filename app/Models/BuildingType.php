<?php
namespace App\Models;
use App\Models\Form;
use Illuminate\Database\Eloquent\Model;
 



class BuildingType extends Model
{
    protected $table = 'building_types';  
    protected $fillable = ['title','image','color','form_id'];     
    protected $guarded = ['id'];
    public $timestamps = true;

 
   

    public function form(){
        return $this->belongsTo(Form::class,'form_id','id');
    }
   


}
