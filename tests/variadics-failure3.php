<?php

$a = function (callable(callable(...$b)) $cb) { $cb(function ($b) {}); };
$a(function (callable(...$b) $cb) {});

