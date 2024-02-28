<?php
namespace App\Models;/////
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Building extends Model
{
    use HasFactory;
 

 
    protected $table = 'buildings';
    protected $fillable = ['building_type_id','created_at'];
    public $timestamps = true;


    public function submissions(){
        return $this->hasMany(BuildingSubmission::class,'building_id','id');
    }
 
    public function type(){
        return $this->belongsTo(BuildingType::class,'building_type_id','id');
    }

}
