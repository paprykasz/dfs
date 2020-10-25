<?php

namespace Webloft\Search\Dfs;

/**
 * Class DepthFirstSearch
 * @package Webloft\Search\Dfs
 */
class DepthFirstSearch
{
    /**
     * @param Node $node
     * @param Node[] $results
     * @param Node ...$visitedNodes
     * @return array
     */
    public function getAvailablePaths(Node $node, array &$results = [], Node ...$visitedNodes): array
    {
        $visitedNodes[] = $node;
        $notVisitedNodes = $this->getNotVisitedNodes($node, ...$visitedNodes);
        if (empty($notVisitedNodes)) {
            $results[] = $visitedNodes;
        } else {
            foreach ($notVisitedNodes as $notVisitedNode) {
                $this->getAvailablePaths($notVisitedNode, $results, ...$visitedNodes);
            }
        }

        return $results;
    }

    /**
     * @param Node $node
     * @param Node ...$visitedNodes
     * @return Node[]
     */
    protected function getNotVisitedNodes(Node $node, Node ...$visitedNodes): array
    {
        $notVisitedNodes = [];
        foreach ($node->getLinedNodes() as $linedNode) {
            if (!in_array($linedNode->getId(), array_map(function (Node $n) {
                return $n->getId();
            }, $visitedNodes))) {
                $notVisitedNodes[] = $linedNode;
            }
        }
        return $notVisitedNodes;
    }
}
