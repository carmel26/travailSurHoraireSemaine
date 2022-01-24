<?php 
  $cour[] = array('cour'=>'francais','vh'=>6) ;
  $cour[] = array('cour'=>'anglais','vh'=>5);
  $cour[] = array('cour'=>'kirundi','vh'=>5);
  $cour[] = array('cour'=>'maths','vh'=>3);
  $cour[] = array('cour'=>'technologie','vh'=>6);
  $cour[] = array('cour'=>'biologie','vh'=>8);
  $cour[] = array('cour'=>'civisime','vh'=>2);
  $cour[] = array('cour'=>'em','vh'=>5);
  $cour[] = array('cour'=>'geographie','vh'=>4);
  $cour[] = array('cour'=>'tpa','vh'=>1);
  $cour[] = array('cour'=>'eps','vh'=>1);

//   print_r($cour);
  $nombresDeJour = 5;
  $nombresHeuresParJours = 8;
  $nbresHeurseCoursParJours = 4;

  $horaireSemaines = [];
 

$backUpCour = $cour;
  for ($joursemaine=0; $joursemaine < $nombresDeJour; $joursemaine++) { 
    $counterAutres = 0;
    for ($cptHeuresJours=0; $cptHeuresJours < $nombresHeuresParJours; $cptHeuresJours++) {  
        if (count($cour) > $cptHeuresJours) {
          # code...
        }
        if (isset($cour[$cptHeuresJours])?$cour[$cptHeuresJours]['vh'] > 0: false) {
           $cour[$cptHeuresJours]['vh'] = $cour[$cptHeuresJours]['vh']-1;
           $horaireSemaines[$joursemaine]['A'.$cour[$cptHeuresJours]['cour']] = $cour[$cptHeuresJours];
        }else{
          if (isset($cour[$nombresHeuresParJours+$counterAutres])?$cour[$nombresHeuresParJours+$counterAutres]['vh'] > 0: false) {
                if (count($cour) > $nombresHeuresParJours+$counterAutres){
                  $cour[($nombresHeuresParJours+$counterAutres)]['vh'] = $cour[$nombresHeuresParJours+$counterAutres]['vh']-1;
                  $horaireSemaines[$joursemaine]['B'.$cour[($nombresHeuresParJours+$counterAutres)]['cour']] = $cour[$nombresHeuresParJours+$counterAutres];
                  $counterAutres ++;
                }
          }
        }
     }
     if ($nombresHeuresParJours > (count($horaireSemaines[$joursemaine]))) {
          $counterAutresDeux = 0;
          $testFini = 0;
          for ($indiceCour=0; 
               $indiceCour < (count($cour));
               $indiceCour++) {  
         if ($testFini < ($nombresHeuresParJours - (count($horaireSemaines[$joursemaine])))) {
         
            if (isset($cour[$indiceCour])?$cour[$indiceCour]['vh'] > 0:false) {
              $testFini ++; 
              $cour[$indiceCour]['vh'] = $cour[$indiceCour]['vh']-1;
              $horaireSemaines[$joursemaine]['C'.$cour[$indiceCour]['cour']] = $cour[$indiceCour];
             
            }else{
              if (isset($cour[$indiceCour+$counterAutresDeux])?$cour[$indiceCour+$counterAutresDeux]['vh'] > 0:false) {
                    if (count($cour) > $indiceCour+$counterAutresDeux){
                      $cour[($indiceCour+$counterAutresDeux)]['vh'] = $cour[$indiceCour+$counterAutresDeux]['vh']-1;
                      $horaireSemaines[$joursemaine]['D'.$cour[($indiceCour+$counterAutresDeux)]['cour']] = $cour[$indiceCour+$counterAutresDeux];
                      $counterAutresDeux ++;
                    }
              }
            }  # code...
          }
        } 
     }  
}
// echo json_encode($horaireSemaines);
?>


<!DOCTYPE>
<html>
     <head>
         <title>T.Table</title>
     </head>
     <body>
           <table border="1">
                  <thead>
                       <tr>
                           <th>Jour</th>
                           <th>De 7h30-8h15</th>
                           <th>De 8h15-9h00</th>
                           <th>De 9h00-9h45</th>
                           <th>De 9h45-10h30</th>
                           <th>De 10h45-11h15</th>
                           <th>De 11h15-12h00</th>
                           <th>De 12h00-12h45</th>
                           <th>De 12h45-13h15</th> 
                       </tr>
                  </thead>
                  <tbody>
                       <?php 
                          $tableData = $horaireSemaines;
                          $arrayChanged = array_values($horaireSemaines); 
                          for ($i=0; $i < count($arrayChanged); $i++) {  
                       ?>
                        <tr> 
                          <td>
                             Jour <?=$i+1?>
                          </td>
                              <?php $unite = array_values($arrayChanged[$i])  ;
                              for ($j=0; $j < count($unite); $j++) { 
                                ?>
                                  <td>
                                     <?php echo ($unite[$j]['cour']); 
                                     ?>
                                  </td>
                                <?php
                              } 
                            ?>
                        </tr>
                        <?php  
                          } 
                          ?>
                  </tbody>
           </table>
     </body>
</html>