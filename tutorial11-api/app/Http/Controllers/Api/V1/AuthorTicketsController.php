<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\V1\StoreTicketRequest;
use App\Http\Controllers\Controller;
use App\Http\Filters\V1\TicketFilter;
use App\Http\Resources\V1\TicketResource;
use App\Models\Ticket;
use App\Traits\ApiResponses;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AuthorTicketsController extends Controller
{
    use ApiResponses;

    public function index($author_id, TicketFilter $filters)
    {
        $tickets        = Ticket::where("user_id", $author_id)->filter($filters)->paginate();
        $tickets_json   = TicketResource::collection($tickets);

        return $tickets_json;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($author_id, StoreTicketRequest $request)
    {
        $model = [
            "title"         => $request->input("data.attributes.title"),
            "description"   => $request->input("data.attributes.description"),
            "status"        => $request->input("data.attributes.status"),
            "user_id"       => $author_id
        ];

        $new            = Ticket::create($model);
        $json_response  = new TicketResource($new);

        return $json_response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($author_id, $ticket_id)
    {
        try
        {
            $ticket = Ticket::findOrFail($ticket_id);

            if($ticket->user_id == $author_id)
            {
                $ticket->delete();

                return $this->ok("Ticket succesfully deleted");
            }

            throw new ModelNotFoundException();
        }
        catch(ModelNotFoundException $ticketNotFound)
        {
            return $this->error("Ticket not found", 404);
        }
    }
}
