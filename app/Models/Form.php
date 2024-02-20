<?php
namespace App\Models;
use App\Models\Region;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Form extends Model
{
    use HasFactory;
 ///
    protected $table = 'forms';
    protected $fillable = ['title','mobile','id_number','region_id','address_info','gender'];
    protected $guarded = ['id'];

    public $timestamps = true;
 

    public function fields(){

        return $this->belongsToMany(Field::class, 'form_field','form_id','field_id');  

        // return $this->belongsToMany(Field::class, 'form_field','form_id','field_id')->withPivot('is_required','is_disabled','summable');  
    }


 
    public function region(){
        return $this->belongsTo(Region::class,'region_id','id');
    }


}
