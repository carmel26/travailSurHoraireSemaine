<?php 
  $cour[] = ['cour'=>'francais','vh'=>7,'classe'=>'classe7emA','prof'=>'A'] ;
  $cour[] = ['cour'=>'anglais','vh'=>5,'classe'=>'classe7emA','prof'=>'B'];
  $cour[] = ['cour'=>'kirundi','vh'=>5,'classe'=>'classe7emA','prof'=>'C'];
  $cour[] = ['cour'=>'maths','vh'=>3,'classe'=>'classe7emA','prof'=>'D'];
  $cour[] = ['cour'=>'technologie','vh'=>6,'classe'=>'classe7emA','prof'=>'E'];
  $cour[] = ['cour'=>'biologie','vh'=>8,'classe'=>'classe7emA','prof'=>'F'];
  $cour[] = ['cour'=>'civisime','vh'=>2,'classe'=>'classe7emA','prof'=>'G'];
  $cour[] = ['cour'=>'em','vh'=>5,'classe'=>'classe7emA','prof'=>'H'];
  $cour[] = ['cour'=>'geographie','vh'=>2,'classe'=>'classe7emA','prof'=>'A'];
  $cour[] = ['cour'=>'tpa','vh'=>1,'classe'=>'classe7emA','prof'=>'I'];
  $cour[] = ['cour'=>'eps','vh'=>1,'classe'=>'classe7emA','prof'=>'J'];

  $cour[] = ['cour'=>'francais','vh'=>8,'classe'=>'classe7emB','prof'=>'K'] ;
  $cour[] = ['cour'=>'anglais','vh'=>5,'classe'=>'classe7emB','prof'=>'B'];
  $cour[] = ['cour'=>'kirundi','vh'=>5,'classe'=>'classe7emB','prof'=>'A'];
  $cour[] = ['cour'=>'maths','vh'=>3,'classe'=>'classe7emB','prof'=>'C'];
  $cour[] = ['cour'=>'technologie','vh'=>6,'classe'=>'classe7emB','prof'=>'D'];
  $cour[] = ['cour'=>'biologie','vh'=>8,'classe'=>'classe7emB','prof'=>'L'];
  $cour[] = ['cour'=>'eps','vh'=>1,'classe'=>'classe7emB','prof'=>'J'];

  $cour[] = ['cour'=>'civisime','vh'=>2,'classe'=>'classe7emC','prof'=>'M'];
  $cour[] = ['cour'=>'em','vh'=>5,'classe'=>'classe7emC','prof'=>'N'];
  $cour[] = ['cour'=>'geographie','vh'=>4,'classe'=>'classe7emC','prof'=>'O'];
  $cour[] = ['cour'=>'tpa','vh'=>1,'classe'=>'classe7emC','prof'=>'P'];
  $cour[] = ['cour'=>'eps','vh'=>1,'classe'=>'classe7emC','prof'=>'Q'];


  $nombresDeJour = 5;
  $nombresHeuresParJours = 8;
  $nbresHeurseCoursParJours = 4;
  $classe = array(
    'classe7emA','classe7emB','classe7emC'
  );

  $listProfs = [];
  for ($cptProf=0; $cptProf < count($cour); $cptProf++) { 
      if (! in_array( $cour[$cptProf]['prof'],$listProfs)) { 
         array_push($listProfs, $cour[$cptProf]['prof']); 
      }
  }
 
  $horaireSemaines = []; 

