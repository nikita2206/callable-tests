<?php

$a = function (callable(A) $cb) { $cb(new A); };
$a(function (A ...$a) { assert(count($a) === 1); });

