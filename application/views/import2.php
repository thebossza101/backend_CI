<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script>
$( document ).ready(function() {
 var viewPortWidth = $(window).width() ;
if (viewPortWidth >= 320 && viewPortWidth < 640)
    {        
		document.getElementById("col1").checked=false
		document.getElementById("col6").checked=false
		document.getElementById("col7").checked=false
		document.getElementById("col8").checked=false
		document.getElementById("col9").checked=false
		document.getElementById("col10").checked=false
		document.getElementById("col11").checked=false
    }else if(viewPortWidth >= 640 && viewPortWidth < 800){
		 document.getElementById("col1").checked=false
		document.getElementById("col6").checked=false
		document.getElementById("col7").checked=false
		document.getElementById("col8").checked=false
		document.getElementById("col9").checked=false
		document.getElementById("col10").checked=false
		document.getElementById("col11").checked=false
		 ////////
		 document.getElementById("col9").checked=true
		document.getElementById("col10").checked=true
		 
	}else if(viewPortWidth >= 800 && viewPortWidth < 1024){
		 document.getElementById("col1").checked=false
		document.getElementById("col6").checked=false
		document.getElementById("col7").checked=false
		document.getElementById("col8").checked=false
		document.getElementById("col9").checked=false
		document.getElementById("col10").checked=false
		document.getElementById("col11").checked=false
		 ////////
		 document.getElementById("col6").checked=true
		 document.getElementById("col7").checked=true
		 document.getElementById("col9").checked=true
		document.getElementById("col10").checked=true
	}
	else{
		document.getElementById("col1").checked=true
		 document.getElementById("col2").checked=true
		 document.getElementById("col3").checked=true
		document.getElementById("col4").checked=true
		document.getElementById("col5").checked=true
		document.getElementById("col6").checked=true
		 document.getElementById("col7").checked=true
		  document.getElementById("col8").checked=true
		 document.getElementById("col9").checked=true
		document.getElementById("col10").checked=true
		document.getElementById("col11").checked=true
	}
   
	
		toggleVis('col1');
		toggleVis('col2');
		toggleVis('col3');
		toggleVis('col4');
		toggleVis('col5');
		toggleVis('col6');
		toggleVis('col7');
		toggleVis('col8');
		toggleVis('col9');
		toggleVis('col10');
		toggleVis('col11');
var totalpage = 0;

$(window).resize(function(){
   viewPortWidth = $(window).width();
   if (document.getElementById('tgc').checked) {
           if (viewPortWidth >= 320 && viewPortWidth < 640)
    {        
		document.getElementById("col1").checked=false
		document.getElementById("col6").checked=false
		document.getElementById("col7").checked=false
		document.getElementById("col8").checked=false
		document.getElementById("col9").checked=false
		document.getElementById("col10").checked=false
		document.getElementById("col11").checked=false
    }else if(viewPortWidth >= 640 && viewPortWidth < 800){
		 document.getElementById("col1").checked=false
		document.getElementById("col6").checked=false
		document.getElementById("col7").checked=false
		document.getElementById("col8").checked=false
		document.getElementById("col9").checked=false
		document.getElementById("col10").checked=false
		document.getElementById("col11").checked=false
		 ////////
		 document.getElementById("col9").checked=true
		document.getElementById("col10").checked=true
		 
	}else if(viewPortWidth >= 800 && viewPortWidth < 1024){
		 document.getElementById("col1").checked=false
		document.getElementById("col6").checked=false
		document.getElementById("col7").checked=false
		document.getElementById("col8").checked=false
		document.getElementById("col9").checked=false
		document.getElementById("col10").checked=false
		document.getElementById("col11").checked=false
		 ////////
		 document.getElementById("col6").checked=true
		 document.getElementById("col7").checked=true
		 document.getElementById("col9").checked=true
		document.getElementById("col10").checked=true
	}
	else{
		document.getElementById("col1").checked=true
		 document.getElementById("col2").checked=true
		 document.getElementById("col3").checked=true
		document.getElementById("col4").checked=true
		document.getElementById("col5").checked=true
		document.getElementById("col6").checked=true
		 document.getElementById("col7").checked=true
		  document.getElementById("col8").checked=true
		 document.getElementById("col9").checked=true
		document.getElementById("col10").checked=true
		document.getElementById("col11").checked=true
	}
   
	
		toggleVis('col1');
		toggleVis('col2');
		toggleVis('col3');
		toggleVis('col4');
		toggleVis('col5');
		toggleVis('col6');
		toggleVis('col7');
		toggleVis('col8');
		toggleVis('col9');
		toggleVis('col10');
		toggleVis('col11');
        }

  });

$('input').keyup(function() {
page = 0;
makeAjaxCall();

});
$('#show_list thead th').click(function(){
			if($(this).hasClass('ASC')){
				$(this).removeClass('ASC');
				$(this).addClass('DESC');
				order_by = $(this).data('filter');
				order = 'DESC';
				makeAjaxCall();
			}else{
				$(this).removeClass('DESC');
				$(this).addClass('ASC');
				order_by = $(this).data('filter');
				order = 'ASC';
				makeAjaxCall();
			}
		});
});
function makeAjaxCall(){
	if (typeof order_by != 'undefined'&& order != 'undefined' ) {
  
}else{
	order_by = 'PMKEY';
	order = 'ASC';
}
	if (typeof page != 'undefined') {
  page = page;
}else{
	page = 0
}

	var data=[];
	$.ajax({
		type: "post",
		dataType: 'json',
		url: "<? echo $port?>/getdata",
		cache: false,				
		data: $('#getdata').serialize()+'&order_by='+order_by+'&order='+order+'&page='+page,
		success: function(data)
		{	totalpage = Math.ceil(data.count/50);
		if(data.res != 'not'){
			
		if(data.count){
			var pagestxt = page + 1;
		$('#pagetxt').html("Page "+pagestxt+"/"+totalpage)
		$('#totaltxt').html("Found "+data.count+" item(s)")
		}else{
		$('#pagetxt').html("")
		$('#totaltxt').html("")
		
		}
		
		$('#text_page').html(page + 1)			
			maxx = data.res.length;
			getData = [];
				for(i=0;i<maxx;i++){
					getData.push(data.res.pop());
				}
				get_page();
				gen_data();
				get_page_bar()
		}else{
			totalpage = 0;
			get_page();
			get_page_bar();
			$('#pagetxt').html("")
		$('#totaltxt').html("")
			var HTML = '<br><td colspan="11" align="center"><font color="red">Your search did not match any data.</font></td>';
			$('tbody').html(HTML);
		}			
		},
		error: function(){						
			alert('Error while request..');
		}
 });
 
}




