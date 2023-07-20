<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;




use function Ramsey\Uuid\v1;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $notifications=auth()->user()->notifications()->paginate(5);
        return view('notification.index',compact('notifications'));
    }

    public function read(DatabaseNotification $notification ){
        $notification->markAsRead();
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
