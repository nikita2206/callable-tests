<?php

$a = function (callable $a) {};
$a(function ($a) {});

$a = function (callable(callable($a, $b)) $a) { $a(function ($a) {  }); };
$a(function (callable($a, $b) $a) { $a(1, 2); });

$a = function (callable($a) $cb) { $cb(12); };
$a(function () {});

