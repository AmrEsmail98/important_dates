<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponser;

class NotificationController extends Controller
{
    use ApiResponser;
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user = auth()->user();
        return $this->success($user->unreadNotifications, 'unread Notifications.');
    }

    public function markAllAsRead() {
        $user = auth()->user();
        $user->unreadNotifications->markAsRead();
        return $this->success(null, 'All Notifications Maked As Read');
    }
}
