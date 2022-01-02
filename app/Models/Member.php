<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, function($query, $search){

            $query
            ->where('first_name', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%");
        });

    }

    public function membertype()
    {
        return $this->hasMany(MemberType::class);
    }

    public function reminders()
    {
        return $this->belongsToMany(Reminder::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    

    

}
