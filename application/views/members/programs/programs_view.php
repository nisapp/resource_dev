<?php
// echo '<pre>';
// print_r($client_full_data);
// echo '</pre>';
		$video_data=array();
		foreach($video_query->result() as $singlevideo ){	
			if($singlevideo->type=='next_video'){
				$video_data[$singlevideo->type.'_'.$singlevideo->menu_id]=$singlevideo;
			}else{
				$video_data[$singlevideo->type]=$singlevideo; 
			}
		}
		
		// echo '<pre>';
		// print_r($video_data);
		// echo '</pre>';
		
		
	if(isset($status) && $status=="gvo_success"){?>
			<div class="infomessage"><?php echo "Gvo user name set successfully"?> </div>
<?php }else if (isset($status) && $status=="pure_success"){?>
			<div class="infomessage"><?php echo "Pure leverage user name set successfully"?> </div>
<?php }else if (isset($status) && $status=="emp_success"){?>
			<div class="infomessage"><?php echo "Empower network user name set successfully"?> </div>
            
<?php }

	if(isset($stylelist)):
            foreach ($stylelist as $style):?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().$style; ?>">
        <?php endforeach;
        endif; 
        if(isset($scriptlist)): 
            foreach ($scriptlist as $script):?>
        <script src="<?php echo base_url().$script; ?>" type="text/javascript"></script>
        <?php endforeach;
        endif; ?>

<script>
			
	function set_my_video(obj,id){ 
		$(obj).find('span.number').css({
											'color':'#000',
											'background-color':'#ffd001',
											'top':'-2px',
										});
		$(".idArea").hide();
		$('#myform_'+id).show();
		var baseurl = $("#baseurl").val();
		$('.video_tabs').removeClass('active');
		$(obj).find('li').addClass('active');
		var previewfile = document.getElementById("txtVideo_"+id).value;
		// alert(previewfile);
		var video_title = document.getElementById("txtTitle_"+id).value;
		$("div.video_title").text(video_title);
		
		var regExp = /youtube\.com/;
		var match = previewfile.match(regExp);
		if(match=='youtube.com'){
			var previewfile = previewfile.substr(previewfile.length - 11);
			$('#videopreview').html();
			$('#videopreview').html('<iframe width="500" height="300" src="http://www.youtube.com/embed/'+previewfile+'?modestbranding=1&autoplay=1&rel=0&showsearch=0&controls=0" frameborder="0" class="you_tube"></iframe>');
			// alert("yyy");
		}else{
			// alert("nnn");
			jwplayer("videopreview").setup({
				file: baseurl+'uploads/videos/'+previewfile,
				height: 420,
				width: 700,
				image: baseurl+'uploads/images/preview.jpg',
			}).play(); 
		}
	} 
	
	$(document).ready(function() { 
		var baseurl = $("#baseurl").val();
		var previewfile = $("#txtWelcome").val();
		var video_title = $("#txtWelcomeTitle").val();
		// alert(previewfile);
		$("div.video_title").text(video_title);
		var regExp = /youtube\.com/;
		var match = previewfile.match(regExp);
		if(match=='youtube.com'){
			previewfile = previewfile.substr(previewfile.length - 11);
			$('#videopreview').html();
			$('#videopreview').html('<iframe width="500" height="300" src="http://www.youtube.com/embed/'+previewfile+'?modestbranding=1&autoplay=1&rel=0&showsearch=0&controls=0" frameborder="0" class="you_tube"></iframe>');
		}else{
			jwplayer("videopreview").setup({
				file: baseurl+'uploads/videos/'+previewfile,
				height: 420,
				width: 700,
				image: baseurl+'uploads/images/preview.jpg',
			}).play();
		}
		
	})
	
	jQuery(document).on('click', '.jwplayer button', function(event) { event.preventDefault(); })
	
	function save_id(prog_id){
	   var base_url=$("#baseurl").val();
	   var aff_id=$("#txtdata_"+prog_id).val();
	   // alert(base_url);
		var dataString = 'prog_id=' +prog_id+ '&aff_id='+aff_id;  
		//alert (dataString);return false;  
		/*if(!idExists(prog_id)){
                    alert("Link with your affiliate id does not exists. \n Please check it again.")
                    return;
                }//*/
                
		$.ajax({  
		  type: "POST",  
		  url: base_url+"members/programs/save/"+prog_id,  
		  data: dataString,  
		  success: function(msg) { 
                      alert('Your Affiliate ID Is Saved!');
			$("div#response").html('<div class="infomessage">Username save successfully</div>');
			show_message_div();
		  }  
		});  
		
	}
        function idExists(id){
        var base_url=$("#baseurl").val();
            var link = $("#link_"+id).children( ":first" ).attr('href');//.attr("href");//
            var aff_id=$("#txtdata_"+id).val();
            var defid=$("#default_id_"+id).val();
            var new_link=link.replace(defid,aff_id);
            var urlexists=false;
            $.ajax({
                type:"POST",
                url: base_url+"members/programs/checkurl",
                data:'url='+new_link,
                success: function(data){
                    if(data!=='1'){
                        urlexists=false;
                        //alert("page not found.");
                    }
                    else{
                        urlexists=true;
                        //alert("page found.");
                    }
                    
                }
            });
            return urlexists;
            //alert(new_link);
        }
function UrlExists(url) {
  var http = new XMLHttpRequest();
  http.open('HEAD', url, false);
  http.send();
  return http.status!=404;
}        

function show_message_div(){
	setTimeout(function() { 
		$('.infomessage').fadeOut('fast');
		} , 1750);
}
	

	
</script>


