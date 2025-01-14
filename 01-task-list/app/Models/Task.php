<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Mass assginment
    // You can set or modify multiple columns at once in this $fillable array
    protected $fillable = [
        'title',
        'description',
        'long_description',
    ];

    public function toggleComplete()
    {
        $this->completed = ! $this->completed;
        $this->save();
    }
}
