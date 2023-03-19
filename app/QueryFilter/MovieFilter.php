<?php

namespace App\QueryFilter;

class MovieFilter extends QueryFilter
{
    public function slug($value)
    {
        return $this->builder->where('slug', 'like', '%' . $value . '%');
    }

    public function title($value)
    {
        return $this->builder->where('title', 'like', '%' . $value . '%');
    }

    public function id($value)
    {
        return $this->builder->where('id', $value);
    }

    public function year($value)
    {
        return $this->builder->whereBetween('year', [$value['start'], $value['end']]);
    }

    public function is_free($value)
    {
        return $this->builder->where('is_free', $value);
    }

    public function status($value)
    {
        return $this->builder->where('status', $value);
    }
}
