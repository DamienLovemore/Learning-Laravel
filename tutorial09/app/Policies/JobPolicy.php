<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Job;
use App\Models\User;

class JobPolicy
{
    public function edit(User $user, $p1)
    {
        $id     = (int)base64_decode($p1);
        $job    = Job::find($id);

        return $job->employer->user->is($user);
    }
}
