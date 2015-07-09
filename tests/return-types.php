<?php

assert_options(ASSERT_BAIL, 1);

class A {}
class B extends A {}

$a = function (): callable { return function () {}; };
$a()();

$a = function (): callable: A { return function (): B { return new B; }; };
$a()();

// this is wrong
$a = function (): callable:
callable : B { return function(): callable: A { return function (): A { return new A; }; }; };
assert($a()()() instanceof B);
