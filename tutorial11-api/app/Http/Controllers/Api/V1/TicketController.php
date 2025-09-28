<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Ticket;
use App\Models\User;
use App\Http\Resources\V1\TicketResource;
use App\Http\Requests\Api\V1\StoreTicketRequest;
use App\Http\Requests\Api\V1\UpdateTicketRequest;
use App\Http\Filters\V1\TicketFilter;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TicketController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index(TicketFilter $filters)
    {
        $tick_user  = Ticket::filter($filters)->paginate();
        $data       = TicketResource::collection($tick_user);

        return $data;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {
        try
        {
            $user_id    = $request->input("data.relationships.author.data.id");
            $user       = User::findOrFail($user_id);
        }
        catch(ModelNotFoundException $userNotFound)
        {
            return $this->ok("User not found!", ["error" => "The provided user id does not exists"]);
        }

        $model = [
            "title"         => $request->input("data.attributes.title"),
            "description"   => $request->input("data.attributes.description"),
            "status"        => $request->input("data.attributes.status"),
            "user_id"       => $request->input("data.relationships.author.data.id")
        ];

        $new            = Ticket::create($model);
        $json_response  = new TicketResource($new);

        return $json_response;
    }

    /**
     * Display the specified resource.
     */
    public function show($ticket_id)
    {
        try
        {
            $ticket = Ticket::findOrFail($ticket_id);

            if($this->include("author"))
            {
                //Eager load a relationship
                $tick_user      = $ticket->load("user");
                $ticket_json    = new TicketResource($tick_user);
                return $ticket_json;
            }

            $ticket_json = new TicketResource($ticket);
        }
        catch(ModelNotFoundException $ticketNotFound)
        {
            return $this->error("Ticket cannot be found", 404);
        }

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
    public function destroy($ticket_id)
    {
        try
        {
            $ticket = Ticket::findOrFail($ticket_id);
            $ticket->delete();

            return $this->ok("Ticket succesfully deleted");
        }
        catch(ModelNotFoundException $ticketNotFound)
        {
            return $this->error("Ticket not found", 404);
        }
    }
}
