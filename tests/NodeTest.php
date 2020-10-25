<?php

namespace Webloft\Search\Dfs\Tests;

use PHPUnit\Framework\TestCase;
use Webloft\Search\Dfs\Node;

/**
 * Class NodeTest
 * @package Webloft\Search\Dfs\Tests
 */
class NodeTest extends TestCase
{
    /**
     *
     */
    public function testNodeLinking()
    {
        $node = new Node('1');
        $node2 = new Node('2');

        $node->linkNode($node2);

        $this->assertSame($node2, $node->getLinedNodes()['2']);
    }

    /**
     *
     */
    public function testNodeUnlink()
    {
        $node = new Node('1');
        $node2 = new Node('2');

        $node->linkNode($node2);

        $this->assertCount(1, $node->getLinedNodes());
        $node->unlinkNode('2');
        $this->assertCount(0, $node->getLinedNodes());
    }
}
