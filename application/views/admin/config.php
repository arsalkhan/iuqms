<script>
$(function(){
	$('.submitize').hide();
	$("#form1,#form2").validationEngine();
	$('.formbox').hide();
	$('.cancel').hide();
		
	$('#edit').click(function(){		
		$this = $(this);		
		if( $this.val() == 'Cancel' )
		{
			$this.val('Edit');	
			$('.submitize').toggle();
		}
		else
		{
			$('.cancel').toggle();
			$this.val('Cancel')	;	
			$('.submitize').toggle();

		}
		$('.viewbox').toggle();
		$('.formbox').toggle();
		
	});
	

	
	$('.form').live('submit',function(e){
		e.preventDefault();
		var dataserial = $(this).serializeArray();
		
		$.ajax({
			url: '<?php echo SITE_URL;?>'+'administrator/editConfiguration',
			type: "GET",
			data: dataserial,
			beforeSend: function()
			{
				$('.viewbox').toggle();
				$('.formbox').toggle();
				$a=0;
				$('.value_input').each(function(index, element) {
                    var value = $(this).val();
					$('.value').eq($a).text(value);
					$a++;
                });
			},
			success: function(data) {
				$('#msg').css('display','block');
			}
		});
	});
});
</script> 
<div id="titlediv">
  <div class="clearfix container" id="pattern">
    <div class="row">
      <div class="col_12">
        <h1>Configuration</h1>
      </div>
    </div>
  </div>
</div>
<div id="msg" style="display:none;">
<span class="notification done"> Update Data Sucessfully... </span>
</div>
<div id="listing">
  <div class="container" id="actualbody">
    <div class="row clearfix">
      <div class="col_12">
        <div class="widget clearfix">
          <h2>Users Configration</h2>
          <div class="widget_inside">
            <div class="col_12">
              <div class="clearfix">
                <input id="edit" type="button" value="Edit" class="button blue right">
              </div><br />

              <div>
              
                <form class="form" id="form1" action="<?php echo SITE_URL;?>administrator/editConfiguration" method="post">
                <?php 
				$a = 0;
				$arrayinc = 0;
				$output = '';
				foreach( $configData as $key => $userconfig ):
				
				if($a==0)
				?>
                  <div class="clearfix">
                    <div class="">
                      <label style="color:#0774A7; float:left; display:block; text-align:right"><b style="font-size:20px; display:block; text-align:left; padding-left:30px;"><?php echo $key; ?></b></label>
                    </div>
                  </div>
                  <?php 
					foreach( $userconfig as $key => $val ):	
					$arrayinc++;
					$output = '';
				?>
                  <div class="clearfix viewbox form_height">
                    <div class='user_config center' id='view-<?php echo $val['user_confiq_id']; ?>'> 
                    <table class="table_form" cellpadding="10" cellspacing="5">
                    <tr>
                    <td  width="50%">
                     <span class="type"><?php echo humanize($val['confiq_type']); ?></span> : 
                    </td>
                    <td  width="50%">
                    <span class='value'><?php echo  $val['user_confiq_value']; ?></span>
                    </td>
                    </tr>
                    </table>
                       
                    </div>
                  </div>
                  <div class="clearfix formbox form_height">
				<?php 
                $output = '';
                ?>
                    <div class='user_config center' id='form-<?php echo $val['user_confiq_id']; ?>'> 
                    <table class="table_form" cellpadding="10" cellspacing="5">
                    <tr>
                    <td width="50%" align="right" >
                    <span class="type"><?php echo humanize($val['confiq_type']); ?></span> :
                    </td>
                    <td width="50%">
                    <span class='input'><input type="hidden" id="id<?php echo $val['user_confiq_id'];?>" name="id[]" class="id_input" value="<?php echo $val['user_confiq_id'];?>" />                  
                     <label> <input type="text" id="value<?php echo $val['user_confiq_value'];?>" name="<?php echo $arrayinc; ?>" class="validate[required,custom[number]] value_input" value="<?php echo $val['user_confiq_value'];?>" /></label>
</span>
                    </td>
                    </tr>
                    </table>

                     
                    </div>
                  </div>
                  <?php 
					endforeach;
					$a=0;

					endforeach;
				?>
                  <div class="clearfix grey-highlight submitize">
                    <div class="center no-label">
                      <input type="submit" value="Submit" class="button blue">
                       <a class="cancel" href="<?php echo site_url('administrator/configuration'); ?>"><input type="button" value="cancel"  class="cancel button blue"></a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>setNavigation('main_nav_',30,2,'active');</script> 