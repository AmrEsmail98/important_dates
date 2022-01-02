<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'color_id'
    ];

    public function reminders() {
        return $this->hasMany(Reminder::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }
}
