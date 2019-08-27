<?php

namespace QueryBuilder\Mysql;

use PHPUnit\Framework\TestCase;

class SelectTests extends TestCase
{
    public function testSelectWithoutFilter()
    {
        $select = new Select();
        $select->table('marcelo');

        $actual = $select->getSql();
        $expected = 'SELECT * FROM marcelo';

        $this->assertEquals($expected, $actual);
    }

    public function testSelectEspecifyingFields()
    {
        $select = new Select();
        $select->table('users');
        $select->fields([
            'name',
            'email'
        ]);

        $actual = $select->getSql();
        $expected = 'SELECT name, email FROM users';
       
        $this->assertEquals($expected, $actual);
    }
}