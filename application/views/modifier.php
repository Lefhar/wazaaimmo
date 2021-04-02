<!-- application/views/detail.php -->
<div class="container-fluid">
    <div class="row">
<div class="col-lg-8">   
<article>

  




 <legend> Formulaire de modification de <?php

 if(!empty($infoprod)){echo $infoprod["an_titre"];?> </legend>
     <?php 
     
    //  balise form début du formulaire
       echo form_open('','name="modification_produit" id="modification_produit"'); ?>
          <fieldset>

          <?php    
          //label Référence
        $data = array('class' => 'col-sm-2 col-form-label col-12');
        echo '<div class="form-group row">'.form_label('Référence', 'an_ref',$data).'
        <div class="col-sm-10 col-12"> ';
         //input Référence
        $data = array('name' => 'an_ref','id' => 'an_ref','class' => 'form-control','data-maxlength' => '10','placeholder' => 'Référence (10 caractères MAX)','value' => ''.set_value('an_ref',$infoprod["an_ref"], false).'');
        echo form_input($data).'
        <div id="an_refError" class="counter"><span>0</span> caractères (10 max)</div> 
        '.form_error('an_ref').'
        </div>
        </div>'; 
        
        $data = array('class' => 'col-sm-2 col-form-label col-12');
       echo '<div class="form-group row">'.form_label('Titre', 'an_titre',$data).'<br>
       <div class="col-sm-10 col-12">';
         $data = array('name' => 'an_titre','id' => 'an_titre','class' => 'form-control','data-maxlength' => '200','placeholder' => 'Titre (200 caractères MAX)','value' => ''.set_value('an_titre',$infoprod["an_titre"], false).'');
        echo form_input($data).'
        <div id="an_titreError" class="counter"><span>0</span> caractères (200 max)</div> 
        '.form_error('an_titre').'
        </div>
        </div> ';    
        

       //label local
        $data = array('class' => 'col-sm-2 col-form-label col-12');
         echo '<div class="form-group row">'.form_label('Emplacement', 'an_local',$data).'
         <div class="col-sm-10 col-12"> ';
          //input an_local
         $data = array('name' => 'an_local','id' => 'an_local','class' => 'form-control','data-maxlength' => '30','placeholder' => 'Local (30 caractères MAX)','value' => ''.set_value('an_local',$infoprod["an_local"], false).'');
        echo form_input($data).'
        <div id="an_localError" class="counter"><span>0</span> caractères (30 max)</div> 
        '.form_error('an_local').'
        </div>
        </div>  ';

        //label an_pieces
        $data = array('class' => 'col-sm-2 col-form-label col-12');
         echo '<div class="form-group row">
         '.form_label('Nombre de piéces', 'an_pieces',$data).'
         <div class="col-sm-10 col-12"> ';
        //input an_pieces
         $data = array('name' => 'an_pieces','id' => 'an_pieces','class' => 'form-control','type' => 'number', 'value' => ''.set_value('an_surf_tot',$infoprod["an_pieces"]).'');
        echo form_input($data).'
        '.form_error('an_pieces').'
        </div>
        </div>  ';

 



        //label surface habitable
        $data = array('class' => 'col-sm-2 col-form-label col-12');
         echo '<div class="form-group row">
         '.form_label('Surface habitable', 'an_surf_hab',$data).'
         <div class="col-sm-10 col-12"> ';
        //input Prix
         $data = array('name' => 'an_surf_hab','id' => 'an_surf_hab','class' => 'form-control','step' => 'any','type' => 'number','value' => ''.set_value('an_surf_hab',$infoprod["an_surf_hab"]).'');
        echo form_input($data).'
        '.form_error('an_surf_hab').'
        </div>
        </div>  ';

        //label an_prix
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


        //label surface total
        $data = array('class' => 'col-sm-2 col-form-label col-12');
         echo '<div class="form-group row">
         '.form_label('Surface Total', 'an_surf_tot',$data).'
         <div class="col-sm-10 col-12"> ';
        //input stock
         $data = array('name' => 'an_surf_tot','id' => 'an_surf_tot','class' => 'form-control','type' => 'number', 'value' => ''.set_value('an_surf_tot',$infoprod["an_surf_tot"]).'');
        echo form_input($data).'
        '.form_error('an_surf_tot').'
        </div>
        </div>  ';

        //label Option
        $labelopt = array('class' => 'col-sm-2 col-form-label col-12');
        echo '<div class="form-group row">
        '.form_label('Option', 'an_opt',$labelopt).'
         <div class="col-sm-10 col-12"> ';
        $option = array();//on déclare le tableau
        

              foreach ($optionstab as $key => $cat) {
               //var_dump($row);
                  $option[$cat["opt_id"]] = $cat["opt_libelle"];// donné du tableaux
              }
          
        $variable = array('id' => 'cat_id','class' => 'form-control');
        // liste déroulante des catégories
        echo form_dropdown('an_opt',$option,$infoprod['an_opt'],$variable).'
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
            // liste déroulante diagnostic
            echo form_dropdown('an_diagnostic',$option,$infoprod['an_diagnostic'],$variable).'
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
        $variable = array('id' => 'cat_id','class' => 'form-control');
        // liste déroulante des catégories
        echo form_dropdown('an_type',$option,$infoprod['an_type'],$variable).'
        '.form_error('an_type').'
        </div>
        </div>  ';



        //label Description
        $data = array('class' => 'col-sm-2 col-form-label col-12');
        echo '<div class="form-group row">
        '.form_label('Description produit', 'an_description',$data).'
        <div class="col-sm-10 col-12"> ';
        $data = array('name' => 'an_description','id' => 'an_description','class' => 'form-control','data-maxlength' => '1000','cols' => '30','rows' => '10','placeholder' => 'description (1000 caractères MAX)','value' => ''.set_value('an_description',$infoprod["an_description"], false).'');
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
        echo form_close();
          }
 ?>
 </article>
        </div>
        <div class="col-lg-4">
    <?php 