function gen_data(){
var HTML = '';
		var max = getData.length;
		var n_eta = '';
		var n_etd = '';
		
	
		for(i=0; i<max; i++){
			row = getData.pop();
				var data_eta = row.ETA;
				var data_etd = row.ETD;
				if(data_eta != null){
					var eta = data_eta.split(' ');
					n_eta = eta[0]+'/'+eta[1]+''+eta[2];
				}else{
					n_eta = data_eta;
				}

				if(data_etd != null){
					var etd = data_etd.split(' ');
					n_etd = etd[0]+'/'+etd[1]+''+etd[2];
				}else{
					n_etd = data_etd;
				}

				HTML += '<tr class="numrow row_id'+row.PMKEY+' text-left">';
				/*HTML += '<td width="50" id="tcol1" name="tcol1">'+row.PMKEY+'</td>';
				HTML += '<td  id="tcol2" name="tcol2">'+row.JOBNO+'</td>';*/
				HTML += '<td  id="tcol3" name="tcol3">'+row.RECPORT+'</td>';
				HTML += '<td  id="tcol4" name="tcol4">'+row.VESSEL+'</td>';
				HTML += '<td  id="tcol5" name="tcol5">'+row.V_VOY+'</td>';
				HTML += '<td  id="tcol6" name="tcol6">'+n_eta+'</td>';
				HTML += '<td  id="tcol7" name="tcol7">'+n_etd+'</td>';
				HTML += '<td  id="tcol8" name="tcol8">'+row.SHED+'</td>';
				HTML += '<td  id="tcol9" name="tcol9">'+row.MASTERNO+'</td>';
				HTML += '<td  id="tcol10" name="tcol10">'+row.BLNO+'</td>';
				HTML += '<td  id="tcol11" name="tcol11">&nbsp;</td>';
				HTML += '</tr>';
		}

		$('tbody').html(HTML);
		//toggleVis('col1');
		//toggleVis('col2');
		toggleVis('col3');
		toggleVis('col4');
		toggleVis('col5');
		toggleVis('col6');
		toggleVis('col7');
		toggleVis('col8');
		toggleVis('col9');
		toggleVis('col10');
		toggleVis('col11');
}


var showMode = 'table-cell';

// However, IE5 at least does not render table cells correctly
// using the style 'table-cell', but does when the style 'block'
// is used, so handle this

if (document.all) showMode='block';

// This is the function that actually does the manipulation

