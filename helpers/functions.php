<?php

//La fonction de pérmutation
function permuteFunction(
    array $originalArray,
    array $permuteArray
): array {

    $responseArray = [];
    if (count($originalArray) === count($permuteArray)) {

        foreach ($permuteArray as $key => $index) {
            $responseArray[$key] = $originalArray[$index];
        }
    } else {

        return [
            'erreur' => 'Erreur : le nombre de digit ne correspond pas !'
        ];
    }

    return $responseArray;
}


//La fonction de pérmutation
function inversePermuteFunction(
    array $originalArray
): array {

    $responseArray = [];
    if (count($originalArray) > 2) {
        foreach ($originalArray as $key => $index) {
            foreach ($originalArray as $k => $value) {
                if ($key === $value) {
                    $responseArray[] =  $k;
                }
            }
        }
    } else {
        return [
            'erreur' => 'Erreur : Le tableau doit avoir une taille minimale de 2 !'
        ];
    }

    return $responseArray;
}

//La fonction qui divise le tableau en 2 blocs
function dividerArrayEqualPart(
    array $data
): array {

    $part1 = [];
    $part2 = [];
    if (count($data) % 2 === 0) {
        for ($i = 0; $i < count($data) / 2; $i++) {
            $part1[] = $data[$i];
        }
        for ($i = count($data) / 2; $i < count($data); $i++) {
            $part2[] = $data[$i];
        }
    } else {
        return [
            'erreur' => 'Erreur : Le tabeau doit être de la taille paire !'
        ];
    }

    return [
        'part1' => $part1,
        'part2' => $part2
    ];
}

// La function qui fait le ET entre deux tableau booléen
function andFunctionArray(
    array $firstArray,
    array $secondArray
): array {
    $responseArray = [];

    if (count($firstArray) === count($secondArray)) {
        for ($i = 0; $i < count($firstArray); $i++) {
            $responseArray[] = $firstArray[$i] && $secondArray[$i] ? 1 : 0;
        }
    } else {
        return [
            'erreur' => 'Erreur : le nombre de digit ne correspond pas !'
        ];
    }

    return $responseArray;
}

// La function qui fait le OR entre deux tableau booléen
function orFunctionArray(
    array $firstArray,
    array $secondArray
): array {
    $responseArray = [];

    if (count($firstArray) === count($secondArray)) {
        for ($i = 0; $i < count($firstArray); $i++) {
            $responseArray[] = $firstArray[$i] || $secondArray[$i] ? 1 : 0;
        }
    } else {
        return [
            'erreur' => 'Erreur : le nombre de digit ne correspond pas !'
        ];
    }

    return $responseArray;
}

// La function qui fait le XOR entre deux tableau booléen
function xorFunctionArray(
    array $firstArray,
    array $secondArray
): array {
    $responseArray = [];

    if (count($firstArray) === count($secondArray)) {
        for ($i = 0; $i < count($firstArray); $i++) {
            $responseArray[] = xorFunctionElement($firstArray[$i], $secondArray[$i]) ? 1 : 0;
        }
    } else {
        return [
            'erreur' => 'Erreur : le nombre de digit ne correspond pas !'
        ];
    }

    return $responseArray;
}

// La function qui fait le XOR entre deux valeurs booléene 
function xorFunctionElement(
    bool $a,
    bool $b
): bool {

    return ($a || $b) && !($a && $b);
}

// La function décalage à gauche
function gapLeftFunctionInOrder(
    array $data,
    int $order
): array {

    $responseArray = [];

    if (count($data) >= 2) {

        for ($i = $order; $i < count($data); $i++) {
            $responseArray[] = $data[$i];
        }
        for ($i = 0; $i < $order; $i++) {
            $responseArray[] = $data[$i];
        }
    } else {
        return [
            'erreur' => 'Erreur : le tableau doit avoir une taille minimum de 2'
        ];
    }

    return $responseArray;
}

//La fonction décalage à droite
function gapRightFunctionInOrder(
    array $data,
    int $order
): array {

    $responseArray = [];

    if (count($data) >= 2) {

        for ($i = count($data) - $order; $i < count($data); $i++) {
            $responseArray[] = $data[$i];
        }
        for ($i = 0; $i < count($data) - $order; $i++) {
            $responseArray[] = $data[$i];
        }
    } else {
        return [
            'erreur' => 'Erreur : le tableau doit avoir une taille minimum de 2'
        ];
    }

    return $responseArray;
}
