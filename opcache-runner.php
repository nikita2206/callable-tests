<?php

$fileToRun = $argv[1];

opcache_reset();
opcache_compile_file($fileToRun);

require $fileToRun;

