			</div>



            <footer>

				



                <? if(is_home() ||  is_front_page()){ ?>

                

                <div class="bgcreamdark padtopbtm25">

                    <div class="container">


                        <div class="relative">
			    <!-- Orig code: 10-21 gzd
			    <a href="mailto:reservation@lepiolet.com,restaurant@lepiolet.com?Subject=Reserver%20au%20restaurant">
			    <div class="circle120">R&Eacute;SERVER</div></a>
			    -->
			    <a href="#" data-toggle="modal" data-target="#myModal">
			    <div class="circle120">R&Eacute;SERVER</div></a>
			</div>                        

                        <div class="center titlepartenaires">NOS PR&Eacute;CIEUX PARTENAIRES</div>

                        

                        <div class="clear">&nbsp;</div>

                        <div class="clear">&nbsp;</div>

                                                

                        <div class="partners">

                        	<div class="row">

							

								<? $ourPartners = get_our_partners(); 

									foreach($ourPartners as $partner) {

									$photo = get_field('partners_logo', $partner->ID);

									$item = get_post($partner->ID);		

								?>

									<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 partnerslogo">

										<? if (!empty($item->partners_link)) { ?>

											<a target="_blank" href="<?php echo $item->partners_link;?>"><img src="<?php echo $photo["url"];?>" /></a>

										<? } else { ?>

											<img src="<?php echo $photo["url"];?>" />

										<? } ?>

									</div>							

								<? } ?>

                            </div>

                        </div>



                        <div class="clear">&nbsp;</div>

                        <div class="clear">&nbsp;</div>

                    </div>

                </div>

                

                <? } else {?>

					<div class="clearfix"></div>

                <? }

				

				// news/surveiller page detection

				$news_category = get_the_category();

				$active_surveiller = ( isset($news_category) && isset($news_category[1]) && $news_category[1]->slug == "a-surveiller" );

				 ?>

                <div class="padtop25 footer-wrap footer-<?= the_ID()?> <?= (the_slug()=="contactez-nous") ? "visible-desktop" : "";?> 

				<?= $active_surveiller ? "footer-128" : "";?>">

                    <div class="container">

                    	<div class="relative">

                        	<div class="btn-faire-un-don">

                            	<a href="https://www.canadahelps.org/fr/organismesdebienfaisance/le-piolet/" target="_blank" class="btnblue btnblue-footer-mid"> FAIRE UN DON  </a>

                            </div>

                        </div>

                        <div class="relative center italic footertext">

                            <a href="/contactez-nous/" class="btmcontact">Contactez-nous</a><br />

                            103 Rue Racine, Québec, Québec<br />

                            418 842-7462

                        </div>

                        <div class="clear"></div>

                        <div class="circle175-wrapper relative">
<!-- Orig code: 10-21 gzd
							<a href="mailto:reservation@lepiolet.com,restaurant@lepiolet.com?Subject=Reserver%20au%20restaurant"><div class="circle175">R&#201;SERVER<br />AU<br />RESTAURANT</div></a>
-->
			    <a href="#" data-toggle="modal" data-target="#myModal">
				<div class="circle175">R&#201;SERVER<br />AU<br />RESTAURANT</div>
			    </a>

			</div>

                    </div>

                </div>

            </footer>

		</div>

		

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

		<!-- <script src="//code.jquery.com/jquery.js"></script> -->

		<!--<script src="<?php bloginfo('template_url');?>/lib/bootstrap/js/jquery.js"></script>-->

		<script>

        jQuery(function(){

            // bind change event to select.

            jQuery('#drop-nav').bind('change', function () {

            var url = jQuery(this).val(); // get selected value.

            if (url) { // require a URL.

            window.location = url; // redirect.

            }

                return false;

            });

			

			jQuery('#home_logo').hover(function(){$(this).attr('src', '<? bloginfo('template_url') ?>/images/logo_h.png')}, function(){$(this).attr('src', '<? bloginfo('template_url') ?>/images/logo.png')});

			jQuery('#sub_logo').hover(function(){$(this).attr('src', '<? bloginfo('template_url') ?>/images/logo2_h.png')}, function(){$(this).attr('src', '<? bloginfo('template_url') ?>/images/logo2.png')});

			jQuery('.custom_iconhome a img').hover(function(){$(this).attr('src', '<? bloginfo('template_url') ?>/images/icon-home_hover.png')}, function(){$(this).attr('src', '<? bloginfo('template_url') ?>/images/icon-home.png')});

		

			$('<img />').attr('src','<? bloginfo('template_url') ?>/images/logo_h.png').appendTo('body').css('display','none');

			$('<img />').attr('src','<? bloginfo('template_url') ?>/images/logo2_h.png').appendTo('body').css('display','none');

			$('<img />').attr('src','<? bloginfo('template_url') ?>/images/icon-home_hover.png').appendTo('body').css('display','none');

			<? if (is_front_page()) { ?>$
					$(".home-static-hover").mouseout(function(){
						$(this).attr("src", "<?php bloginfo('template_url');?>/images/icon-home_hover.png");
					});
				<? } ?>

        });

        </script>
		
		

