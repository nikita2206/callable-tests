<?php

$result = 0;

foreach (glob(__DIR__ . "/tests/*.php") as $file) {
	$output = [];
	$input = str_replace("<?php", "", file_get_contents($file));
	$input = "<?php assert((function () { $input return true;})());";
	$d = [0 => ["pipe", "r"], 1 => ["pipe", "w"], 2 => ["pipe", "w"]];
	$proc = proc_open(__DIR__ . "/../php-src/sapi/cli/php", $d, $p);
	fwrite($p[0], $input);
	fclose($p[0]);

	$output = stream_get_contents($p[1]) . stream_get_contents($p[2]);
	fclose($p[1]); fclose($p[2]);
	proc_close($proc);

	if (stripos($output, "segmentation fault") !== false) {
		echo "!!! Failed $file: " . $output . "\n";
		$result = 255;
	} else {
		if ((strpos(basename($file), "failure") !== false) === (bool)$result) {
			echo "Success ($result) $file\n";
		} else {
			echo "!!! Failed ($result) $file: " . $output . "\n";
			$result = 255;
		}
	}
}

return $result;

