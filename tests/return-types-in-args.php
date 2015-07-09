<?php

assert_options(ASSERT_BAIL, 1);

class A {}
class B extends A {}

$a = function (callable: A $cb) { assert($cb() instanceof A); };
$a(function (): B { return new B; });


$a = function (callable(): callable(callable(A)) $cb) { $cb()(function (A $a) {}); };
$a(function (): callable(callable(B)) { return function (callable(B) $cb) { $cb(new B); }; });
