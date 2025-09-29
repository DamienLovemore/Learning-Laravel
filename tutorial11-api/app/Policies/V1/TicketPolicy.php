<?php

namespace App\Policies\V1;

use App\Models\Ticket;
use App\Models\User;

class TicketPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Ticket $ticket)
    {
        //User $user will be the current logged in User
        $check = $user->id === $ticket->user_id;

        return $check;
    }
}
