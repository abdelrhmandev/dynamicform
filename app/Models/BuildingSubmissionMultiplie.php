<?php
namespace App\Models;/////
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class BuildingSubmissionMultiplie extends Model
{
    use HasFactory;
 

 
    protected $table = 'building_submission_multiple';
    protected $fillable = ['building_submission_id','field_fillable_id'];
    protected $guarded = ['id'];
    public $timestamps = false;

 
 
   

}
