<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
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
					n_eta = eta[0];
				}else{
					n_eta = data_eta;
				}

				if(data_etd != null){
					var etd = data_etd.split(' ');
					n_etd = etd[0];
				}else{
					n_etd = data_etd;
				}

				HTML += '<tr class="numrow row_id'+row.PMKEY+'">';
				HTML += '<td align="center" width="50" id="tcol1" name="tcol1">'+row.PMKEY+'</td>';
				HTML += '<td align="center" id="tcol2" name="tcol2">'+row.JOBNO+'</td>';
				HTML += '<td align="center" id="tcol3" name="tcol3">'+row.RECPORT+'</td>';
				HTML += '<td align="center" id="tcol4" name="tcol4">'+row.VESSEL+'</td>';
				HTML += '<td align="center" id="tcol5" name="tcol5">'+row.V_VOY+'</td>';
				HTML += '<td align="center" id="tcol6" name="tcol6">'+n_eta+'</td>';
				HTML += '<td align="center" id="tcol7" name="tcol7">'+n_etd+'</td>';
				HTML += '<td align="center" id="tcol8" name="tcol8">'+row.SHED+'</td>';
				HTML += '<td align="center" id="tcol9" name="tcol9">'+row.MASTERNO+'</td>';
				HTML += '<td align="center" id="tcol10" name="tcol10">'+row.BLNO+'</td>';
				HTML += '<td align="center" id="tcol11" name="tcol11">&nbsp;</td>';
				HTML += '</tr>';
		}

		$('tbody').html(HTML);
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