<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TicketFormRequest;
use App\Ticket;

class TicketsController extends Controller
{
	/*
    *	index page all ticket list
    */
	public function index(){
		$tickets = Ticket::all();
		return view('pages.index', compact('tickets'));
		/*//return view("pages.index")->with('tickets', $tickets);
		return view('pages.index', ['tickets' => $tickets]);*/
	}
    public function create(){
    	return view('pages.create');
    }

    public function store(TicketFormRequest $request){
    	$slug = uniqid();
	    $ticket = new Ticket(array(
	        'title' => $request->get('title'),
	        'content' => $request->get('content'),
	        'slug' => $slug
	    ));

	    $ticket->save();
	    return redirect('/create')->with('status', 'Your ticket has been created! Its unique id is: '.$slug);
    }
    /*
    *	Show single ticket
    */
    public function show($slug){
    	$ticket = Ticket::whereSlug($slug)->firstOrFail();
    	$comments = $ticket->comments()->get();
    	return view('pages.show', compact('ticket', 'comments'));
    }
    /*
    * Edit single Ticket
    */
    public function edit($slug){
    	$ticket = Ticket::whereSlug($slug)->firstOrFail();
    	return view('pages.edit', compact('ticket'));
    }
    /*
    * 	Update sngle Ticket
    */
    public function update($slug, TicketFormRequest $request){
    	$ticket = Ticket::whereSlug($slug)->firstOrFail();
    	$ticket->title = $request->get('title');
    	$ticket->content = $request->get('content');
    	if($request->get('status') != null ){
    		$ticket->status = 0;
    	}else{
    		$ticket->status = 1;
    	}
    	$ticket->save();
    	return redirect(action('TicketsController@edit', $ticket->slug))->with('status', 'the Ticket '.$slug.' has been updated');
    }
    public function destroy($slug){
    	$ticket = Ticket::whereSlug($slug)->firstOrFail();
    	$ticket->delete();
    	return redirect('/tickets')->with('status', 'The ticket '.$slug.' has been delete !!');
    }
}
