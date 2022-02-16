<?php

declare(strict_types=1);

function rewriteString(string $str, string $words, int $x): string 
{
	$newStr = '';
	$y = $x + strlen($words) - 1;
	for ($i = 0; $i < strlen($str); $i++) {
		if ($i < $x || $i > $y) {
			$newStr .= $str[$i];
		}
	}

	return $newStr;
}

function delBannedWords(string $str, array $parameters): string
{
	$newStr = '';
	foreach ($parameters as $words) {
		if ($x = strpos($str, $words)) {
			$newStr .= rewriteString($str, $words, $x);
		}
	}

	return $newStr;
}

function delBannedStartWords(string $str, array $parameters): string
{
	$newStr = '';
	foreach ($parameters as $words) {
		$x = strpos($str, $words);
		if ($x === 0) {
			$newStr .= rewriteString($str, $words, $x);
		}
	}

	return $newStr;
}

function delBannedEndWords(string $str, array $parameters): string
{
	$newStr = '';
	foreach ($parameters as $words) {
		$x = strpos($str, $words);
		if ($x === (strlen($str) - strlen($words))) {
			$newStr .= rewriteString($str, $words, $x);
		}
	}

	return $newStr;
}