<?php

class A {}
class B extends A {}

$a = function (callable(...$a) $cb) { $cb(1, 2, 3); };
$a(function (...$a) { assert($a === [1, 2, 3]); });

$a = function (callable($a) $a) { $a(1); };
$a(function ($a, ...$b) {});
