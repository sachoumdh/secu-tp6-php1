<?php

 // Associative array of students, Chapter 6 - reference slide 64
 $etudiantsNote = array('JOHN'=> 9, 'BOB'=> 15.5, 'RAYANE'=> 7, 'ROSIE'=> 13 );

 // Function to check whether a student is admis or not, Chapiter 6 - reference slide 71
 function estAdmissible($note) {
    return $note >= 10;
 }

?>

<html>
    <head>
    </head>
    <body>
        <!-- Declaring a table in HTML -->
        <table id="table1" border="1">
            <tr>
               <th> Etudiant </th> <!-- column 1 -->
               <th> Note </th> <!-- column 2 -->
            </tr>

            <?php
              
              // FOR loop to iterate through the array and retrieve the grades, Chapter 6 - reference slide 69
              foreach ($etudiantsNote as $etudiants => $note){
                
                // IF condition to assign either a green or red color based on the grade, Chapter 6 - reference slide 67
                if (estAdmissible($note)) {
                    $background_color = "rgb(136,248,136)"; // green color
                }else {
                    $background_color = "rgb(251,173,173)"; // red color   
                }

                // Displaying the table
                echo "<tr class='row'>";
                echo "<td td class='etud'>$etudiants</td> " ;
                echo "<td td class='note' style='background-color: $background_color;'>$note</td>"; // Apply colors to the notes column
                echo "</tr>";
              }
            ?>

        </table>
    </body>  
</html>
