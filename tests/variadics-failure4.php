<?php

$a = function (callable(callable($a)) $cb) { $cb(function ($a) {}); };
//$a(function (callable(...$a) $cb) { $cb(1); });

class A {} class B extends A {}

$a = function (callable(callable(B)) $cb) { $cb(function (B $b) {}); };
$a(function (callable(A) $cb) { $cb(new B); });;

