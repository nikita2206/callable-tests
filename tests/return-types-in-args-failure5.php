<?php

class A {}
class B extends A {}

$a = function (callable(): callable(A) $cb) {  };
$a(function (): callable(B) { return function (B $b) {  }; });
