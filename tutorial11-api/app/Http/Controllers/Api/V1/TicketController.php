<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Ticket;
use App\Http\Resources\V1\TicketResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreTicketRequest;
use App\Http\Requests\Api\V1\UpdateTicketRequest;

class TicketController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if($this->include("author"))
        {
            $tick_user = Ticket::with("user")->paginate();

            $data = TicketResource::collection($tick_user);
            return $data;
        }

        //Transform models into an output of JSON that follows the rules convention at JSONAPI.org
        $data = TicketResource::collection(Ticket::paginate());

        return $data;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        if($this->include("author"))
        {
            //Eager load a relationship
            $tick_user      = $ticket->load("user");
            $ticket_json    = new TicketResource($tick_user);
            return $ticket_json;
        }

        $ticket_json = new TicketResource($ticket);

        return $ticket_json;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
