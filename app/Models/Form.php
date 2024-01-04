<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
 
    protected $table = 'forms';
    protected $fillable = ['title','status'];
    protected $guarded = ['id'];


 

    public function fields(){
        return $this->belongsToMany(Field::class, 'form_field','form_id','field_id')->withPivot('is_required','notices');  
    }



}
