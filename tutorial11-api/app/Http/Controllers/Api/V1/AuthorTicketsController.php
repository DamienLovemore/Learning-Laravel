<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\V1\StoreTicketRequest;
use App\Http\Controllers\Controller;
use App\Http\Filters\V1\TicketFilter;
use App\Http\Resources\V1\TicketResource;
use App\Models\Ticket;

class AuthorTicketsController extends Controller
{
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
}
