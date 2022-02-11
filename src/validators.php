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
