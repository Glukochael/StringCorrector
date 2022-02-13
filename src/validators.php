<?php

declare(strict_types=1);

function includeBannedWords(string $str, array $bannedWords): bool
{	
	foreach ($bannedWords as $word) {
		if (strpos($str, $word) !== false) {
			return true;
		}
	}

	return false;
}

function startWithBanned(string $str, array $bannedWords): bool
{
	foreach ($bannedWords as $word) {
		if (strpos($str, $word) === 0) {
			return true;
		}
	}

	return false;
}

function finalsWithBanned(string $str, array $bannedWords): bool
{
	foreach ($bannedWords as $word) {
		if (strpos($str, $word) === (strlen($str) - strlen($word))) {
			return true;
		}
	}

	return false;
}