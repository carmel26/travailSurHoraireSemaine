<?php 
  $cour[] = array('cour'=>'francais','vh'=>24,'jours'=>4) ;
  $cour[] = array('cour'=>'anglais','vh'=>20,'jours'=>3);
  $cour[] = array('cour'=>'kirundi','vh'=>5,'jours'=>3);
  $cour[] = array('cour'=>'maths','vh'=>25,'jours'=>4);
  // $cour[] = array('cour'=>'em','vh'=>5,'jours'=>2);
  // $cour[] = array('cour'=>'geographie','vh'=>4,'jours'=>2);
  // $cour[] = array('cour'=>'technologie','vh'=>8,'jours'=>3);
  // $cour[] = array('cour'=>'biologie','vh'=>20,'jours'=>4);
  // $cour[] = array('cour'=>'civisime','vh'=>2,'jours'=>1);

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
                    $horaireSemaines[$joursemaine][$cour[abs($cptHeuresJours-count($cour))]['cour']][$cptHeuresJours+1] = array('cour'=>$cour[abs($cptHeuresJours-count($cour))],'place'=>$cptHeuresJours);
                }
           }  else { 
              if ((isset($cour[$cptHeuresJours])?$cour[$cptHeuresJours]['cour']:'') && $cour[$cptHeuresJours]['vh']>0) { 
                  $cour[$cptHeuresJours]['vh'] = $cour[$cptHeuresJours]['vh']-1;  
                  $horaireSemaines[$joursemaine][$cour[$cptHeuresJours]['cour']][$cptHeuresJours+1] = array('cour'=>$cour[$cptHeuresJours],'place'=>$cptHeuresJours);
               }elseif ($cour[abs($cptHeuresJours-count($cour))]['vh'] == 0) {
                    //  retourner au premier index des cours 
                      if (isset($cour[$counterAutres])?$cour[$counterAutres]['cour']:'') {  
                          $cour[$counterAutres]['vh'] = $cour[$counterAutres]['vh']-1;  
                          $horaireSemaines[$joursemaine][$cour[$counterAutres]['cour']][$cptHeuresJours+1] = array('cour'=>$cour[abs($cptHeuresJours-count($cour))],'place'=>$cptHeuresJours);
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