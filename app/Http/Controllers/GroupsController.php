<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Groups;

class GroupsController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // Get Meetups
        $groups = Groups::paginate(10);

        // Return collection of Meetups as a resource
        return $groups;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        // Get a single Meetup
        $groups = Groups::findOrFail($id);

        // Return the single Meetup as a resource
        return $groups;
    }

    public function search(Request $request) {
        $search = $request->get('q');

        $result = Groups::where('name', 'like', '%' . $search . '%')->get();
    
        return $result;
    }
}
