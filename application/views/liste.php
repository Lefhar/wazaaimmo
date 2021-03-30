<div class="dropdown m-2 ">
          <button class="btn btn-bg-perso dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Trier par
          </button>
          <ul class="dropdown-menu btn-bg-perso" role="menu" aria-labelledby="dropdownMenu">
            <li class="dropdown-submenu">
              <a class="dropdown-item" tabindex="-1" href="#">Catégorie</a>
              <ul class="dropdown-menu btn-bg-perso" >
                <li class="dropdown-item dropdown-item-perso"><a tabindex="-1" href="<?php echo site_url('produits/liste/cat/asc');?>">Croissant</a></li>
                <li class="dropdown-item dropdown-item-perso"><a tabindex="-1" href="<?php echo site_url('produits/liste/cat/desc');?>">Décroissant</a></li>
              </ul>
            </li>
        
		
            <li class="dropdown-submenu ">
              <a class="dropdown-item" tabindex="-1" href="#">Prix</a>
              <ul class="dropdown-menu btn-bg-perso">
                <li class="dropdown-item btn-bg-perso"><a tabindex="-1" href="<?php echo site_url('produits/liste/prix/asc');?>">Croissant</a></li>
                <li class="dropdown-item btn-bg-perso"><a tabindex="-1" href="<?php echo site_url('produits/liste/prix/desc');?>">Décroissant</a></li>
              </ul>
            </li>
         </ul>
                    <?php if(!empty($this->session->login)){?>
         <a class="btn btn-bg-perso float-right" href="<?php echo site_url('produits/ajouter');?>">Ajouter un produit</a>
                    <?php } ?>
        </div>

<div class="row pt-2 mx-0 mb-1">

<?php if(!empty($liste_produits)) {  
   //var_dump($liste_produits); 
    //exit();
//var_dump($photo); 


    foreach ($liste_produits as $row) {
       // echo $row['an_id'];
//  var_dump($row);
//echo $img; 

        ?>
<div class="col-lg-4">
            <div class="card border-bg-perso mb-4 shadow-sm">
                <div class="card-header text-center">
                    <h2 class="h5 card-title">
                        <a href="<?=site_url("annonces/details/".$row['an_id']);?>" class="color-perso"><?=$row['cat_libelle'];?> <?=$row['an_titre'];?></a>
                    </h2><!-- Titre -->
                    <h3 class="h6 card-subtitle text-muted"><?=$row['an_ref'];?></h3><!-- Référence -->
                    <a href="<?=site_url("annonces/details/".$row['an_id']);?>">
                  
                       <!-- Photo 1 -->
                        <div id="carouselControls<?=$row['an_id'];?>" class="carousel slide" data-interval="false">
  <div class="carousel-inner">
      <?php   
      //   $images = scandir('assets/images/annonce_'.$row->an_id);

    $i = 0;

     foreach($row['photo'] as  $image ){
       
        // var_dump($image);

        // $image['pic_an_id']
    $i++;
         ?>
         <?php 
        // echo $image->pic_an_id.''.$row->an_id;
  
         
         if($i==1){?>
    <div class="carousel-item active" >
      <img src="<?=base_url("assets/images/annonce_".$image->pic_an_id."/".$image->pic_an_id."-".$image->pic_id.".".$image->pic_ext);?>" class="d-block w-100 carouselheight"  alt="<?=$row['an_titre'];?>">
    </div>
<?php }else{?>

<div class="carousel-item"  >
<img src="<?=base_url("assets/images/annonce_".$image->pic_an_id."/".$image->pic_an_id."-".$image->pic_id.".".$image->pic_ext);?>" class="d-block w-100 carouselheight"   alt="<?=$row['an_titre'];?>">
</div>
<?php
}


}
?>
  </div>
  <a class="carousel-control-prev" href="#carouselControls<?=$row['an_id'];?>" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselControls<?=$row['an_id'];?>" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
                    </a>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?=$row['an_local'];?></li><!-- Localisation -->
                        <li class="list-group-item"><?=$row['an_surf_hab'];?>m²</li><!-- Surface Totale -->
                        <li class="list-group-item"><?=$row['an_prix'];?>€</li><!-- Prix -->
                    </ul>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <a href="<?=site_url("annonces/details/".$row['an_id']);?>" class="btn btn-sm btn-bg-perso"><i class="fa fa-eye"></i> Détails</a>
                    <small class="text-muted"><?php $date = new DateTime($row['an_d_ajout']);
$formater = strtotime($date->format('Y-m-d'));
echo strftime("%A %e %B %Y", $formater);?></small><!-- Date d'ajout -->
                </div>
            </div>
        </div>
        <?php }
        }?>
</div>