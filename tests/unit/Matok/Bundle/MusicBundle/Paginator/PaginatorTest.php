<?php
namespace Test\Matok\Bundle\MusicBundle\Paginator;

use Matok\Bundle\MusicBundle\Paginator\Paginator;
use PHPUnit\Framework\TestCase;

class PaginatorTest extends TestCase
{
    /**
     * @dataProvider getPaginatorPages
     */
    public function testGetPages($total, $perPage, $expectedPages)
    {
        $paginator = new Paginator($total, $perPage);

        $this->assertEquals($expectedPages, $paginator->getPages());
    }

    public function testLimit()
    {
        $paginator = new Paginator(rand(0, 1000), 100);

        $this->assertEquals(100, $paginator->getLimit());
    }

    /**
     * @dataProvider getSetPageTests
     */
    public function testSetPage($acualPage, $expectedPage)
    {
        $paginator = new Paginator(400, 25);
        $page = $paginator->setPage($acualPage);

        $this->assertEquals($expectedPage, $page);
    }

    public function testOffset()
    {

    }

    public function getPaginatorPages()
    {
        return [
            [0, 10, 1],  // we always want start from page #1
            [1, 10, 1],
            [10, 10, 1],
            [11, 10, 2],
        ];
    }

    public function getSetPageTests()
    {
        return [
            [0, 1],
            [-7, 1],
            [1, 1],
            [10, 10],
            [16, 16],
            [17, 16],
            [99, 16],
        ];
    }
}