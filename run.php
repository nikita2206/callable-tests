<?php

$showErrors = false;
$result = 0;

foreach (glob(__DIR__ . "/tests/*.php") as $file) {
	$output = [];
	exec(__DIR__ . "/../php-src/sapi/cli/php $file", $output, $result);
	if (stripos(implode(" ", $output), "segmentation fault") !== false) {
		echo "!!! Failed $file: " . implode("\n", $output) . "\n";
		$result = 255;
	} else {
		if ((strpos(basename($file), "failure") !== false) === (bool)$result) {
			echo "Success ($result) $file\n";

            if ($result && $showErrors) {
                echo implode("\n", $output);
            }
		} else {
			echo "!!! Failed ($result) $file: " . implode("\n", $output) . "\n";
			$result = 255;
		}
	}
}

return $result;

