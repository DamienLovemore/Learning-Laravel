<?php

namespace App\Http\Filters\V1;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilter
{
    protected $builder;
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
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
}
