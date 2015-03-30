<?php

use RC\TokenMatcher\AssertionFactory as Factory;
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

$af = new Factory;
$s = $statements;

function assertNode($node)
{
    $af = new Factory;
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

echo "\n" . succeedIf(assertNode($s[0])->isUseStatement()) . "\n";

foreach ($s as $statement) {
    $assertion = assertNode($statement)->isCall();

    $isFC = $assertion->passed();
    printf("[%s] -> %s\n", get_class($statement), $isFC ? 'yes' : 'no');
    if ($assertion->isMethodCall()->passed()) {
        var_dump($statement->var);
    }
    if ($isFC) {
        var_dump($statement);
        exit;
    }
}

echo "Didn't find a function call\n";