function toggleVis(btn){

	// First isolate the checkbox by name using the
	// name of the form and the name of the checkbox

	btn   = document.forms['tcol'].elements[btn];

	// Next find all the table cells by using the DOM function
	// getElementsByName passing in the constructed name of
	// the cells, derived from the checkbox name

	cells = document.getElementsByName('t'+btn.name);

	// Once the cells and checkbox object has been retrieved
	// the show hide choice is simply whether the checkbox is
	// checked or clear

	mode = btn.checked ? showMode : 'none';

	// Apply the style to the CSS display property for the cells

	for(j = 0; j < cells.length; j++) cells[j].style.display = mode;
}



</script>
    <title>Search</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS for the '3 Col Portfolio' Template -->
    <link href="css/portfolio-item.css" rel="stylesheet">
</head>

<body>






<!-- Modal -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="columns">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
     	
         <div class="modal-body">
       	
                <div class="checkbox">
                <form name="tcol" onsubmit="return false">
    			  <!--<input type="checkbox" name="col1" id="col1" onclick="toggleVis(this.name)"  checked> ID	<br>	
    			  <input type="checkbox" name="col2" id="col2" onclick="toggleVis(this.name)"  checked> JOB	<br>-->
                  <input type="checkbox" name="col3" id="col3" onclick="toggleVis(this.name)"  checked> PORT	<br>	
    			  <input type="checkbox" name="col4" id="col4" onclick="toggleVis(this.name)"  checked> VESSEL	<br>
                  <input type="checkbox" name="col5" id="col5" onclick="toggleVis(this.name)"  checked> VOYAGE	<br>	
    			  <input type="checkbox" name="col6" id="col6" onclick="toggleVis(this.name)"  checked> ETA	<br>
                  <input type="checkbox" name="col7" id="col7" onclick="toggleVis(this.name)"  checked> D/O DATE	<br>	
    			  <input type="checkbox" name="col8" id="col8" onclick="toggleVis(this.name)"  checked> SHED NO	<br>
                  <input type="checkbox" name="col9" id="col9" onclick="toggleVis(this.name)"  checked> MASTER NO	<br>
                  <input type="checkbox" name="col10" id="col10" onclick="toggleVis(this.name)"  checked> BL NO	<br>	
    			  <input type="checkbox" name="col11" id="col11" onclick="toggleVis(this.name)"  checked> EXCHANGE RATEUNSTUFFING DATE	<br /><br />
                  <input type="checkbox" name="tgc" id="tgc"  checked> Auto Toggle Columns
                 </form>
 				 </div>
     	 </div>
     	 <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     	 </div>
    </div>
  </div>
</div>

<!-- Small modal -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="logingout">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">Logout</div>
      <div class="modal-body">
      Are you sure to want to logout ?
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary" onclick="location.href = 'pages/logout'">Yes</button>
      </div>
    </div>
  </div>
</div>
<!----end modal---->
</body>

</html>

<!-- Modal -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="columns">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
     	
         <div class="modal-body">
       	
                <div class="checkbox">
                <form name="tcol" onsubmit="return false">
    			 <!-- <input type="checkbox" name="col1" id="col1" onclick="toggleVis(this.name)"  checked> ID	<br>	
    			  <input type="checkbox" name="col2" id="col2" onclick="toggleVis(this.name)"  checked> JOB	<br>-->
                  <input type="checkbox" name="col3" id="col3" onclick="toggleVis(this.name)"  checked> PORT	<br>	
    			  <input type="checkbox" name="col4" id="col4" onclick="toggleVis(this.name)"  checked> VESSEL	<br>
                  <input type="checkbox" name="col5" id="col5" onclick="toggleVis(this.name)"  checked> VOYAGE	<br>	
    			  <input type="checkbox" name="col6" id="col6" onclick="toggleVis(this.name)"  checked> ETA	<br>
                  <input type="checkbox" name="col7" id="col7" onclick="toggleVis(this.name)"  checked> D/O DATE	<br>	
    			  <input type="checkbox" name="col8" id="col8" onclick="toggleVis(this.name)"  checked> SHED NO	<br>
                  <input type="checkbox" name="col9" id="col9" onclick="toggleVis(this.name)"  checked> MASTER NO	<br>
                  <input type="checkbox" name="col10" id="col10" onclick="toggleVis(this.name)"  checked> BL NO	<br>	
    			  <input type="checkbox" name="col11" id="col11" onclick="toggleVis(this.name)"  checked> EXCHANGE RATEUNSTUFFING DATE	<br /><br />
                  <input type="checkbox" name="tgc" id="tgc"  checked> Auto Toggle Columns
                 </form>
 				 </div>
     	 </div>
     	 <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     	 </div>
    </div>
  </div>
</div>

<!-- Small modal -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="logingout">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">Logout</div>
      <div class="modal-body">
      Are you sure to want to logout ?
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary" onclick="location.href = 'pages/logout'">Yes</button>
      </div>
    </div>
  </div>
</div>
<!----end modal---->
</body>

</html>