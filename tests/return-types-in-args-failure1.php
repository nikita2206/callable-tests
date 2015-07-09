<?php

class A {}
class B extends A {}

$a = function (callable: callable: B $cb) { assert($cb()() instanceof B); };
$a(function (): callable: A { return function (): A { return new A; }; });
