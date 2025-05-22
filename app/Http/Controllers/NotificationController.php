<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationUpdateRequest;
use App\Models\NotificationChannel;
use App\Models\NotificationGroup;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function edit(): View
    {
        return view('notifications.edit', [
            'notificationChannels' => NotificationChannel::get(),
            'notificationGroups' => NotificationGroup::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NotificationUpdateRequest $request): RedirectResponse
    {
        $request->user()->notificationPreferences()->sync(
            $request->collect('notifications')
                ->mapWithKeys(fn ($channels, $notificationId) => [
                    $notificationId => ['channels' => $channels],
                ])
        );

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
