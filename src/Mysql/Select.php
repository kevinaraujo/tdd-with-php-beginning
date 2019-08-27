<?php

namespace QueryBuilder\Mysql;

class Select
{
    public function table(string $table)
    {
        return $this;
    }


    public function getSql()
    {
        return 'SELECT * FROM pages';
    }
}