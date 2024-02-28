<?php
namespace App\Models;/////
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class BuildingSubmission extends Model
{
    use HasFactory;
 

 
    protected $table = 'building_submission';
    protected $fillable = ['building_id','field_id','field_fillable_id','fill_answer_text'];
    public $timestamps = true;



    public function field(){
        return $this->belongsTo(Field::class,'field_id','id');
    }


    public function building(){
        return $this->belongsTo(Building::class,'building_type_id','id');
    }

   

}
