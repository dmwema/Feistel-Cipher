<?php
require_once './FeistelCipher/generateKeys.php';
require_once './FeistelCipher/encryption.php';

if (isset($_POST['submit'])) {
    $inputKeys = [];
    for ($i = 0; $i < 8; $i++) {
        $index = "key-" . $i;
        $inputKeys[] = $_POST[$index];
    }

    $keyPermute = [];
    for ($i = 0; $i < 8; $i++) {
        $index = "keyPermute-" . $i;
        $keyPermute[] = $_POST[$index];
    }

    $data = [];
    for ($i = 0; $i < 8; $i++) {
        $index = "data-" . $i;
        $data[] = $_POST[$index];
    }

    $dataPermute = [];
    for ($i = 0; $i < 8; $i++) {
        $index = "dataPermute-" . $i;
        $dataPermute[] = $_POST[$index];
    }



    $keys = (generateKeys($inputKeys, $keyPermute));
    $encryption = encryption($data, $dataPermute, [2, 0, 1, 3], $keys['keyOne'], $keys['keyTwo']);

    $stringData = "";
    foreach ($encryption as $key => $value) {
        $stringData .= $value;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/code.css">
    <title>Algo Sécurité</title>
    <script src="/js/vue.js"></script>
</head>

<body>
    <div id="app">
        <div class="container">
            <div class="card mt-5">
                <div class="card-body">
                    <form class="form" action="" method="post">
                        <h5 class="card-title">Génération des clés</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset class='number-code'>
                                    <legend>Bloc d'entré</legend>
                                    <div>
                                        <input @keyup="verify" type="number" name='key-0' class='code-input g1' required />
                                        <input @keyup="verify" type="number" name='key-1' class='code-input g1' required />
                                        <input @keyup="verify" type="number" name='key-2' class='code-input g1' required />
                                        <input @keyup="verify" type="number" name='key-3' class='code-input g1' required />
                                        <input @keyup="verify" type="number" name='key-4' class='code-input g1' required />
                                        <input @keyup="verify" type="number" name='key-5' class='code-input g1' required />
                                        <input @keyup="verify" type="number" name='key-6' class='code-input g1' required />
                                        <input @keyup="verify" type="number" name='key-7' class='code-input g1' required />
                                    </div>
                                    <p v-if="error1" class="text-danger" style="font-size: 10px">{{message1}}</p>
                                </fieldset>
                                <fieldset class='number-code'>
                                    <legend>La permutation</legend>
                                    <div>
                                        <input @keyup="verifyKeyPermute" type="number" name='keyPermute-0' class='code-input g2' required />
                                        <input @keyup="verifyKeyPermute" type="number" name='keyPermute-1' class='code-input g2' required />
                                        <input @keyup="verifyKeyPermute" type="number" name='keyPermute-2' class='code-input g2' required />
                                        <input @keyup="verifyKeyPermute" type="number" name='keyPermute-3' class='code-input g2' required />
                                        <input @keyup="verifyKeyPermute" type="number" name='keyPermute-4' class='code-input g2' required />
                                        <input @keyup="verifyKeyPermute" type="number" name='keyPermute-5' class='code-input g2' required />
                                        <input @keyup="verifyKeyPermute" type="number" name='keyPermute-6' class='code-input g2' required />
                                        <input @keyup="verifyKeyPermute" type="number" name='keyPermute-7' class='code-input g2' required />
                                    </div>
                                    <p v-if="error2" class="text-danger" style="font-size: 10px">{{message2}}</p>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <!-- <button class="mt-5 btn btn-primary">Générer</button><br /> -->
                                RESULTAT :
                            </div>
                        </div>

                        <h5 class="card-title">Chiffrement</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset class='number-code'>
                                    <legend>Bloc d'entré</legend>
                                    <div>
                                        <input @keyup="verifyData" type="number" name='data-0' class='code-input g3' required />
                                        <input @keyup="verifyData" type="number" name='data-1' class='code-input g3' required />
                                        <input @keyup="verifyData" type="number" name='data-2' class='code-input g3' required />
                                        <input @keyup="verifyData" type="number" name='data-3' class='code-input g3' required />
                                        <input @keyup="verifyData" type="number" name='data-4' class='code-input g3' required />
                                        <input @keyup="verifyData" type="number" name='data-5' class='code-input g3' required />
                                        <input @keyup="verifyData" type="number" name='data-6' class='code-input g3' required />
                                        <input @keyup="verifyData" type="number" name='data-7' class='code-input g3' required />
                                    </div>
                                    <p v-if="error3" class="text-danger" style="font-size: 10px">{{message1}}</p>
                                </fieldset>
                                <fieldset class='number-code'>
                                    <legend>La permutation</legend>
                                    <div>
                                        <input @keyup="verifyDataPermute" type="number" name='dataPermute-0' class='code-input g4' required />
                                        <input @keyup="verifyDataPermute" type="number" name='dataPermute-1' class='code-input g4' required />
                                        <input @keyup="verifyDataPermute" type="number" name='dataPermute-2' class='code-input g4' required />
                                        <input @keyup="verifyDataPermute" type="number" name='dataPermute-3' class='code-input g4' required />
                                        <input @keyup="verifyDataPermute" type="number" name='dataPermute-4' class='code-input g4' required />
                                        <input @keyup="verifyDataPermute" type="number" name='dataPermute-5' class='code-input g4' required />
                                        <input @keyup="verifyDataPermute" type="number" name='dataPermute-6' class='code-input g4' required />
                                        <input @keyup="verifyDataPermute" type="number" name='dataPermute-7' class='code-input g4' required />
                                    </div>
                                    <p v-if="error4" class="text-danger" style="font-size: 10px">{{message2}}</p>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <button name="submit" type="submit" class="mt-5 btn btn-success btn-lg">Chiffrer</button><br />
                                RESULTAT : <?= isset($_POST['submit']) ? 'La valeur chiffrer est : ' . $stringData : '' ?>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/bootstrap.min.js"></script>
    <!-- <script src="/js/code.js"></script> -->
    <script src="/js/style.js"></script>
</body>

</html>