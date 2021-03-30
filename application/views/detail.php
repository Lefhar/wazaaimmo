<!-- application/views/detail.php -->
<div class="container-fluid">
    <div class="row">
   
<div class="col-sm-8">   
<article>
<div class="card m-4" >
<?php 
if(!empty($infoprod)) {
   // var_dump($infoprod);
    foreach ($infoprod as $row) {
        if(!empty($row['an_offre'])){
if($row['an_offre'] == "A"){
     $offre = "Achat"; 
    }elseif($row['an_offre'] == "L"){
        $offre = "Location";}elseif($row['an_offre'] == "V"){
             $offre = "Vente";}else{$offre = "";}
        }

  echo ' 
       
    <div class="card-body">
      <h5 class="card-title">'.$offre.' ' . $row['cat_libelle'] . ' ' . $row['an_titre'] . '</h5>
      <p class="card-text">' . $row['an_description'] . '</p>
      <p class="card-text">Prix : ' . $row['an_prix'] . '&euro;</p>
      <p class="card-text">offre : ' . $offre . ' Produit disponible</p>
      <p class="card-text">Référence : ' . $row['an_ref'] . '</p>
      <p class="card-text">catégorie : ' . $row['cat_libelle'] . '</p>
      <p class="card-text">Ajouté le : ' . $row['an_d_ajout'] . '</p>
      <a href="' . site_url('annonces/modifier/' . $row['an_id']) . '" class="btn btn-bg-perso">Modifier</a>   <a href="' . site_url('annonces/delete/' . $row['an_id'] . '') . '"   class="btn btn-danger">Supprimer le produit</a>
  
  ';

    }
}
?>  </div>
</div>
                </article>
</div>
<div class="col-sm-4 p-4">  
<?php
       foreach($row['photo'] as  $image ){

        echo ' 
        <img src="'.base_url('assets/images/annonce_'.$image->pic_an_id.'/'.$image->pic_an_id.'-'.$image->pic_id.'.'.$image->pic_ext).'" class="w-100 p-1"  alt="'.$row['an_titre'].'"  >
   ';
     }
     ?>
     </div>

   
</div>
</div>