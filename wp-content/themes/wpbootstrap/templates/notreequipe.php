</div>
<div id="notreequipe">

	<div class="sub-menu">
		<div class="container">
			<ul class="nav navbar-nav">  
			  <li class=""><a href="javascript: void(0);" onclick="javascript: $('html,body').animate({scrollTop: $('#notre_personnel').offset().top - 50},'fast');">Notre personnel</a></li>  
			  <li><a href="javascript: void(0);" onclick="javascript: $('html,body').animate({scrollTop: $('#les_membres_du').offset().top - 50},'fast');">Les membres du CA</a></li>  
			</ul>
		</div>
	</div>

	
	
    <div class="container"> 
		
        <div>&nbsp;</div>
        <div id="notre_personnel">&nbsp;</div>
		<div class="center titlered">&bull; NOTRE PERSONNEL &bull;</div>
        
		<div class="row padtopbtm25 notreequipecontacts notreequipewimage">
        
        	<? $post = get_post_from_category(33, 100, 'meta_value_num', 'asc', 'order'); ?>
			<? foreach($post as $v){ ?>
        	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 notreequipecol">
            	
                <div class="notreequipe-img">
                	<img src="<?=$v->featured_image[0];?>" />
                </div>
                <div class="notreequipe-name">
					<?=$v->post_title?>&nbsp;
                </div>
                <div class="notreequipe-title">
					<?=$v->meta['Title'][0]?>&nbsp;
                </div>
                <div class="notreequipe-subtitle">
					<?=$v->meta['Post'][0]?>&nbsp;
                </div>
                <div class="notreequipe-email">
					<a href="mailto:<?=$v->meta['Email'][0]?>?Subject="><?=$v->meta['Email'][0]?></a>&nbsp;
                </div>
                                                
            </div>
            <? } ?>
            

            
            
            
            
        
        </div>
    </div>

<div class="bglightwhite padtopbtm100" id="les_membres_du">
    <div class="container"> 

		<div class="center titlered">&bull; MEMBRES DU C.A. &bull;</div>
	</div>	
    <div class="les_membres_du_bg">
    <div class="container"> 
        <div class="row notreequipecontacts notreequipecontactsnoimage">
        
        	<? $post = get_post_from_category(34, 100, 'meta_value_num', 'asc', 'order'); ?>        
			<? foreach($post as $v){ ?>
        	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 notreequipecol">
            	
                
                <div class="notreequipe-name">
					<?=$v->post_title?>&nbsp;
                </div>
                <div class="notreequipe-title">
					<?=$v->meta['Title'][0]?>&nbsp;
                </div>
                <div class="notreequipe-subtitle">
					<?=$v->meta['Post'][0]?>&nbsp;
                </div>
                <div class="notreequipe-email">
					<a href="mailto:<?=$v->meta['Email'][0]?>"><?=$v->meta['Email'][0]?></a>&nbsp;
                </div>
                                                
            </div>
            <? } ?>
            

		</div>
    </div>
    </div>
</div>


</div> <!-- end notreequipe -->
<div>