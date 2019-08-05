<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meetups;
use App\Models\User;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Auth;



class MeetupsController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // Get Meetups
        $meetups = Meetups::paginate(30);
        // Return collection of Meetups as a resource
        return $meetups;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|max:30',
            'description' => 'required|max:455',
            'place' => 'required',
            'time_happening' => 'required|date',
        ]);


        $meetup = Meetups::createFromArray($request->toArray(), $request);

        return response()->json($meetup);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        // Get a single Meetup
        /* $meetup = DB::table('meetups')
                       ->where('meetups.id', '=', $id)
                       ->join('attending', 'meetups.id', '=', 'attending.meetup_id')
                       ->select('*', 'attending.user_id AS going')
                       ->get()
                       ->groupBy('going'); */

        $meetup = Meetups::findOrFail($id);

        // Return the single Meetup as a resource
        return response()->json($meetup, 200);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id) {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meetups $id) {

        $created_by_column = Meetups::findOrFail($id)->pluck('created_by')->toArray();

        
        $user_id = Auth::id();
        
        //dd($user_id,);
        //dd($created_by_column);

        if ($user_id !== $created_by_column) {
            $request->validate([
                'title' => 'required|max:30',
                'description' => 'required|max:455',
                'place' => 'required',
                'time_happening' => 'date',
            ]);
    
            $id->updateFromArray($request->toArray());
            return response()->json($id);
        } else {
            return response()->json("This event is not created by you, therefore you don't have permissions to edit it. If you disagree with the meeting time or place, please contact the organizer.", 403);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        // Get a single Meetup
        $meetup = Meetups::findOrFail($id);

        if ($meetup->delete()) {
            return new $meetup;
        }
    }
}
