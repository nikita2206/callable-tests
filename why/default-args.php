<?php

/*
 * Why optional args are not polymorphic and hence can not be supported
 */

class A {}
class B {}

function bar(callable(A $a, stdClass $b) $cb) {

}

function foo(callable(A) $cb) {

    /*
     * bar() expects callable which takes (A, stdClass) which means we can pass (A)
     * and it should be accepted because bar() will still be able to call it
     * passing both arguments while $cb can use less than that and still perform its task
     */

    bar($cb);
}


/*
 * Now we call foo() with callable(A, ?B). In case if optional arguments were working
 * (A) requirement should be satisfied by (A, ?B) because it means that you can still
 * call the latter as you'd call the former.
 * But this will fail in foo() when calling bar() because it expected (A, stdClass) and
 * got (A, ?B), these types are not compatible.
 * If we say that all assumptions made in foo() are right then it means to us
 * that foo() should have never accepted (A, ?B).
 *
 * This is the reasoning behind not supporting optional args. The same goes for variadics:
 *  by the nature they are optional when calling a function, but the specification of the
 *  function can never omit variadic arg because of the same reasons as with default args
 */

foo(function (A $a, B $b = null) {

});


/*
 * Here's a similar case for variadics:
 */

function asd(callable(A) $cb) {
    bar($cb);
}

/*
 * `B ...$b` part in (A, B ...$b) assumes that it is optional, e.g. you could not pass
 * any objects in the second argument the function would still work, so the
 * semantics are similar to optional args.
 *
 * The call will fail only when pushing arg to bar()'s frame (if omitting variadics
 * would be supported) where it should have failed when calling asd() already.
 */

asd(function (A $a, B ...$b) {

});

