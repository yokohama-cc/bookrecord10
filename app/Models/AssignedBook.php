<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedBook extends Model
{
    use HasFactory;

    protected $fillable = ['department_id','book_id'];
    
     
    public function book(){
        return $this->belongsTo('App\Book');
    }
}
