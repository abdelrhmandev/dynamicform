<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class BuildingType extends Model
{

    protected $table = 'building_types';
    protected $fillable = ['title'];
    protected $guarded = ['id'];
    public $timestamps = true;

   


    public function form(){
        return $this->belongsTo(Form::class);
    }


}
