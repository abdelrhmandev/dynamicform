<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Field extends Model
{
    use HasFactory;
 

 
    protected $table = 'fields';
    protected $fillable = ['display','name','type','rules','attribute','notices','created_at'];
    protected $guarded = ['id'];
    public $timestamps = true;



    public function values(){
        return $this->hasOne(BuildingValue::class);  
    }

    public function fillables(){
        return $this->hasMany(FieldFillable::class,'field_id');
    }

    public function Getfillables($fillablesObject){
        $fillable = '';
        if ($fillablesObject->count()) {
            foreach ($fillablesObject as $value) {
                $fillable .= "<div class=\"badge py-3 px-4 fs-7 badge-light-primary mt-1\">&nbsp;" . "<span class=\"text-primary\">".$value->display."</span></div> ";
            }
        }
         else {
            $fillable = "<div class=\"badge py-3 px-4 fs-7 badge-light-warning\">&nbsp;" . "<span class=\"text-warning\">لا يوجد</span></div>";
        }
        return $fillable;    
    }



    public function forms(){
        return $this->belongsToMany(Form::class, 'form_field','field_id','form_id')->withPivot('is_required','notices');  
    }

    
 


}
