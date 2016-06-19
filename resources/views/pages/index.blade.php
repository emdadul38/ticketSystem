@extends('layouts.default')
@section('title', 'View All Tickets ')
@section('content')	
    <div class="container col-md-10 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2> Tickets </h2>
                </div>
                <pre>
                @if ($tickets->isEmpty())
                    <p> There is no ticket.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tickets as $ticket)
                                <tr>
                                    <td>{!! $ticket->id !!} </td>
                                    <td><a href="{!! action('TicketsController@show', $ticket->slug) !!}">{!! $ticket->title !!} </a></td>
                                    <td>{!! $ticket->status ? 'Pending' : 'Answered' !!}</td>
                                    <td><a href="{!! action('TicketsController@edit', $ticket->slug) !!}" class="btn btn-info">Edit</a></td>
                                    <td><a href="{!! action('TicketsController@destroy', $ticket->slug) !!}" class="btn btn-info">Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
    </div>
@stop