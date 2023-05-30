<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactMailRequest;
use Illuminate\Http\Request;
use App\Mail\ContactEmail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
  /**
  * Show the create Contact form.
  *
  * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
  */
  public function index() {
    return view('contact');
  }
  public function send(ContactMailRequest $request) {
    try {
      Mail::to(env('RECEIVE_EMAIL'))->send(new ContactEmail());
    } catch(\Exception $e) {
      return redirect()->route('contact.show')->with('error', $e->getMessage());
    }

    return redirect()->route('contact.show')->with('success', __('Thank you!').' '.__('We\'ve received your message.'));
  }
}