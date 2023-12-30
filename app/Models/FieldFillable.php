<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class FieldFillable extends Model
{
    use HasFactory;

 
    protected $table = 'field_fillable';
    protected $fillable = ['display','value','field_id'];
    protected $guarded = ['id'];
    public $timestamps = false;

}
