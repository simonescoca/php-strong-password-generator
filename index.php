<?php
    /*
        Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password (abbastanza) sicure.
        L’esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.

        Milestone 1:
            Creare un form che invii in GET la lunghezza della password.
            Una nostra funzione utilizzerà questo dato per generare una password casuale
            (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente.
            Scriviamo tutto (logica e layout) in un unico file index.php
        
        Milestone 2:
            Verificato il corretto funzionamento del nostro codice,
            spostiamo la logica in un file functions.php che includeremo poi nella pagina principale
        
        BONUS 1:
            Invece di visualizzare la password nella index,
            effettuare un redirect ad una pagina dedicata che tramite $_SESSION recupererà la password da mostrare all’utente.
        
        BONUS 2:
            Gestire ulteriori parametri per la password:
            quali caratteri usare fra numeri, lettere e simboli.
            Possono essere scelti singolarmente (es. solo numeri)
            oppure possono essere combinati fra loro (es. numeri e simboli,
            oppure tutti e tre insieme). Dare all’utente anche la possibilità di permettere o meno la ripetizione di caratteri uguali.
    */

    include_once __DIR__ . "/utilities/functions.php";

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="./style.css">
        <title>Password Generator</title>
    </head>
    <body>
        <?php
            $pwd_length = $_GET["pwd-length"];
            $are_there_numbers = isset($_GET["numbers"]);
            $are_there_up_letters = isset($_GET["up-letters"]);
            $are_there_low_letters = isset($_GET["low-letters"]);
            $are_there_spec_chars = isset($_GET["spec-chars"]);
        ?>
        <div class="container py-5">
            <form action="./" method="get" class="d-flex justify-content-between align-items-center my_form">
                <div class="d-flex align-items-center my_check">
                    <label for="numbers" class="me-3">
                        Lunghezza Password
                    </label>
                    <input type="number" name="pwd-length" class="form-control" id="pwd-length" min="1" max="30" step="1" value="12">
                </div>
                
                <div class="my_check">
                    <label for="numbers">
                        1 2 3
                    </label>
                    <input type="checkbox" name="numbers" id="numbers" checked />
                </div>
    
                <div class="my_check">
                    <label for="up-letters">
                        A B C
                    </label>
                    <input type="checkbox" name="up-letters" id="up-letters" checked />
                </div>
    
                <div class="my_check">
                    <label for="low-letters">
                        a b c
                    </label>
                    <input type="checkbox" name="low-letters" id="low-letters" checked />
                </div>
    
                <div class="my_check">
                    <label for="spec-chars">
                        ! @ #
                    </label>
                    <input type="checkbox" name="spec-chars" id="spec-chars" checked />
                </div>
    
                <button type="submit">
                    PW Request
                </button>
            </form>
            <div class="d-flex justify-content-center pt-5 my_response">
                <?php
                    $pw = genPwd ($pwd_length, $are_there_numbers, $are_there_up_letters, $are_there_low_letters, $are_there_spec_chars);
                    echo $pw;
                ?>
            </div>
        </div>
    </body>
</html>