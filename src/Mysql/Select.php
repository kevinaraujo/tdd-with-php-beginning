<?php

namespace QueryBuilder\Mysql;

class Select
{
    private $table;
    private $fields;
    private $filters;

    public function table(string $table)
    {
        $this->table = $table;
    }

    public function fields(array $fields)
    {
        $this->fields = $fields;
    }

    public function filter(Filters $filters)
    {
        $this->filters = $filters->getSql();
    }

    public function getSql()
    {
        $fields = '*';

        if (!empty($this->fields)) {
            $fields = implode(', ', $this->fields);
        }

        $sql = sprintf(
            'SELECT %s FROM %s %s',
            $fields,
            $this->table,
            $this->filters
        );
        
        $sql = trim($sql);

        return $sql;
    }
}