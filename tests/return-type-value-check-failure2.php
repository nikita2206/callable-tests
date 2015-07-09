<?php

class A {}

$a = function (): callable(): A { return function () {}; };
$a();
