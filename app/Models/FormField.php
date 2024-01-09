<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{
    use HasFactory;
 
    protected $table = 'form_field';
    protected $fillable = ['field_id','form_id','is_required','notices'];
    protected $guarded = ['id'];
}
