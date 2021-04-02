<!-- application/views/detail.php -->
<div class="container-fluid">
    <div class="row">
<div class="col-lg-12">   
<article>

  




 <legend> Formulaire d'ajout de bien

 </legend>
     <?php 
     
    //  balise form début du formulaire
       echo form_open_multipart('','name="ajouter_produit" id="ajouter_produit"'); ?>
          <fieldset>

          <?php    


        //label an_offre
        $labeloffre = array('class' => 'col-sm-2 col-form-label col-12');
        echo '<div class="form-group row">
        '.form_label('Type d\'offre', 'an_offre',$labeloffre).'
         <div class="col-sm-10 col-12"> ';
        $option = array();//on déclare le tableau
        

              foreach ($dataoffre as $key => $dia) {
               //var_dump($row);
                  $option[$dia["id"]] = $dia["titre"];// donné du tableaux
              }
          
        $varSelect = array('id' => 'an_offre','class' => 'form-control');
        // liste déroulante des catégories
        echo form_dropdown('an_offre',$option,set_value('an_offre'),$varSelect).'
        '.form_error('an_offre').'
        </div>
        </div>  ';



          //label Référence
        $labelref = array('class' => 'col-sm-2 col-form-label col-12');
        echo '<div class="form-group row">
        '.form_label('Référence', 'an_ref',$labelref).'
        <div class="col-sm-10 col-12"> ';
         //input Référence
        $inputref = array('name' => 'an_ref','id' => 'an_ref','class' => 'form-control','data-maxlength' => '10','placeholder' => 'Référence (10 caractères MAX)','value' => ''.set_value('an_ref').'');
        echo form_input($inputref).'
        <div id="an_refError" class="counter"><span>0</span> caractères (10 max)</div> 
        '.form_error('an_ref').'
        </div>
        </div>'; 
        
        $labeltitre = array('class' => 'col-sm-2 col-form-label col-12');
       echo '<div class="form-group row">'.form_label('Titre', 'an_titre',$labeltitre).'<br>
       <div class="col-sm-10 col-12">';
         $inputtitre = array('name' => 'an_titre','id' => 'an_titre','class' => 'form-control','data-maxlength' => '200','placeholder' => 'Titre (200 caractères MAX)','value' => ''.set_value('an_titre').'');
        echo form_input($inputtitre).'
        <div id="an_titreError" class="counter"><span>0</span> caractères (200 max)</div> 
        '.form_error('an_titre').'
        </div>
        </div> ';    
        

       //label local
        $labellocal = array('class' => 'col-sm-2 col-form-label col-12');
         echo '<div class="form-group row">'.form_label('Emplacement', 'an_local',$labellocal).'
         <div class="col-sm-10 col-12"> ';
          //input an_local
         $inputlocal = array('name' => 'an_local','id' => 'an_local','class' => 'form-control','data-maxlength' => '30','placeholder' => 'Local (30 caractères MAX)','value' => ''.set_value('an_local').'');
        echo form_input($inputlocal).'
        <div id="an_localError" class="counter"><span>0</span> caractères (30 max)</div> 
        '.form_error('an_local').'
        </div>
        </div>  ';



         //label an_prix
         $data = array('class' => 'col-sm-2 col-form-label col-12');
         echo '<div class="form-group row">
         '.form_label('Prix', 'an_prix',$data).'
         <div class="col-sm-10 col-12"> ';
        //input Prix
         $data = array('name' => 'an_prix','id' => 'an_prix','class' => 'form-control','step' => 'any','type' => 'number','value' => ''.set_value('an_prix').'');
        echo form_input($data).'
        '.form_error('an_prix').'
        </div>
        </div>  ';



        //label surface habitable
        $data = array('class' => 'col-sm-2 col-form-label col-12');
         echo '<div class="form-group row">
         '.form_label('Surface habitable', 'an_surf_hab',$data).'
         <div class="col-sm-10 col-12"> ';
        //input surface habitable
         $data = array('name' => 'an_surf_hab','id' => 'an_surf_hab','class' => 'form-control','step' => 'any','type' => 'number','value' => ''.set_value('an_surf_hab').'');
        echo form_input($data).'
        '.form_error('an_surf_hab').'
        </div>
        </div>  ';


        //label surface total
        $data = array('class' => 'col-sm-2 col-form-label col-12');
         echo '<div class="form-group row">
         '.form_label('Surface Total', 'an_surf_tot',$data).'
         <div class="col-sm-10 col-12"> ';
        //input surface total
         $data = array('name' => 'an_surf_tot','id' => 'an_surf_tot','class' => 'form-control','type' => 'number', 'value' => ''.set_value('an_surf_tot').'');
        echo form_input($data).'
        '.form_error('an_surf_tot').'
        </div>
        </div>  ';

        //label an_pieces
        $data = array('class' => 'col-sm-2 col-form-label col-12');
         echo '<div class="form-group row">
         '.form_label('Nombre de piéces', 'an_pieces',$data).'
         <div class="col-sm-10 col-12"> ';
        //input an_pieces
         $data = array('name' => 'an_pieces','id' => 'an_pieces','class' => 'form-control','type' => 'number', 'value' => ''.set_value('an_pieces').'');
        echo form_input($data).'
        '.form_error('an_pieces').'
        </div>
        </div>  ';



        //label Option
        $data = array('class' => 'col-sm-2 col-form-label col-12');
        echo '<div class="form-group row">
        '.form_label('Option', 'cat_id',$data).'
         <div class="col-sm-10 col-12"> ';
        $option = array();//on déclare le tableau
        

              foreach ($optionstab as $key => $cat) {
               //var_dump($row);
                  $option[$cat["opt_id"]] = $cat["opt_libelle"];// donné du tableaux
              }
          
        $variable = array('id' => 'an_opt','class' => 'form-control');
        // liste déroulante des catégories
        echo form_dropdown('an_opt',$option,set_value('an_opt'),$variable).'
        '.form_error('an_opt').'
        </div>
        </div>  ';

        //label an_diagnostic
        $data = array('class' => 'col-sm-2 col-form-label col-12');
        echo '<div class="form-group row">
        '.form_label('Diagnostic', 'an_diagnostic',$data).'
         <div class="col-sm-10 col-12"> ';
        $option = array();//on déclare le tableau
        

              foreach ($datadia as $key => $dia) {
               //var_dump($row);
                  $option[$dia["id"]] = $dia["titre"];// donné du tableaux
              }
          
        $variable = array('id' => 'an_diagnostic','class' => 'form-control');
        // liste déroulante des catégories
        echo form_dropdown('an_diagnostic',$option,set_value('an_diagnostic'),$variable).'
        '.form_error('an_diagnostic').'
        </div>
        </div>  ';

       
        //label catégorie
         $data = array('class' => 'col-sm-2 col-form-label col-12');
        echo '<div class="form-group row">
        '.form_label('Catégorie', 'cat_id',$data).'
         <div class="col-sm-10 col-12"> ';
        $option = array();//on déclare le tableau
        
          if(!empty($categoriestab)) {
              foreach ($categoriestab as $key => $cat) {
               //var_dump($row);
                  $option[$cat["cat_id"]] = $cat["cat_libelle"];// donné du tableaux
              }
          }
        $variable = array('id' => 'an_type','class' => 'form-control');
        // liste déroulante des catégories
        echo form_dropdown('an_type',$option,set_value('an_type'),$variable).'
        '.form_error('an_type').'
        </div>
        </div>  ';

        //label catégorie
        $data = array('class' => 'col-sm-2 col-form-label col-12');
        echo '<div class="form-group row">
        '.form_label('Description produit', 'an_description',$data).'
        <div class="col-sm-10 col-12"> ';
        $data = array('name' => 'an_description','id' => 'an_description','class' => 'form-control','data-maxlength' => '1000','cols' => '30','rows' => '10','placeholder' => 'description (1000 caractères MAX)','value' => ''.set_value('an_description').'');
       echo form_textarea($data).'
        <div id="an_descriptionError" class="counter"><span>0</span> caractères (1000 max)</div> 
        '.form_error('an_description').'
        </div>
        </div>';
        $label = array('class' => 'custom-file-label', 'for'=>'an_photo');
               $inputfile = array('name' => 'an_photo[]','id' => 'an_photo','type' => 'file','class' => 'custom-file-input form-control','multiple'=>'true');
       
       if(!empty($sUploadErrors)){$errorup = $sUploadErrors;}else{ $errorup = "";}
               echo '<div class="card-body">
        <h5 class="card-title">Ajouter des photos</h5>
     
        
               
              <p class="card-text">
               <div class="form-group ">
              
               
              <div class="custom-file">
                '.form_upload($inputfile).'
                '.form_label('Séléctionner des fichiers', 'an_photo',$label).'
                '.$errorup.'
                
              </div>
              </div>

        <div class="form-group">';
        //bouton ajouter
         echo form_submit('', 'Ajouter', 'class="btn btn-bg-perso btn-lg"');
         //bouton pour réinitialiser 
         echo form_reset('', 'Annuler', 'class="btn btn-danger btn-lg"');
        echo ' </div>
        </fieldset>
        <!--balise form fin du formulaire-->';
        echo  form_fieldset_close();
        echo form_close();
          
 ?>
 </article>
        </div>
       
    </div>
    </div>

</div>