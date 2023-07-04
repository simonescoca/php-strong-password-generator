<?php
    /**
     * Generates a pwdLength characters long password with several combinations of types of characters within at least one char per type selected
     * @param {int} pwdLength password's length
     * @param {bool} areNumbersIncluded includes or not numbers
     * @param {bool} areUpLettersIncluded includes or not uppercase letters
     * @param {bool} areLowLettersIncluded includes or not lowercase letters
     * @param {bool} areSpecCharsIncluded includes or not special characters
     * @returns {string} the password
     */
    function genPwd (int $pwdLength, bool $areNumbersIncluded, bool $areUpLettersIncluded, bool $areLowLettersIncluded, bool $areSpecCharsIncluded) {

        // * se nessun input di typeChar è selezionato, comunque viene selezionato "numbers"
        if (!$areNumbersIncluded && !$areUpLettersIncluded && !$areLowLettersIncluded && !$areSpecCharsIncluded) {
            $areNumbersIncluded = true;
        }

        $password = "";

        // * inizializzo 4 tipi diversi di array
        $numbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        $upLetters = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
        $lowLetters = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
        $specChars = ["!", "@", "#", "$", "%", "&", "*", "(", ")", "-", "_", "=", "+", "[", "]", "{", "}", "|", ";", ":", ",", ".", "<", ">", "/", "?", "~", "£", "€", "^"];
            
        // * dichiaro 4 variabili in cui mi chiedo se nella password sono inclusi tutti i tipi di caratteri
        $hasNumber = false;     if (!$areNumbersIncluded)     {$hasNumber = true;}
        $hasUp = false;         if (!$areUpLettersIncluded)   {$hasUp = true;}
        $hasLow = false;        if (!$areLowLettersIncluded)  {$hasLow = true;}
        $hasSpec = false;       if (!$areSpecCharsIncluded)   {$hasSpec = true;}

        // * genera diverse password all'infinito, finché non generi una password con tutti i tipi di caratteri 
        while (!$hasNumber || !$hasUp || !$hasLow || !$hasSpec) {

            // * resetto la variabile password ad ogni ciclo while
            $password = "";
            
            // * resetto tutte le variabili booleane di check type ad ogni ciclo while
            $hasNumber = false;     if (!$areNumbersIncluded)     {$hasNumber = true;}
            $hasUp = false;         if (!$areUpLettersIncluded)   {$hasUp = true;}
            $hasLow = false;        if (!$areLowLettersIncluded)  {$hasLow = true;}
            $hasSpec = false;       if (!$areSpecCharsIncluded)   {$hasSpec = true;}


            // * finche non esce una password che abbia tutti i tipi di caratteri selezionati dall'utente, continua a generare password
            while (strlen($password) < $pwdLength) {
            
                // * dichiaro 4 nuove variabili che prendono un valore a caso del loro array
                $randomNumber =   $numbers[random_int(0, (count($numbers) - 1))];         if (!$areNumbersIncluded)       {$randomNumber = "";}
                $randomUp =       $upLetters[random_int(0, (count($upLetters) - 1))];     if (!$areUpLettersIncluded)     {$randomUp = "";}
                $randomLow =      $lowLetters[random_int(0, (count($lowLetters) - 1))];   if (!$areLowLettersIncluded)    {$randomLow = "";}
                $randomSpec =     $specChars[random_int(0, (count($specChars) - 1))];     if (!$areSpecCharsIncluded)     {$randomSpec = "";}
                
                // * creo un nuovo array typesRandom con le 4 variabili casuali dichiarate prima
                $typesRandom = [$randomNumber, $randomUp, $randomLow, $randomSpec];

                // * dichiaro una variabile che prende un valore a caso dall'array typesRandom, qundi un randomCharacter
                $randomChar = $typesRandom[random_int(0, (count($typesRandom) - 1))];

                // * se il randomChar è incluso in uno degli array iniziali, allora la variabile booleana di quel tipo diventa true
                if (in_array ($randomChar, $numbers))       {$hasNumber = true;}
                if (in_array ($randomChar, $upLetters))     {$hasUp = true;}
                if (in_array ($randomChar, $lowLetters))    {$hasLow = true;}
                if (in_array ($randomChar, $specChars))     {$hasSpec = true;}
                
                // * riassegno il valore della variabile password aggiungendo per ogni ciclo un valore a caso dell'array typesRandom
                $password .= $randomChar;
            }
        }
        // * ritorno il valore della password
        return $password;
    }
?>