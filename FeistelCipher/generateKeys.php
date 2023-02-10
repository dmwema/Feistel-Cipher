<?php
require_once dirname(__DIR__) . "/helpers/functions.php";

function generateKeys(
    array $input,
    array $permuteArray
): array {

    $inputPermute = permuteFunction($input, $permuteArray);
    $dividerData = dividerArrayEqualPart($inputPermute);

    $part1 = $dividerData['part1'];
    $part2 = $dividerData['part2'];

    $keyOne = xorFunctionArray($part1, $part2);
    $keyTwo = andFunctionArray($part1, $part2);

    $keyOne = gapLeftFunctionInOrder($keyOne, 2);
    $keyTwo = gapRightFunctionInOrder($keyTwo, 1);

    return [
        'keyOne' => $keyOne,
        'keyTwo' => $keyTwo
    ];
}
