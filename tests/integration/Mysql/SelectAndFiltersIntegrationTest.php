<?php

namespace QueryBuilder\Mysql;
use PHPUnit\Framework\TestCase;

class SelectAndFiltersIntegrationTest extends TestCase
{
    public function testSelectWithWhereFilterAndOrder()
    {
        $select = new Select();
        $select->table('users');

        $actual = $select->getSql();
        $expected = 'SELECT * FROM users';

        $filters = new Filters();
        $filters->where('id', '=', 1);
        $filters->orderBy('created', 'desc');

        $select->filter($filters);
       
        $actual = $select->getSql();
        $expected = 'SELECT * FROM users WHERE id = 1 ORDER BY created DESC';

        $this->assertEquals(
            $expected,
            $actual
        );
    }

    public function testSelectWithWhereFilterAndOrderUsingMockBuilder()
    {
        $select = new Select();
        $select->table('users');

       $filtersMock = $this->getMockBuilder(Filters::class)
            ->disableOriginalConstructor()
            ->getMock();
        
        $filtersMock->method('getSql')
            ->willReturn('WHERE id = 1 ORDER BY created DESC');

        $select->filter($filtersMock);
       
        $actual = $select->getSql();
        $expected = 'SELECT * FROM users WHERE id = 1 ORDER BY created DESC';

        $this->assertEquals(
            $expected,
            $actual
        );
    }
}