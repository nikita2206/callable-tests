<?php

$a = function (callable(callable(callable($a))) $cb) { $cb(function (callable($a) $cb) { $cb(1); }); };
$a(function (callable(callable($a, ...$b)) $cb) { $cb(function ($a, ...$b) {  }); });
