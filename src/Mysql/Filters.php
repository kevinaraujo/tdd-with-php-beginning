<?php

namespace QueryBuilder\Mysql;

class Filters
{
    private $sql = [];

    public function where(string $field, string $condition, $value)
    {
       $where = 'WHERE %s %s %s';

       $this->sql[] = sprintf(
           $where,
           $field,
           $condition,
           $value
       );
    }

    public function orderBy(string $field, string $direction)
    {
        $orderBy = 'ORDER BY %s %s';

        $this->sql[] = sprintf(
            $orderBy,
            $field,
            strtoupper($direction)
        );
    }

    public function getSql()
    {
        return implode(' ', $this->sql);
    }
}