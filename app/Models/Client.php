<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $guard = 'client';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, function($query, $search){

            $query
            ->where('first_name', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%");
        });

    }


    protected $hidden = [
        'password',
        'remember_token',
    ];



    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function sendPasswordResetNotification($token)
    {
        $url = "http://127.0.0.1:8000/reset-passowrd?token=$token";

        $this->notify(new ResetPasswordNotification($url));
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

}
