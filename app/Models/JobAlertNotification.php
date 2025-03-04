<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobAlertNotification extends Model
{
    use HasFactory;


    // Define the table associated with the model (optional if it matches the plural of the model name)
    protected $table = 'job_alert_notifications';

    // Define the fillable fields (if you need to mass assign them)
    protected $fillable = [
        'candidate_id', // Foreign key to Candidate
        'job_alert_id', // Foreign key to JobAlert
        'notification_message',
        'read_at', // Optional: if you want to mark notifications as read
    ];

    // Cast the 'read_at' field as a datetime (optional)
    protected $casts = [
        'read_at' => 'datetime',
    ];

    // Define relationships (optional based on your application design)
    
    // Each JobAlertNotification belongs to a Candidate
    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    // Each JobAlertNotification can be related to a JobAlert
    public function jobAlert()
    {
        return $this->belongsTo(JobAlert::class);
    }

    // Example: If you want a method to mark notifications as read
    public function markAsRead()
    {
        $this->update(['read_at' => now()]);
    }

}
