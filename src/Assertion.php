<?php

namespace RC\TokenMatcher;

use PhpParser\Node;

class Assertion
{
    protected $node;
    protected $failedAt = false;

    public function __construct(Node $node)
    {
        $this->node = $node;
    }

    public function passed()
    {
        return $this->failedAt === false;
    }

    public function getFailureText()
    {
        return $this->failedAt;
    }

    public function isExpression()
    {
        $this->assert('Not an expression.');
        return $this;
    }

    public function isAssignment()
    {
        $this->assert('Not an assignment.');
        return $this;
    }

    public function isIncludeStatement()
    {
        $this->assert('Not an include statement.');
        return $this;
    }

    public function isMethodCall()
    {
        $this->assert('Not a method call.');
        return $this;
    }

    public function isStatement()
    {
        $this->assert('Not a statement.');
        return $this;
    }

    public function isClassDefinition()
    {
        $this->assert('Not a class definition statement.');
        return $this;
    }

    public function isEchoStatement()
    {
        $this->assert('Not an echo statement.');
        return $this;
    }

    public function isFunctionDefinition()
    {
        $this->assert('Not a function definition statement.');
        return $this;
    }

    public function isUseStatement()
    {
        $this->assert('Not a use statement.');
        return $this;
    }

    protected function assert($message)
    {
        if ($this->failedAt === false) {
            $this->failedAt = $message;
        }
    }
}
