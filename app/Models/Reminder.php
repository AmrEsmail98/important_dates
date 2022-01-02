<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
   * repeates type - weekly -- monthly -- yearly 
   * 
   * @var array
   */
   public const Repeates_Type = [
    0     => 'Weekly',
    1    => 'Monthly',
    2   => 'Yearly',
 ];

    // relations
    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function color() {
        return $this->belongsTo(Color::class);
    }

    public function category() {
       return $this->belongsTo(Category::class);
    }

    public function members() {
        return $this->belongsToMany(Member::class);
    }

    public function deletedReminders() {
        return $this->hasMany(DeletedReminder::class);
    }

    public function finishedReminders() {
        return $this->hasMany(FinishedReminder::class);
    }

    public function notificationTypes() {
        return $this->hasMany(ReminderNotification::class);
    }

    public function attachments() {
        return $this->hasMany(Attachment::class);
    }

    // attributes
    public function getRepeatsTypeAttribute() {
        return Self::Repeates_Type[$this->repeating_type];
    }

    public function getReminderAttachmentsAttribute() {
        return $this->attachments->map(function($attachment){
            return asset("storage/$attachment->name");
        });
    }

    //scopes
    public function scopeBelongsToClient($query, $client_id) {
        return $query->where('client_id', $client_id);
    }

    public function scopeMembers($query, $members) {
        return $query->when($members, function($query) use ($members) {
            return $query->whereHas('members', function ($query) use ($members) {
                return $query->whereIn('id', $members);
             });
        });
    }

    public function scopeHasStartdateOrRepeated($query, $target_date) {
        return $query->when($target_date, function($query) use ($target_date){
            return $query->where('start_date', $target_date)
                    ->orWhere('repeated', true);
        });
    }

    public function scopeBeforeEndDate($query, $target_date) {
        return $query->whereNull('end_date')
            ->orWhereDate('end_date','>=', $target_date);
    }

    public function scopeNotDeleted($query, $target_date) {
       return $query->whereDoesntHave('deletedReminders', function ($query) use ($target_date) {
            return $query->whereDate('date',$target_date);
       });
    }

    public function scopeIsActive($query, bool $active) {
        return $query->where('active', $active);
    }

    public function scopeCategory($query, $category) {
        return $query->when($category, function($query) use ($category) {
           return  $query->where('category_id', $category);
        });
    }

    public function scopeFilter($query, $keyword) {

        $query->when($filters['search'] ?? false, function($query) use ($keyword){
            $query->where('title', 'LIKE', "%{$keyword}%");
        });

    }
}
