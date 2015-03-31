<?php

namespace RC\TokenMatcher;

use PhpParser\Node;

class Assertion
{
    protected $node;
    protected $factory;
    protected $failedAt = false;

    public function __construct(Node $node, AssertionFactory $factory)
    {
        $this->node = $node;
        $this->factory = $factory;
    }

    public function passed()
    {
        return $this->failedAt === false;
    }

    public function getFailureText()
    {
        return $this->failedAt;
    }

    public function isArgument()
    {
        $this->assert('Not an argument.');
        return $this;
    }

    public function isAssignment()
    {
        $this->assert('Not an assignment.');
        return $this;
    }

    /**
     * True if this is a call of some sort
     *
     * Applies to method calls and function calls
     */
    public function isCall()
    {
        $this->assert('Not a call expression.');
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

    public function isExpression()
    {
        $this->assert('Not an expression.');
        return $this;
    }

    public function isFunctionCall()
    {
        $this->assert('Not a function call.');
        return $this;
    }

    public function isFunctionDefinition()
    {
        $this->assert('Not a function definition statement.');
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

    public function isNamedFunctionCall($name)
    {
        $this->assert('Not a function call.');
        return $this;
    }

    public function isStatement()
    {
        $this->assert('Not a statement.');
        return $this;
    }

    public function isString()
    {
        $this->assert('Not a string.');
        return $this;
    }

    public function isUseStatement()
    {
        $this->assert('Not a use statement.');
        return $this;
    }

    public function withArg($pos)
    {
        $this->assert('Node does not have any arguments.');
        return $this;
    }

    public function withStringArg($pos, $value)
    {
        $this->assert('Node does not have any arguments.');
        return $this;
    }

    public function withValue($value)
    {
        $this->assert('Node has no value.');
        return $this;
    }

    protected function assert($message)
    {
        if ($this->failedAt === false) {
            $this->failedAt = $message;
        }
    }
}
