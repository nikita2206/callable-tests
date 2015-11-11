<?php

class A {}
class B extends A {}

$foo = function (callable(callable(A)) $cb) {
        $cb(function (A $b) {  });
};

$foo(function (callable(B) $cb) {
    $cb(new B);
});


$foo = function (callable: A $cb) {
        $cb();
};

$foo(function (): B { return new B; });

$foo = function (callable: callable: B $cb) {
        assert($cb()() instanceof B);
};

$foo(function (): callable: B { return function (): B{ return new B; }; });

$foo = function(callable(callable(callable(callable(A)))) $cb) {
    $cb(function (callable(callable(A)) $cb) {   
        $cb(function (A $cb) {   

        });
    });
};

$foo(function (callable(callable(callable(B))) $cb) {
    $cb(function (callable(B) $cb) {
        $cb(new B);
    });
});

$a = function (callable(callable(A $a)) $cb) { $cb(function (A $a) {}); };
$a(function (callable(B $a, $b) $cb) { $cb(new B, 1); });

