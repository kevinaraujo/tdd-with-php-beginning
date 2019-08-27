<?php

namespace QueryBuilder\Mysql;

class Select
{
    private $table;
    private $fields;

    public function table(string $table)
    {
        $this->table = $table;
    }

    public function fields(array $fields)
    {
        $this->fields = $fields;
    }

    public function getSql()
    {
        $fields = '*';

        if (!empty($this->fields)) {
            $fields = implode(', ', $this->fields);
        }

        $sql = sprintf(
            'SELECT %s FROM %s',
            $fields,
            $this->table
        );
        
        return $sql;
    }
}