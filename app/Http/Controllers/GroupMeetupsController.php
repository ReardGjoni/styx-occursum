<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Groups;
use Illuminate\Support\Facades\DB;

class GroupMeetupsController extends Controller {
    public function show($id) {
        // Get a single Group with all the Meetups
        $withMeetups = DB::table('groups')
                       ->where('groups.id', '=', $id)
                       ->join('meetups', 'groups.id', '=', 'meetups.group_id')
                       ->select('groups.id AS group_id',
                                'groups.name AS group_name',
                                'groups.description AS group_description',
                                'meetups.id AS meetup_id',
                                'meetups.title AS meetup_title',
                                'meetups.description AS meetup_description',
                                'meetups.place AS meetup_place',
                                'meetups.time_happening AS time_happening',
                                'meetups.created_by AS meetup_created_by',
                                'meetups.group_id AS meetup_group_id',
                                'meetups.comments AS meetup_comments',
                                'meetups.created_at AS meetup_created_at',
                                'meetups.updated_at AS meetup_updated_at')
                        ->orderBy('time_happening', 'desc')
                        ->paginate(5);

    return response()->json($withMeetups, 200);
    }
}
