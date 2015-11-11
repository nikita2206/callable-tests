<?php


$a = function (callable($a) $cb) { $cb(1); };
$a(function ($a, $b = null) {});



