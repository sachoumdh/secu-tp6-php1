<?php

 // Associative array of serveurs, Chapter 6 - reference slide 64 and seen in pw
 $serveurs = [ 'api-01'=> [ 45 , 60 , '1' , 47.5 , 'ATTENTION' ],
               'api-02'=> [ 92 , 78 , '1' , 15 , 'CRITIQUE'],
               'db-prod'=> [ 70 , 95 , '1' , 17.5 , 'CRITIQUE'],
               'web-01'=> [ 30 , 40 , '1' , 65 , 'OK'],
               'web-02'=> [ 55 , 65 , '0' , 40 , 'ATTENTION'],
               'cache-01'=> [ 88 , 92 , '1' , 10 , 'CRITIQUE'], ];
 
            
 // The variables to use for displaying the summary
 $TotalServeurOnline = 0;
 $SumScore = 0;
 $BestScore = 0;
 $BestServeur = '';

?>

<html>
    <head>
    </head>
    <body>
        <!-- Declaring a table in HTML -->
        <table id="table1" border="1">
            <tr>
               <th> Serveur </th> <!-- column 1 -->
               <th> CPU% </th> <!-- column 2 -->
               <th> RAM% </th> <!-- column 3 -->
               <th> Status </th> <!-- column 4 -->
               <th> Score </th> <!-- column 5 -->
               <th> État</th> <!-- column 6 -->
            </tr> 

            <?php
              
              // FOR loop to iterate through the array , Chapter 6 - reference slide 69
               foreach ($serveurs as $serveur => $info){
                  [$cpu, $ram, $status, $score, $etat] = $info ;

                  // At each iteration, we store the fields we're going through in variables so we can use them to apply the colors
                  $status = $info[2];
                  $cpu = $info[0];
                  $ram = $info[1];
                  $score = $info[3];

                  // Replacing 1 by online in the table , and 0 by offline
                  if ($status == '1') {
                    $state = "online";
                  } else {
                    $state = "offline";
                  }

                  // IF ELSE condition to assign lines color, Chapter 6 - reference slide 67
                  if ($status == '0') {
                      $background_color = " rgb(200,200,200) "; // grey color for offline   
                  } elseif ($cpu > 85 || $ram > 90 ) {
                      $background_color = " rgb(255,180,180)"; // red color for etat critique 
                  } elseif ($score >= 50) {
                      $background_color = "rgb(180,255,180)"; // green color for score 
                  } else {
                      $background_color = "rgb(255,220,150)"; // orange color for score
                  }

                  // Calculate number online serveur 
                  if ( $status == 1 ) {
                    $TotalServeurOnline = $TotalServeurOnline + 1;
                  }

                  // Formula to calculate the score
                  $score = 100 - ( (($cpu) + ($ram)) / 2 ) ; 

                  // Calculate score sum 
                  $SumScore = $SumScore + $score;

                  // Caculate best score and best serveur 
                  if ($score > $BestScore) {
                    $BestScore = $score;
                    $BestServeur = $serveur;
                  }

                  // Displaying the table
                  echo "<tr class='row'style='background-color: $background_color;'>"; // Apply colors to the lines
                  echo "<td td class='serveur'>$serveur</td> " ;
                  echo "<td td class='cpu'>$cpu</td> " ;
                  echo "<td td class='ram'>$ram</td> " ;
                  echo "<td td class='status'>$state</td>";
                  echo "<td td class='score'>$score</td> " ;
                  echo "<td td class='etat'>$etat</td> " ; 
                  echo "</tr>";
                }

                // Calculate average score 
                $AverageScore = $SumScore / count($serveurs);

            ?>
        </table>

        <!-- Display the Resume after the table --> 
        <h2> Résumé </h2>
        <?php 
            echo "<p id='total_online_servers'> Serveurs online: $TotalServeurOnline</p>";
            echo "<p id='moy_scores'> Score moyen: $AverageScore</p>";
            echo "<p id='best_serv'> Meilleur serveur: $BestServeur ($BestScore) </p>";
        ?>
    </body>  
</html>