  <!-- JavaScript -->
  <?php
  		//echo   base_url();
		//echo   site_url();
  ?>
    <script src="<?php echo base_url() ?>js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url() ?>js/bootstrap.js"></script>
<script>
			  $('#Master_ch').change(function(){
   var isChecked = $('#Master_ch').is(':checked');
   
        if(isChecked==true){
			document.getElementById("txtMaster").disabled=false;
		}
		else{
			document.getElementById("txtMaster").disabled=true;
		}
        
});

		  $('#House_ch').change(function(){
   var isChecked = $('#House_ch').is(':checked');
        if(isChecked==true){
			document.getElementById("txtHouse").disabled=false;
		}
		else{
			document.getElementById("txtHouse").disabled=true;
		}
        
});

		  $('#Container_ch').change(function(){
   var isChecked = $('#Container_ch').is(':checked');
        if(isChecked==true){
			document.getElementById("txtContainer").disabled=false;
		}
		else{
			document.getElementById("txtContainer").disabled=true;
		}
        
});
 $('#radioStart').change(function(){
	 makeAjaxCall();
	 });
	 $('#radioContain').change(function(){
	 makeAjaxCall();
	 });
	 
	 function nextpage() {
	 page++;
	 makeAjaxCall();
	 get_page()
	 }
	 
	 function backpage() {
	 page--;
	 makeAjaxCall();
	 get_page()	
	 }
	 
	 function get_page(){
		if(page <=0){
			document.getElementById("back").style.display='none';
		}else{
		document.getElementById("back").style.display='inline';
		}

		if(page >= totalpage-1 || totalpage == 0 ){
			 document.getElementById("next").style.display='none';
		}else{
			document.getElementById("next").style.display='inline';
		}
	 }
	function get_page_bar(){
		if(totalpage <= 5){
			var i;
			var html = ' <ul class="pagination pagination-lg" id="pagination_bar">';
			if(page > 0){
  				html +=	'<li id="in" onClick="backpage()"><a>&laquo;</a></li>';
			}
				for(i=0;i<totalpage;i++){
					if(i==page){ 
					html +=	'	<li class="active" value='+(i+1)+' onClick="click_page(this.value)"><a>'+(i+1)+'</a></li>';
					}else{
						html +=	'	<li value='+(i+1)+' onClick="click_page(this.value)"><a>'+(i+1)+'</a></li>';
					}
				}
				if(page+1 < totalpage){
 					html +=	'	<li id="fi" onClick="nextpage()"><a>&raquo;</a></li>';
				}
					html +=	'	</ul>';		
			}else{
			var i;
			var html = ' <ul class="pagination pagination-lg" id="pagination_bar">';
			if(page > 0){
  				html +=	'<li id="in" onClick="backpage()"><a>&laquo;</a></li>';
			}
			if(page >= 0 && page <= 2)
			{
				for(i=0;i<5;i++){
					if(i==page){ 
					html +=	'	<li class="active" value='+(i+1)+' onClick="click_page(this.value)"><a>'+(i+1)+'</a></li>';
					}else{
						html +=	'	<li value='+(i+1)+' onClick="click_page(this.value)"><a>'+(i+1)+'</a></li>';
					}
				}
			}
			if(page > 2 && page < totalpage-2){
				
				for(i=page-2;i<=page+2;i++){
					if(i==page){ 
					html +=	'	<li class="active" value='+(i+1)+' onClick="click_page(this.value)"><a>'+(i+1)+'</a></li>';
					}else{
						html +=	'	<li value='+(i+1)+' onClick="click_page(this.value)"><a>'+(i+1)+'</a></li>';
					}
				}
			}
			if(page >= totalpage-2 && page < totalpage){
				for(i=totalpage-5;i<totalpage;i++){
					
					if(i==page){ 
					html +=	'	<li class="active" value='+(i+1)+' onClick="click_page(this.value)"><a>'+(i+1)+'</a></li>';
					}else{
						html +=	'	<li value='+(i+1)+' onClick="click_page(this.value)"><a>'+(i+1)+'</a></li>';
					}
				}
				}
				if(page+1 < totalpage){
 					html +=	'	<li id="fi" onClick="nextpage()"><a>&raquo;</a></li>';
				}
					html +=	'	</ul>';			
				}	
			document.getElementById("page_bar").innerHTML = html;
	 }
	 function click_page(id) {
	 page = id-1;
	 makeAjaxCall();
	 get_page()	
	 
	 }
	  
	 
	 
	  	 
			  </script>
              