<form name="frmVideo" method="post" >		
<div class="video_title">Welcome User</div>	

	<div class="webleft">
   
			<div class="leftnav2"> 
				<ul>
				<?php 
					$count=0;
					foreach($query->result() as $programs )
					{ 
				?>
					
					<a href="#"  onclick="set_my_video(this,<?php echo $programs->id;?>);">
						<div class="tab_title1">
							<span class="number"><?php echo ++$count; ?></span>
						</div>
						<div class="spanarrow">
						</div>
						<li class="video_tabs">
							<div class="<?php  if(strlen($programs->leftnav_title)<=16){ echo 'tab_title'; }else{ echo 'tab_title2'; } ?>">
							<?php echo $programs->leftnav_title;?></div>
						</li>
					</a>
							
				<input type="hidden" id="txtVideo_<?php echo $programs->id;?>"  name="txtVideo_<?php echo $programs->id;?>" value="<?php echo $programs->video_name_in_folder; ?>">
				<input type="hidden" id="txtTitle_<?php echo $programs->id;?>"  name="txtTitle_<?php echo $programs->id;?>" value="<?php echo $programs->video_title; ?>">
		
					
				<?php 	
					/****====== Code of custom form =====**/
				$html['link_'.$programs->id]="
				
						<div class='idArea' id='myform_{$programs->id}' name='myform_{$programs->id}' >
							<form method='post' action='members/programs/save/{$programs->id}'>
									<div class='affiliateLink' id='link_{$programs->id}' >
                                                                            <a target='_blank' href='{$programs->signup_link}'>Click Here To Join {$programs->program_title}</a>
                                                                            <input type='hidden' id='default_id_{$programs->id}' value='{$programs->default_id}' />
                                                                                
									</div>
									<br />
{$programs->program_title}

									<fieldset>
										<TABLE class='sign_up_acc'>

											<tr>
											<TD class='id_image'>
												<img src='".base_url()."uploads/logo/{$programs->logo}' style='height: 100px;margin-top:-21px;width:134px;' class='img_signup' />
											</TD>
												<TD class='id_control'>
														<input  required  value='".$programs->user_name."'  class='biginput' type='text' placeholder='Enter {$programs->program_title} Username' name='txtdata_{$programs->id}'  id='txtdata_{$programs->id}' >
													<input type='button' value='Save {$programs->program_title} Username'  name='btnGvo' class='claimbtn2' onclick='save_id({$programs->id})'>
												</TD>
											</TR>
										</TABLE>
									</fieldset>
							</form>
						</div>";
					/****====== end of Code of custom form =====**/
				
				} ?>
					<!-- Next Tab Li code start here -->
					<?php if($video_data['next_video_'.$tab_menu_id]->is_show=='Y'){ ?>
						<a href="#" class="video_tabs" onclick="set_my_video(this,'<?php echo $video_data['next_video_'.$tab_menu_id]->type; ?>');">
                        	
								<div class="tab_title1">
									<span class="number"><?php echo ++$count; ?></span>
								</div>
								<div class="spanarrow"></div>
							<li class="video_tabs">
								<div class="<?php  if(strlen($video_data['next_video_'.$tab_menu_id]->tab_title)<=16){ echo 'tab_title'; }else{ echo 'tab_title2'; } ?>"><?php echo $video_data['next_video_'.$tab_menu_id]->tab_title; ?></div>
							</li>
						</a>
					
					<!-- End of Next Tab Li code start here -->
					<?php } ?>
				</ul>
			</div>
	</div>
	
	

	<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
	<div class="webright">
		<div class="video_preveiw" style="">
					<script type="text/javascript">jwplayer.key="oIXlz+hRP0qSv+XIbJSMMpcuNxyeLbTpKF6hmA==";</script>
					<div id="videopreview"></div>
		</div>
		</div>
		



</div>

<!-- /wrapperMain -->
<div id="msgarea">
<div id="msgarea-container">
<?php 
		if(isset($html)){
			foreach($html as $forms )
			{
				echo $forms;
			}
		}
		// echo '<pre>';
			// print_r($html);
		// echo '</pre>';
		
		?>
        
		<!-- next program button -->
		
		<!-- end of next program button -->
	<div class="idArea" id="myform_<?php echo $video_data['next_video_'.$tab_menu_id]->type; ?>" name="myform_<?php echo $video_data['next_video_'.$tab_menu_id]->type; ?>" >
				 <a href="<?php echo $video_data['next_video_'.$tab_menu_id]->custom_link; ?>" ><input type="button" class="claimbtn" value="Click Here To Go To The Next Step" style="cursor:pointer;" /></a>
	</div>
	<input type="hidden" id="txtVideo_<?php echo $video_data['next_video_'.$tab_menu_id]->type; ?>"  name="txtVideo_<?php echo $video_data['next_video_'.$tab_menu_id]->type; ?>" value="<?php echo $video_data['next_video_'.$tab_menu_id]->file_name_in_folder; ?>">
	<input type="hidden" id="txtTitle_<?php echo $video_data['next_video_'.$tab_menu_id]->type; ?>"  name="txtTitle_<?php echo $video_data['next_video_'.$tab_menu_id]->type; ?>" value="<?php echo $video_data['next_video_'.$tab_menu_id]->file_name; ?>">
	
	
	<input type="hidden" id="txtWelcome"  name="txtWelcome" value="<?php echo $video_data['welcome_video']->file_name_in_folder; ?>">
	<input type="hidden" id="txtWelcomeTitle"  name="txtWelcomeTitle" value="<?php echo $video_data['welcome_video']->file_name; ?>">
	
	
</form>
</div></div>
