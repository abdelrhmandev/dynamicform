<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class City extends Model
{
 
 

    protected $fillable = ['*']; 
    protected $table = 'cities';
    protected $guarded = ['id'];
    public $timestamps = false;


}
