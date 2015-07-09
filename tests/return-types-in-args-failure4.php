<?php

class A {}
class B extends A {}

$a = function (): callable(callable(A)) { return function (callable(B) $cb) { }; };
$a();
