<?php

class A {}
class B extends A {}

$a = function (): callable { return function () {}; };
$a()();

$a = function (): callable: A { return function (): B { return new B; }; };
$a()();

$a = function (): callable: callable: A { return function(): callable: B { return function (): B { return new B; }; }; };
$a()()();
