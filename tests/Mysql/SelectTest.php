<?php

namespace QueryBuilder\Mysql;

use PHPUnit\Framework\TestCase;

class SelectTests extends TestCase
{
    public function testSelectSemFiltro()
    {
        $select = new Select();
        $select->table('pages');

        $actual = $select->getSql();
        $expected = 'SELECT * FROM pages';

        $this->assertEquals($expected, $actual);
    }
}