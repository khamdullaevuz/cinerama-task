<?php

namespace App\QueryFilter;

class QueryFilter
{
    protected $builder;
    protected $request;

    public function __construct($builder, $request)
    {
        $this->builder = $builder;
        $this->request = $request;
    }

    public function filters()
    {
        return $this->request;
    }

    public function apply()
    {
        foreach($this->filters() as $filter => $value)
        {
            if(method_exists($this, $filter))
            {
                $this->$filter($value);
            }
        }

        return $this->builder;
    }
}
