<?php
require_once dirname(__DIR__) . "/helpers/functions.php";

function encryption(
    array $input,
    array $permuteInput,
    array $permutePart,
    array $keyOne,
    array $keyTwo,
): array {
    $responseData = [];

    $inputPermute = permuteFunction($input, $permuteInput);
    $dividerData = dividerArrayEqualPart($inputPermute);

    $G0 = $dividerData['part1'];
    $D0 = $dividerData['part2'];

    //First Round
    $D1 = xorFunctionArray(permuteFunction($G0, $permutePart), $keyOne);
    $G1 = xorFunctionArray($D0, orFunctionArray($G0, $keyOne));
    //Second Round
    $D2 = xorFunctionArray(permuteFunction($G1, $permutePart), $keyTwo);
    $G2 = xorFunctionArray($D1, orFunctionArray($G1, $keyTwo));

    foreach ($G2 as $value) {
        $responseData[] = $value;
    }
    foreach ($D2 as $value) {
        $responseData[] = $value;
    }

    $responseData = permuteFunction($responseData, inversePermuteFunction($permuteInput));

    return $responseData;
}
