<!-- application/views/detail.php -->
<div class="container">
    <div class="row">
<div class="col-12">   
<article>

  




 <legend> Formulaire de modification de <?php
 //var_dump($infoprod);
 if(!empty($infoprod)){echo $infoprod["an_titre"];?> </legend>
     <?php 
     
    //  balise form début du formulaire
       echo form_open_multipart('','name="modification_produit" id="modification_produit"'); ?>
          <fieldset>

          <?php    
          //label Référence
        $data = array('class' => 'col-sm-2 col-form-label col-12');
        echo '<div class="form-group row">'.form_label('Référence', 'an_ref',$data).'
        <div class="col-sm-10 col-12"> ';
         //input Référence
        $data = array('name' => 'an_ref','id' => 'an_ref','class' => 'form-control','data-maxlength' => '10','placeholder' => 'Référence (10 caractères MAX)','value' => ''.set_value('an_ref',$infoprod["an_ref"]).'');
        echo form_input($data).'
        <div id="an_refError" class="counter"><span>0</span> caractères (10 max)</div> 
        '.form_error('an_ref').'
        </div>
        </div>'; 
        
        $data = array('class' => 'col-sm-2 col-form-label col-12');
       echo '<div class="form-group row">'.form_label('Titre', 'an_titre',$data).'<br>
       <div class="col-sm-10 col-12">';
         $data = array('name' => 'an_titre','id' => 'an_titre','class' => 'form-control','data-maxlength' => '200','placeholder' => 'Titre (200 caractères MAX)','value' => ''.set_value('an_titre',$infoprod["an_titre"]).'');
        echo form_input($data).'
        <div id="pro_libelleError" class="counter"><span>0</span> caractères (200 max)</div> 
        '.form_error('an_titre').'
        </div>
        </div> ';    
        

       //label couleur
        $data = array('class' => 'col-sm-2 col-form-label col-12');
         echo '<div class="form-group row">'.form_label('Couleur', 'an_couleur',$data).'
         <div class="col-sm-10 col-12"> ';
          //input pro couleur
         $data = array('name' => 'an_couleur','id' => 'an_couleur','class' => 'form-control','data-maxlength' => '30','placeholder' => 'Couleur (30 caractères MAX)','value' => ''.set_value('an_couleur',$infoprod["an_couleur"]).'');
        echo form_input($data).'
        <div id="an_couleurError" class="counter"><span>0</span> caractères (30 max)</div> 
        '.form_error('an_couleur').'
        </div>
        </div>  ';



        //label Image

        $data = array('class' => 'col-sm-2 col-form-label col-12');

         echo '<div class="form-group row">
         '.form_label('Image', 'an_photo',$data).'
         <div class="col-sm-10 col-12"> ';
        //input pro Image
         $data = array('name' => 'an_photo','id' => 'an_photo','class' => 'form-control-file','type' => 'file','value' => ''.set_value('an_photo',$infoprod["an_id"].'.'.$infoprod["an_photo"]).'');
        // echo form_upload($data).'';
        echo '<img  class="img-fluid" width="100" src="'.base_url("assets/images/".$infoprod["an_id"].".".$infoprod["an_photo"]).'" alt="'.$infoprod["an_libelle"].'"><br>
        <a class="btn btn-info btn-lg" onclick="add_fields();" >Modifier</a>
        <div id="img" > </div>';
        echo form_error('an_photo').'';
        if(!empty($sUploadErrors)){echo $sUploadErrors;}
       echo ' </div>
        </div>  ';



        //label Prix
        $data = array('class' => 'col-sm-2 col-form-label col-12');
         echo '<div class="form-group row">
         '.form_label('Prix', 'an_prix',$data).'
         <div class="col-sm-10 col-12"> ';
        //input Prix
         $data = array('name' => 'an_prix','id' => 'an_prix','class' => 'form-control','step' => 'any','type' => 'number','value' => ''.set_value('an_prix',$infoprod["an_prix"]).'');
        echo form_input($data).'
        '.form_error('an_prix').'
        </div>
        </div>  ';


        //label stock
        $data = array('class' => 'col-sm-2 col-form-label col-12');
         echo '<div class="form-group row">
         '.form_label('Stock', 'an_stock',$data).'
         <div class="col-sm-10 col-12"> ';
        //input stock
         $data = array('name' => 'an_stock','id' => 'an_stock','class' => 'form-control','type' => 'number', 'value' => ''.set_value('an_stock',$infoprod["an_stock"]).'');
        echo form_input($data).'
        '.form_error('an_stock').'
        </div>
        </div>  ';


        //label bloqué
        $data = array('class' => 'col-sm-2 col-form-label col-12');
        if($infoprod->an_bloque==1){$bloque = "disabled"; $checked = TRUE; }else{$bloque = "disabled";$checked = FALSE;}
        echo '<div class="form-group row">'.form_label('Produit bloqué', 'an_bloque',$data).'
        <div class="col-sm-10 col-12">
        <div class="checkbox '.$bloque.'">';
        //input pro bloqué
         $data = array('name' => 'an_bloque','id' => 'an_bloque','class' => 'form-control','data-toggle' => 'toggle','data-onstyle'=>'danger','data-offstyle'=>'success', 'data-on' => 'Oui', 'data-off' => 'Non', 'value' => ''.set_value('an_bloque',$infoprod["an_bloque"]).'');
         echo form_checkbox($data,'',$checked).'
         </div>
          </div>
              </div> ';
        
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
        $variable = array('id' => 'cat_id','class' => 'form-control');
        // liste déroulante des catégories
        echo form_dropdown('an_type',$option,$infoprod['an_type'],$variable).'
        '.form_error('an_type').'
        </div>
        </div>  ';

        //label catégorie
        $data = array('class' => 'col-sm-2 col-form-label col-12');
        echo '<div class="form-group row">
        '.form_label('Description produit', 'an_description',$data).'
        <div class="col-sm-10 col-12"> ';
        $data = array('name' => 'an_description','id' => 'an_description','class' => 'form-control','data-maxlength' => '1000','cols' => '30','rows' => '10','placeholder' => 'description (1000 caractères MAX)','value' => ''.set_value('an_description',$infoprod["an_description"]).'');
       echo form_textarea($data).'
        <div id="an_descriptionError" class="counter"><span>0</span> caractères (1000 max)</div> 
        '.form_error('an_description').'
        </div>
        </div>


        <div class="form-group">';
        //bouton ajouter
         echo form_submit('', 'Modifier', 'class="btn btn-dark btn-lg"');
         //bouton pour réinitialiser 
         echo form_reset('', 'Annuler', 'class="btn btn-danger btn-lg"');
        echo ' </div>
        </fieldset>
        <!--balise form fin du formulaire-->';
        echo  form_fieldset_close();
          }
 ?>
 </article>
        </div>
    </div>
</div>