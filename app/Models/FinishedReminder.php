<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinishedReminder extends Model
{
    use HasFactory;

    protected $fillable = ['status','reminder_id'];

      /**
   * reminder's status
   * 
   * @var array
   */
   public const STATUSES = [
    0     => 'Missed',
    1    => 'Done'
   ];

    public function reminder() {
        return $this->belongsTo(Reminder::class);
    }

    public function scopeClient($query, $client_id) {
        return $query->wherehas('reminder', function($query) use($client_id) {
            return $query->belongsToClient($client_id);
        });
    }

    public function scopeCategory($query, $category_id) {
        return $query->wherehas('reminder', function($query) use($category_id) {
            return $query->category($category_id);
        });
    }

    public function scopeMembers($query, $member_id) {
        return $query->wherehas('reminder', function($query) use($member_id) {
            return $query->members($member_id);
        });
    }

    public function scopeDate($query, $date){
        return $query->whereDate('date', $date);
    }

    public function getReminderStatusAttribute() {
        return Self::STATUSES[$this->status];
    }
}
