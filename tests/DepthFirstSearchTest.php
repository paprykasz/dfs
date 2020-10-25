<?php

namespace Webloft\Search\Dfs\Tests;

use PHPUnit\Framework\TestCase;
use Webloft\Search\Dfs\DepthFirstSearch;
use Webloft\Search\Dfs\Node;

/**
 * Class DepthFirstSearchTest
 * @package Webloft\Search\Dfs\Tests
 */
class DepthFirstSearchTest extends TestCase
{
    /**
     *
     */
    public function testGetAvailablePaths()
    {
        $rootNode = new Node('1');
        $rootNode->linkNode($node2 = new Node('2'));
        $rootNode->linkNode($node3 = new Node('3'));

        $node2->linkNode($node4 = new Node('4'));
        $node3->linkNode($node5 = new Node('5'));

        $dfs = new DepthFirstSearch();
        $availablePaths = $dfs->getAvailablePaths($rootNode);

        $firstPath = $availablePaths[0];

        $this->assertCount(2, $availablePaths);
        $this->assertSame($rootNode, $firstPath[0]);
        $this->assertSame($node2, $firstPath[1]);
        $this->assertSame($node4, $firstPath[2]);
    }

    /**
     *
     */
    public function testNoAvailablePaths()
    {
        $rootNode = new Node('1');

        $dfs = new DepthFirstSearch();
        $availablePaths = $dfs->getAvailablePaths($rootNode);
        $this->assertCount(1, $availablePaths);
    }
}
