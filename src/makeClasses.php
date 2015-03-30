<?php

$dest = __DIR__ . '/Assertion';
$template = file_get_contents($dest . '/template.php');
$initialSrcPath = dirname(__DIR__) . '/vendor/nikic/php-parser/lib/PhpParser/Node';
echo "Looking up $initialSrcPath\n";
$srcPath = realpath($initialSrcPath);
echo "Scanning $srcPath\n";
$dirIter = new RecursiveDirectoryIterator($srcPath);
echo "mk rii\n";
$recursiveIter = new RecursiveIteratorIterator($dirIter);
echo "mk cfi\n";
$iter = new CallbackFilterIterator($recursiveIter,
                                   function ($p) {
                                       return strpos($p, '.php') == strlen($p) - 4;
                                   });
echo "using template:\n";
echo $template;
echo "\n";
echo "scanning\n";
foreach ($iter as $f) {
    $base = preg_replace('#(^.*/Node/)|(_?\.php)#', '', $f);
    $className = basename($base) . 'Assertion';
    $base = dirname($base);
    $path = $dest . '/' . $base . '/' . $className . '.php';
    $base = str_replace('/', '\\', $base);
    $dir = dirname($path);
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }

    if (!is_file($path)) {
        echo "Making $path\n";
        $fileContent = fillTemplate($template, $base, $className);
        file_put_contents($path, $fileContent);
    }
}

function fillTemplate($template, $base, $className)
{
    return str_replace(['{base}', '{class}'], [$base, $className], $template);
}
