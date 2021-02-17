<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function author()
    {
    	return $this->belongsTo(Author::class);
    }

    public function lemary()
    {
    	return $this->belongsTo(Lemary::class);
    }

    public function penerbit()
    {
    	return $this->belongsTo(Penerbit::class);
    }

    public function tahun()
    {
    	return $this->belongsTo(Tahun::class);
    }
}
