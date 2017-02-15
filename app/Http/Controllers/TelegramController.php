<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TelegramController extends Controller
{
  public function getHome()
 {
     return view('home');
 }

 public function getUpdates()
 {
     $updates = Telegram::getUpdates();
     dd($updates);
 }
}
