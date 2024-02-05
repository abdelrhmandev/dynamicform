<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class District extends Model
{
 
 

    protected $fillable = ['*']; 
    protected $table = 'districts';
    protected $guarded = ['id'];
    public $timestamps = false;


}
