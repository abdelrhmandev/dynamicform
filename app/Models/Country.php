<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Country extends Model
{
 
 

    protected $fillable = ['*']; 
    protected $table = 'countries';
    protected $guarded = ['id'];
    public $timestamps = false;


}
