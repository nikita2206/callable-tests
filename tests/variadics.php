<?php

class A {}
class B extends A {}

$a = function (callable(...$a) $cb) { $cb(1, 2, 3); };
$a(function (...$a) { assert($a === [1, 2, 3]); });

$a = function (callable(A) $cb) { $cb(new A); };
$a(function (A ...$a) { assert(count($a) === 1); });

$a = function (callable(callable(callable($a))) $cb) { $cb(function (callable($a) $cb) { $cb(1); }); };
$a(function (callable(callable(...$a)) $cb) { $cb(function (...$a) {}); });

$a = function (callable($a) $a) { $a(1); };
$a(function ($a, ...$b) {});

$a = function (callable(callable(callable($a))) $cb) { $cb(function (callable($a) $cb) { $cb(1); }); };
$a(function (callable(callable($a, ...$b)) $cb) { $cb(function ($a, ...$b) {  }); });
