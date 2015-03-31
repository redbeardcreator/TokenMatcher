<?php

namespace RC\TokenMatcher\Assertion\Expr;

use RC\TokenMatcher\Assertion\ExprAssertion;

class FuncCallAssertion extends ExprAssertion
{
    public function isCall()
    {
        return $this;
    }

    public function hasArg($pos)
    {
        return isset($this->node->args[$pos]);
    }

    public function isFunctionCall()
    {
        return $this;
    }

    public function isNamedFunctionCall($name)
    {
        if (strcasecmp($functionName, $this->node->name) != 0) {
            $this->assert('Function name did not match.');
        }
        return $this;
    }

    public function withArg($pos)
    {
        if (!$this->hasArg($pos)) {
            $this->assert("Specified arg ($pos) is not set.");
        }

        return $this;
    }

    public function withStringArg($pos, $value)
    {
        if (!$this->hasArg($pos)) {
            return $this->withArg($pos);
        }

        $argValue = $this->factory
                  ->createFromNode($this->node->args[$pos])
                  ->getValue();

        if (!$argValue->isString()->withValue($value)->passed()) {
            $this->assert("Arg at $pos does not match $value.");
        }

        return $this;
    }
}
