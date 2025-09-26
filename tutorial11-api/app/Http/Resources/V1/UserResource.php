<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            "type"          => "user",
            "id"            => $this->id,
            "attributes"    => [
                "name"              => $this->name,
                "email"             => $this->email,
                //Multiples values returned with a single condition
                $this->mergeWhen($request->routeIs("authors.*"), [
                    "emailVerifiedAt" => $this->email_verified_at,
                    "createdAt" => $this->created_at,
                    "updatedAt" => $this->updated_at
                ]),
            ],
            "includes" => TicketResource::collection($this->whenLoaded("tickets")),//Only appear in here if the query param tickets is passed
            "links"         => [
                "self" => route("authors.show", ["author" => $this->id])
            ]
        ];

        return $data;
    }
}
