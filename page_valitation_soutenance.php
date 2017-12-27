<?php
session_start();
?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="main.css">
        <link rel="stylesheet" href="bootstrap.css">
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link rel="stylesheet" href=main.css>

        <title>Valitation soutenance</title>
    </head>

    <body>
        <?php include 'header_choice.inc.php' ;?>

            <div class="centrer">
                <table class="table" id="planning">
                    <thead>
                        <tr>
                            <th>Groupe</th>
                            <th>Matière</th>
                            <th>Enseignant</th>
                            <th>Date</th>
                            <th>Heure</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>5</th>
                            <td>Réseau informatique</td>
                            <td>M.Blabla</td>
                            <td>15/15/15</td>
                            <td>13h30</td>
                        </tr>
                        <tr>
                            <th>8</th>
                            <td>Gestion financière</td>
                            <td>M.Jaiunnomtrèstrèslong</td>
                            <td>16/16/16</td>
                            <td>28h89</td>
                        </tr>
                        <tr>
                            <th>1</th>
                            <td>Modulation</td>
                            <td>M.a</td>
                            <td>17/17/17</td>
                            <td>5h55</td>
                        </tr>
                    </tbody>
                </table>


                <button type="button" style="button-align:center"> Valider</button>
                <button type="button" style="button-align:center"> Modifier</button>

            </div>


    </body>