echo '<div class="card m-4" >
'.form_open_multipart('/photos/upload','name="modification_photo" id="modification_photo"').'
<div class="card-body">
<h5 class="card-title">Ajouter de nouvelle photo</h5>';
       //label Image

       $label = array('class' => 'custom-file-label', 'for'=>'an_photo');
       $inputfile = array('name' => 'an_photo[]','id' => 'an_photo','type' => 'file','class' => 'custom-file-input form-control','multiple'=>'true');
       echo '<p class="card-text">
       <div class="form-group ">
      
       ';

      echo '
      <div class="custom-file">
        '.form_upload($inputfile).'
        '.form_label('Séléctionner des fichiers', 'an_photo',$label).'
        '.form_error('an_photo').'
        
      </div>
    ';



   
      if(!empty($sUploadErrors)){echo $sUploadErrors;}
     echo '
      </div>  

      <div class="form-group">';
      $data = array('name' => 'pic_an_id','id' => 'pic_an_id','type' => 'hidden','value' => $infoprod["an_id"]);
      echo form_input($data);
      //bouton ajouter
       echo form_submit('', 'Ajouter', 'class="btn btn-dark btn-lg"');
       //bouton pour réinitialiser 
       echo form_reset('', 'Annuler', 'class="btn btn-danger btn-lg"');
      echo ' </div></p>';
      echo form_close().'
            </div>
          </div>
      '; 
                   foreach($infoprod["photo"] as $img){
                 

                    $pic_an_id = array('name' => 'pic_id','id' => 'pic_id','type' => 'hidden','value' => $img->pic_id);
                    echo '<div class="card m-4" >
                    <div class="card-body">
                    <img  class="w-100 p-1"  src="'.base_url('assets/images/annonce_'.$img->pic_an_id.'/'.$img->pic_an_id.'-'.$img->pic_id.'.'.$img->pic_ext).'" alt="'.$infoprod["an_titre"].'">
                    <p class="card-text">
                    '.form_open('/photos/delete','name="supprimer_photo" id="supprimer_photo"').'
                    '.form_input($pic_an_id).'
                
                    '.form_submit('', 'Supprimer', 'class="btn btn-danger btn-lg"').'
                   </p>
                      
                   '.form_close().'
                    </div>
                    </div>';
                  }
     //  balise form début du formulaire

       
              
               
    ?>
</div>
    </div>
    </div>

</div>