<?php

namespace App\Http\Filters\V1;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilter
{
    protected $builder;
    protected $request;
    protected $sortable = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply(Builder $builder)
    {
        $this->builder = $builder;

        //Loops through all the query strings parameters
        foreach($this->request->all() AS $key => $value)
        {
            //If we have a method for this parameter
            if(method_exists($this, $key))
            {
                $this->$key($value);
            }
        }

        return $builder;
    }

    protected function filter($arr)
    {
        foreach($arr AS $key => $value)
        {
            //If we have a method for this parameter
            if(method_exists($this, $key))
            {
                $this->$key($value);
            }
        }

        return $this->builder;
    }

    protected function sort($value)
    {
        $sort_attrs = explode(",", $value);

        foreach($sort_attrs AS $attr)
        {
            $direction = "asc";

            if(str_starts_with($attr, "-"))
            {
                $direction = "desc";
                $attr      = substr($attr, 1);
            }

            if((!in_array($attr, $this->sortable)) && (!array_key_exists($attr, $this->sortable)))
                continue;

            $column_name = $this->sortable[$attr] ?? null;
            if(!isset($column_name))
                $column_name = $attr;

            $this->builder->orderBy($column_name, $direction);
        }
    }
}
