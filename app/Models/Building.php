<?php
namespace App\Models;/////
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Building extends Model
{
    use HasFactory;
 

 
    protected $table = 'buildings';
    protected $fillable = ['form_id','field_id','field_fillable_id','fill_answer_text'];
    public $timestamps = false;



 


}
