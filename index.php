<?php

declare(strict_types=1);

require_once 'src/correctors.php';
require_once 'src/validators.php';

$validators = [
	'exclude' => 'includeBannedWords',
	'notStartWith' => 'startWithBanned',
	'notEndWith' => 'endsWithBanned',
];

$correctors = [
	'exclude' => 'delBannedWords',
	'notStartWith' => 'delBannedStartWords',
	'notEndWith' => 'delBannedEndWords',
];

$constrains = [
	'exclude' => ['QQ', '333'],
	'notStartWith' => ['_'],
	'notEndWith' => ['id'],
];


function getFaildConstrainTag(string $input, array $constrains, array $validators): ?string
{
	foreach ($constrains as $constrainTag => $parameters) {
		$isNotValid = $validators[$constrainTag];
		if ($isNotValid($input, $parameters)) {
			return $constrainTag;
		}
	}

	return null;
}

function processInput(string $input, array $constrains, array $validators, array $correctors): string
{
	if (!$constrainTag = getFaildConstrainTag($input, $constrains, $validators)) {
		return $input;
	}
	$correct = $correctors[$constrainTag];
	$parameters = $constrains[$constrainTag];

	return processInput($correct($input, $parameters), $constrains, $validators, $correctors);
}

echo sprintf("%s\n", processInput('@QQ23456789QQQid', $constrains, $validators, $correctors)); 
