<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
class PingController extends Controller
{
    public function ping()
    {
        $message = 'Pong!';
        $title = 'Ping!';
        $Description = 'This is the ping page.';
        return view('ping', [
        'message' => $message,
        'title' => $title,
        'description' => $Description,
    ]);
}
}
?>