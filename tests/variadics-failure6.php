<?php

class A {}
class B extends A {}

$a = function (callable(A, A) $cb) {};
$a(function (A $a, B $b) {});

