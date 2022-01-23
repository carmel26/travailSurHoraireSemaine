<?php 
  $cour[] = array('cour'=>'francais','vh'=>4) ;
  $cour[] = array('cour'=>'anglais','vh'=>3);
  $cour[] = array('cour'=>'kirundi','vh'=>5);
  $cour[] = array('cour'=>'maths','vh'=>3);
  $cour[] = array('cour'=>'technologie','vh'=>6);
  $cour[] = array('cour'=>'biologie','vh'=>4);
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
  $VHCours = [];
  for ($i=0; $i < count($cour); $i++) { 
     if (!isset($VHCours[$cour[$i]['cour']])) {
        $VHCours[$cour[$i]['cour']]['VH'] = $cour[$i]['vh'];
     }
  }

$backUpCour = $cour;
  for ($joursemaine=0; $joursemaine < $nombresDeJour; $joursemaine++) { 
    $counterAutres = 0;
    for ($cptHeuresJours=0; $cptHeuresJours < $nombresHeuresParJours; $cptHeuresJours++) {  
         if (isset($horaireSemaines[$joursemaine][ isset($cour[$cptHeuresJours])?$cour[$cptHeuresJours]['cour']:''])) { 
           // faire rien
         }else {
           if (count($cour) < $nombresHeuresParJours && $cptHeuresJours>=count($cour) && $cour[abs($cptHeuresJours-count($cour))]['vh']) {
                if (isset($cour[abs($cptHeuresJours-count($cour))])?$cour[abs($cptHeuresJours-count($cour))]['cour']:'') {  
                    $cour[abs($cptHeuresJours-count($cour))]['vh'] = $cour[abs($cptHeuresJours-count($cour))]['vh']-1;  
                    $horaireSemaines[$joursemaine][$cour[abs($cptHeuresJours-count($cour))]['cour']][$cptHeuresJours+1] = array('cour'=>$cour[abs($cptHeuresJours-count($cour))]);
                }
           }  else { 
              if ((isset($cour[$cptHeuresJours])?$cour[$cptHeuresJours]['cour']:'') && ($cour[$cptHeuresJours]['vh'])>0) { 
                  $horaireSemaines[$joursemaine][$cour[$cptHeuresJours]['cour']][$cptHeuresJours+1] = array('cour'=>$cour[$cptHeuresJours]); 
                  $cour[$cptHeuresJours]['vh'] = $cour[$cptHeuresJours]['vh']-1;  
               }else {
                    //  retourner au premier index des cours 
                      if (abs($cptHeuresJours-(count($cour)-1)) != $counterAutres) {
                        
                      }else {
                        if ($counterAutres <= count($cour)) {
                           $counterAutres ++;
                        } 
                      }
                       
                      if (isset($cour[$counterAutres])?$cour[$counterAutres]['cour']:'') { 
                          $horaireSemaines[$joursemaine][$cour[$counterAutres]['cour']][$cptHeuresJours+1] =
                           array('cour'=>$cour[abs($cptHeuresJours-(count($cour)-1))]); 
                          $cour[$counterAutres]['vh'] = $cour[$counterAutres]['vh']-1;  
                          if ($counterAutres <= count($cour)) {
                            $counterAutres ++;
                         } 
                      } 
               }
           }
              
         } 
     }  
}
echo json_encode($horaireSemaines);
?>