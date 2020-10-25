<?php

namespace Webloft\Search\Dfs;

/**
 * Class Node
 * @package Webloft\Search\Dfs
 */
class Node
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var Node[]
     */
    protected $linedNodes = [];

    /**
     * Node constructor.
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Node
     */
    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param Node $node
     * @return Node
     */
    public function linkNode(Node $node): self
    {
        $this->linedNodes[$node->getId()] = $node;
        return $this;
    }

    /**
     * @param string $id
     * @return Node
     */
    public function unlinkNode(string $id): self
    {
        unset($this->linedNodes[$id]);
        return $this;
    }

    /**
     * @return Node[]
     */
    public function getLinedNodes(): array
    {
        return $this->linedNodes;
    }
}
