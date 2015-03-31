<?php

namespace RC\TokenMatcher;

use PhpParser\Node;

class AssertionFactory
{
    private $baseNamespace = __NAMESPACE__ . '\Assertion\\';

    public function createFromNode(Node $node)
    {
        $nodeType = trim(get_class($node), '_');
        $classParts = explode('\\', $nodeType);
        $classParts = array_slice($classParts, 2);
        $targetClass = $this->baseNamespace . implode('\\', $classParts) . 'Assertion';

        return new $targetClass($node, $this);
    }
}
