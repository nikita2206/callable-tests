<?php

class A {}

$a = function (callable() $a) {};
$a(function () {});

$a = function (callable(A) $a) {};
$a(function (A $a) {});

$a = function (callable: A $a) {};
$a(function (): A {});


