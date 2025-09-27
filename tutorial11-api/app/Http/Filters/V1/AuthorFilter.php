<?php

namespace App\Http\Filters\V1;

class AuthorFilter extends QueryFilter
{
    protected $sortable = [
        "name",
        "email",
        "createdAt" => "created_at",
        "updatedAt" => "updated_at"
    ];

    public function createdAt($value)
    {
        $dates = explode(",", $value);

        if(count($dates) > 0)
        {
            return $this->builder->whereBetween("created_at", $dates);
        }

        return $this->builder->whereDate("created_at", $value);
    }

    public function include($value)
    {
        //Loads Eager Relationships
        return $this->builder->with($value);
    }

    public function id($value)
    {
        return $this->builder->whereIn(column: "id", values: explode(",", $value));
    }

    public function email($value)
    {
        $like_str = str_replace("*", "%", $value);
        return $this->builder->where("email", "like", $like_str);
    }

    public function name($value)
    {
        $like_str = str_replace("*", "%", $value);
        return $this->builder->where( "name", "ilike", $like_str);
    }

    public function title($value)
    {
        $likeStr = str_replace("*", "%", $value);
        return $this->builder->where("title", "ilike", $likeStr);
    }

    public function updatedAt($value)
    {
        $dates = explode(",", $value);

        if(count($dates) > 0)
        {
            return $this->builder->whereBetween("updated_at", $dates);
        }

        return $this->builder->whereDate("updated_at", $value);
    }
}
