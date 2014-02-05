function showSpinner(spinnerId) {
	$('#'+spinnerId).css('display','block'); $('#'+spinnerId).css('visibility','visible'); $('#'+spinnerId).show();	
}
function hideSpinner(spinnerId) {
	$('#'+spinnerId).css('display','none'); $('#'+spinnerId).css('visibility','hidden'); $('#'+spinnerId).hide();	
}

function ajax(pageUrl,FormId,divId,spinnerId){
	var dataVar ='';
	var d = new Date();
	if(FormId != null){
		dataVar =  $('#'+FormId).serialize();
	} 
	$.ajax({
		type: "POST",
		
		url: pageUrl,
		cache:false,
		data:dataVar,
		
		success: function(msg){	
		
				//if(divId == "sub_cat_id") { $('#'+divId).attr('disabled',false) }
				$('#'+divId).fadeIn('slow', function() { /*Animation complete.*/ });
				$('#'+divId).html(msg);
				//$('#'+divId).html(msg);
				if(spinnerId!=null) { hideSpinner(spinnerId); }
			},
		beforeSend: function(){
			//alert('slideUp');
			//$('#'+divId).fadeOut('slow', function() { /*Animation complete.*/ });
				if(spinnerId!=null) { showSpinner(spinnerId); }
		},
		error: function(m){
			if(spinnerId!=null) { hideSpinner(spinnerId); }
			//alert(m);
			},
		complete: function(){
			return 'true';
				
		}
	});
}

function setNavigation(prefix,totalnav,idtoactive,actClass) {
	if(prefix=="nav_") {
		for(var i=0;i<=totalnav;i++) {
			$('#'+prefix+i).removeClass("link"+i+"-act");	
		}
		$('#'+prefix+idtoactive).addClass("link"+idtoactive+"-act");
	}
	else {
		for(var i=0;i<=totalnav;i++) {
			$('#'+prefix+i).removeClass(actClass);	
		}
		$('#'+prefix+idtoactive).addClass(actClass);
	}
}


