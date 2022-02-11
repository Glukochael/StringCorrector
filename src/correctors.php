<?php

declare(strict_types=1);

function delBannedWords(string $str, array $parameters): string
{
	foreach ($parameters as $parameter) {
		if ($x = strpos($str, $parameter)) {
			$y = $x + strlen($parameter) - 1;
			$_ = '';
			for ($i = 0; $i < strlen($str); $i++) {
				if ($i < $x || $i > $y) {
					$_ .= $str[$i];
				}
			}
			$str = $_;
		}
	}

	return $str;
}
