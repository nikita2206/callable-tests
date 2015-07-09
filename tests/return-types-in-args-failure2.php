<?php

class A {}
class B extends A {}

$a = function (): callable(A) { return function (B $b) {}; };
$a();
