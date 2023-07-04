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
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <title>Password Generator</title>
    </head>
    <body>
        
    </body>
</html>