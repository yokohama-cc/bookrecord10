<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssignedBook extends Model
{
    use HasFactory;

    protected $fillable = ['team_id','book_id'];
    
     
    public function book(){
        return $this->belongsTo(Book::class);
    }
}
