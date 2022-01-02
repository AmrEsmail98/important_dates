<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $guarded = ['created_at', 'updated_at'];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    public function reminders()
    {
        return $this->hasMany(Reminder::class);
    }
}
