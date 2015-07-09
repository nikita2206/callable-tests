<?php

class A {}
class B extends A {}

$a = function (): callable: callable : B { return function(): callable: A { return function (): A { return new A; }; }; };
assert($a()()() instanceof B);
