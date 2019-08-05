<?php

namespace App\Models;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Meetups extends Model {
    protected $fillable = [
        'title', 'description', 'place', 'time_happening', 'created_by', 'group_id'
    ];

    public function User() {
        return $this->belongsTo(User::class);
    }

    public function Comments() {
        return $this->hasMany(Comments::class);
    }

    public function Groups() {
        return $this->belongsTo(Groups::class);
    }

    public static function createFromArray($data, Request $request) {

        // Create a new meetup with the given data.
        $user_id = Auth::id();
        $meetup = self::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'place' => $data['place'],
            'time_happening' => $data['time_happening'],
            'created_by' => $user_id,
            'group_id' => $data['group_id']
        ]);
        
        // Return the newly created meetup.
        return $meetup;
    }


    public function updateFromArray($data) {
        $user_id = Auth::id();

        // Update this Meetup.
        $this->title = $data['title'];
        $this->description = $data['description'];
        $this->place = $data['place'];
        $this->time_happening = $data['time_happening'];
        $this->created_by = $user_id;
        $this->save();


        // Return the updated created meetup.
        return $this;
    }
}
