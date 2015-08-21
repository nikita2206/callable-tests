<?php

function a(callable(callable($a)) $cb)
{
	$cb("b");
}

function b($a) { }

function c(callable(...$a) $cb) {
	$cb(1, 2, 3);
}

a("c");
