<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Region extends Model
{
 
 

    protected $fillable = ['*']; 
    protected $table = 'regions';
    protected $guarded = ['id'];
    public $timestamps = false;


}