<!-- Modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-body popupform">

        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Fermer &times;</button>

        <div class="clear"></div>

        <div class="popupformtitle">&bull; BANQUETS &bull;</div>

        <div class="popupformsubtitle">Formulaire de demande</div>





    	<form name="popupform" id="popupform" method="post">

        

        <br />

        <div class="popupformtous">* Tous les champs sont obligatoires.</div>

        <br />

        

        <label>Nom</label>

        <input type="text" name="nom" id="nom" />

        

        <label>Prénom</label>

        <input type="text" name="prenom" id="prenom" />



        <label>Courriel</label>

        <input type="text" name="courriel" id="courriel" />

        

        <label>Numéro de téléphone</label>

        <input type="text" name="telephone" id="telephone" placeholder="ex.: 418-546-6666" />

        <label>Date</label>

        <input type="text" name="date" id="date" placeholder="ex.: 15 octobre 2014" />

        <label>Heure</label>

        <input type="text" name="heure" id="heure" placeholder="ex.: 13:30" />
	
	<label>Nombre de personnes</label>

        <input type="text" name="nombre_de_personnes" id="nombre_de_personnes" />
	
        <label>Informations supplémentaires</label>

        <textarea name="vos_besoins" id="vos_besoins" placeholder="Décrivez-nous en quelques mots vos besoins."></textarea>

        

        <input type="button" id="sbmt" value="Envoyer la demande" />

        <a href="javascript:;" class="popuoformclear annuler">Annuler</a>

        </form>



      </div>

      

    </div>

  </div>

</div>

<script>

$(document).ready(function(){

	$('.popuoformclear').click(function(){

		$('#nom').val('');

		$('#prenom').val('');

		$('#courriel').val('');

		$('#telephone').val('');

		$('#vos_besoins').val('');
		
		$('#date').val('');
		
		$('#heure').val('');
		
		$('#nombre_de_personnes').val('');

		$('#nom').removeClass('error');

		$('#prenom').removeClass('error');

		$('#courriel').removeClass('error');

		$('#telephone').removeClass('error');

		$('#vos_besoins').removeClass('error');

		$('#date').removeClass('error');
		
		$('#heure').removeClass('error');
		
		$('#nombre_de_personnes').removeClass('error');
		
	});

	$('#sbmt').click(function(){

		$err = false;

		

		if($('#nom').val() == ''){

			$('#nom').addClass('error');

			$err = true;

		}else{

			$('#nom').removeClass('error');

		}

		if($('#prenom').val() == ''){

			$('#prenom').addClass('error');

			$err = true;

		}else{

			$('#prenom').removeClass('error');

		}

		if($('#courriel').val() == ''){

			$('#courriel').addClass('error');

			$err = true;

		}else{

			$('#courriel').removeClass('error');

		}

		if($('#telephone').val() == ''){

			$('#telephone').addClass('error');

			$err = true;

		}else{

			$('#telephone').removeClass('error');

		}

		if($('#date').val() == ''){

			$('#date').addClass('error');

			$err = true;

		}else{

			$('#date').removeClass('error');

		}
		
		if($('#heure').val() == ''){

			$('#heure').addClass('error');

			$err = true;

		}else{

			$('#heure').removeClass('error');

		}
		
		if($('#nombre_de_personnes').val() == ''){

			$('#nombre_de_personnes').addClass('error');

			$err = true;

		}else{

			$('#nombre_de_personnes').removeClass('error');

		}
		
		if($('#vos_besoins').val() == ''){

			$('#vos_besoins').addClass('error');

			$err = true;

		}else{

			$('#vos_besoins').removeClass('error');

		}

				

		if($err == true){

			return false;

			$('.popupformtous').addClass('error');

		}else{

			$.ajax({

				url: "/submitformpopup",

				context: document.body,

				type: 'POST',

				data: $("#popupform").serialize(),

			}).done(function(msg) {

				console.log(msg);

			});

			$("#popupform").html('<div class="success">Nous allons communiquer avec vous d\'ici peu</div><button type="button" class="closeok" data-dismiss="modal" aria-hidden="true">OK</button>');

			$('.popupformsubtitle').html('Votre demande a bel et bien été envoyée.');

			$('.popupformtitle').html('Merci');

			
			return false;

		}

		



	});

});

</script>		
		
		
		
		

		<!-- Include all compiled plugins (below), or include individual files as needed -->

		<!-- ?php wp_footer(); ? -->

	</body>

</html>