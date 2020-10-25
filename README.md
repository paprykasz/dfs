# Example PHP DFS algorithm implementation

## Usage

```php 
<?php
 
     require 'vendor/autoload.php';
    
     use Webloft\Search\Dfs\DepthFirstSearch;
     use Webloft\Search\Dfs\Node;
    
     $rootNode = new Node('1');
     $rootNode->linkNode($node2 = new Node('2'));
     $rootNode->linkNode($node3 = new Node('3'));
    
     $node2->linkNode($node4 = new Node('4'));
     $node3->linkNode($node5 = new Node('5'));
    
     $dfs = new DepthFirstSearch();
     $availablePaths = $dfs->getAvailablePaths($rootNode);

```