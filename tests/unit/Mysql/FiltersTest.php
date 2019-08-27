<?php
namespace QueryBuilder\Mysql;
use PHPUnit\Framework\TestCase;

class FiltersTest extends TestCase
{
    public function testWhere()
    {
        $filters = new Filters();
        $filters->where('id', '=', 1);

        $actual = $filters->getSql();
        $expected = 'WHERE id = 1';

        $this->assertEquals(
            $expected, 
            $actual
        );
    }

    public function testOrderBy()
    {
        $filters = new Filters();
        $filters->orderBy('created', 'desc');

        $actual = $filters->getSql();
        $expected = 'ORDER BY created DESC';

        $this->assertEquals(
            $expected,
            $actual
        );
    }

    public function testOrderByAndSelect()
    {
        $filters = new Filters();
        $filters->where('id', '=', 1);
        $filters->orderBy('created', 'desc');

        $actual = $filters->getSql();
        $expected = 'WHERE id = 1 ORDER BY created DESC';

        $this->assertEquals(
            $expected,
            $actual
        );
    }
}