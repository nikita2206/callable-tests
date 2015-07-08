<?php

$a = function (callable(callable($a)) $cb) { $cb(function ($a) { }); };
$a(function (callable(...$a) $cb) { $cb(1, 2, 3); });

