<!-- application/views/delete.php -->
<div class="container">
    <div class="row">
        <div class="col-12">
            <article>


            <div class="card m-4 p-4" >
            <?php   if(!empty($produit)) {
         ?>
                 <div class="card-body">
             <h1 class="card-title">Etes vous sûr de vouloir supprimer <?php echo  $produit->an_titre;?> de la base de données ?</h1>
                 <?php

                //  balise form début du formulaire
                   echo form_open('','name="suppression_produit" id="suppression_produit"'); ?>

                      <?php

                    $data = array('name' => 'confirm','id' => 'confirm','class' => 'form-control','type'=>'hidden','value' => 'yes');
                    echo form_input($data);


                    echo '<div class="form-group">';
                    //bouton Confirmation
                     echo form_submit('', 'Confirmer', 'class="btn btn-bg-perso btn-lg"');
                     //bouton pour réinitialiser
                     echo form_reset('', 'Annuler', 'class="btn btn-danger btn-lg"','onclick="location.href = \''.site_url("annonces/liste").'\';"' );
                    echo ' </div>
                    <!--balise form fin du formulaire-->';
                    echo  form_fieldset_close();
                      }  ?>
                    </div>
             </div>
             </article>
        </div>
    </div>
</div>