<?php

use RC\TokenMatcher\AssertionFactory;
use RC\TokenMatcher\Assertion;

$autoloaderPath = __DIR__ . '/../vendor/autoload.php';
echo $autoloaderPath . "\n";
require_once $autoloaderPath;

$source = __FILE__;
$code = file_get_contents($source);

$parser = new PhpParser\Parser(new PhpParser\Lexer\Emulative);
$statements = $parser->parse($code);

class TestIt
{
    private $privateVar;
    protected $protectedVar;
    public $publicVar;

    public function __construct($a)
    {
        $this->privateVar = $a;
    }

    public function publicMethod()
    {
        echo $this->privateVar;
        $this->protectedMethod();
        $this->privateMethod();
    }

    protected function protectedMethod()
    {
        return "Hello!";
    }

    private function privateMethod()
    {
        return "I'm private";
    }
}

$c = new TestIt("I'm a little teapot");
$c->publicMethod();

$af = new AssertionFactory;
$s = $statements;

function assertNode($node)
{
    $af = new AssertionFactory;
    return $af->createFromNode($node);
}

function failIf(Assertion $assertion)
{
    if ($assertion->passed()) {
        throw new RuntimeException('Node matched. Failing.');
    }

    return "Pass";
}

function succeedIf(Assertion $assertion)
{
    if (!$assertion->passed()) {
        throw new RuntimeException('Node did not match. Failing. ' .
                                   $assertion->getFailureText());
    }

    return "Pass";
}

echo succeedIf(assertNode($s[0])->isUseStatement()) . "\n";
