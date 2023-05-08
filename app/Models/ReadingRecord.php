<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReadingRecord extends Model
{
    use HasFactory;

    protected $fillable = ['book_id','reader_id','year_read','month_read','report'];
    public function book(){
        return $this->belongsTo(Book::class);
    }
    public function reader(){
        return $this->belongsTo(Reader::class);
    }
}