$backUpCour = $cour;
for ($listClasse=0; $listClasse < count($classe); $listClasse++) {  
  $listCourNouveau = triallage($cour,$classe[$listClasse]); 
    for ($joursemaine=0; $joursemaine < $nombresDeJour; $joursemaine++) { 
      $counterAutres = 0;
      for ($cptHeuresJours=0; $cptHeuresJours < $nombresHeuresParJours; $cptHeuresJours++) {  
                
         if (isset($listCourNouveau[$cptHeuresJours]) ?$listCourNouveau[$cptHeuresJours]:false) {
              
                if (isset($listCourNouveau[$cptHeuresJours])?$listCourNouveau[$cptHeuresJours]['vh'] > 0: false) {
                  $listCourNouveau[$cptHeuresJours]['vh'] = $listCourNouveau[$cptHeuresJours]['vh']-1;
                  $horaireSemaines[$listClasse][$joursemaine]['A'.$listCourNouveau[$cptHeuresJours]['cour']] = $listCourNouveau[$cptHeuresJours];
                }else{
                  if (isset($listCourNouveau[$nombresHeuresParJours+$counterAutres])?$listCourNouveau[$nombresHeuresParJours+$counterAutres]['vh'] > 0: false) {
                        if (count($listCourNouveau) > $nombresHeuresParJours+$counterAutres){
                          $listCourNouveau[($nombresHeuresParJours+$counterAutres)]['vh'] = $listCourNouveau[$nombresHeuresParJours+$counterAutres]['vh']-1;
                          $horaireSemaines[$listClasse][$joursemaine]['B'.$cour[($nombresHeuresParJours+$counterAutres)]['cour']] = $listCourNouveau[$nombresHeuresParJours+$counterAutres];
                          $counterAutres ++;
                        }
                  }
                }
            }
        # code...
      }  
     
      if ($nombresHeuresParJours > (isset($horaireSemaines[$listClasse][$joursemaine])?count($horaireSemaines[$listClasse][$joursemaine]): $nombresHeuresParJours)) {
            $counterAutresDeux = 0;
            $testFini = 0;
            for ($indiceCour=0; 
                $indiceCour < (count($cour));
                $indiceCour++) {  
          if ($testFini < ($nombresHeuresParJours - (isset($horaireSemaines[$listClasse][$joursemaine])?count($horaireSemaines[$listClasse][$joursemaine]): $nombresHeuresParJours))) {
          
              if (isset($listCourNouveau[$indiceCour])?$listCourNouveau[$indiceCour]['vh'] > 0:false) {
                $testFini ++; 
                $listCourNouveau[$indiceCour]['vh'] = $listCourNouveau[$indiceCour]['vh']-1;
                $horaireSemaines[$listClasse][$joursemaine]['C'.$listCourNouveau[$indiceCour]['cour']] = $listCourNouveau[$indiceCour];
              
              }else{
                if (isset($listCourNouveau[$indiceCour+$counterAutresDeux])?$listCourNouveau[$indiceCour+$counterAutresDeux]['vh'] > 0:false) {
                      if (count($listCourNouveau) > $indiceCour+$counterAutresDeux){
                        $listCourNouveau[($indiceCour+$counterAutresDeux)]['vh'] = $clistCourNouveauour[$indiceCour+$counterAutresDeux]['vh']-1;
                        $horaireSemaines[$listClasse][$joursemaine]['D'.$listCourNouveau[($indiceCour+$counterAutresDeux)]['cour']] = $listCourNouveau[$indiceCour+$counterAutresDeux];
                        $counterAutresDeux ++;
                      }
                }
              }  # code...
            }
          } 
          if (count($horaireSemaines[$listClasse][$joursemaine])< $nombresHeuresParJours) {  
          
            $difference = ($nombresHeuresParJours-count($horaireSemaines[$listClasse][$joursemaine])); 
            //parcourire toutes les cours
                for ($cptnouveau=0; $cptnouveau < count($listCourNouveau) ; $cptnouveau++) {   
                  if($listCourNouveau[$cptnouveau]['vh'] > 0 && $cptnouveau < $difference){
                    $listCourNouveau[$cptnouveau]['vh'] = $listCourNouveau[$cptnouveau]['vh']-1;
                    $horaireSemaines[$listClasse][$joursemaine]['J'.$listCourNouveau[$cptnouveau]['cour']] =
                     $listCourNouveau[$cptnouveau]; 
                  }
                }  
          }
      }  
  } 
}

    function triallage($cour,$valeur) {
      $dataRetour = [];
      foreach ($cour as $data) {
            if($data['classe'] == $valeur) {
              array_push($dataRetour,$data);
            }
        }
        return $dataRetour;
    }
// echo json_encode($horaireSemaines);
?>


<!DOCTYPE>
<html>
     <head>
         <title>T.Table</title>
     </head>
     <body>
       <?php 
          $arrayChangedOne = array_values($horaireSemaines); 
          for ($iDetails=0; $iDetails < count($arrayChangedOne); $iDetails++) { 
       ?>
       <br>
           <table border="1">
                  <thead>
                       <tr>
                           <th colspan="9"> 
                              <u><center>Classe: <?=$classe[$iDetails]?></center></u> 
                           </th>
                       </tr>
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
                          $tableData = $horaireSemaines[$iDetails];
                          $arrayChanged = array_values($horaireSemaines[$iDetails]); 
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
                              for ($videCpt=0; $videCpt < ($nombresHeuresParJours-count($unite)) ; $videCpt++) { 
                                ?>
                                  <td>
                                    -
                                  </td>
                                <?php
                              } 
                            ?>
                        </tr>
                        <?php  
                          }
                          for ($videRows=0; $videRows < ($nombresDeJour-count($arrayChanged)); $videRows++) { 
                            ?>
                            <tr>
                              <td>
                                Jour <?=count($arrayChanged)+$videRows?>
                              </td>
                            <?php
                              for ($videCpt=0; $videCpt < ($nombresHeuresParJours) ; $videCpt++) { 
                                ?>
                                  <td>
                                    -
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
           <?php } ?>
     </body>
</html>