<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script>
$( document ).ready(function() {
var totalpage = 0;
makeAjaxCall();
$('input').keyup(makeAjaxCall);
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
  
}else{
	page = 0
}

	var data=[];
	$.ajax({
		type: "post",
		dataType: 'json',
		url: "pages/getdata",
		cache: false,				
		data: $('#getdata').serialize()+'&order_by='+order_by+'&order='+order+'&page='+page,
		success: function(data)
		{	totalpage = Math.ceil(data.count/50);
			$('#total_all_page').html(totalpage)
			$('#text_page').html(page + 1)
			if(totalpage == 1){
			document.getElementById("next").style.display='none';
			document.getElementById("back").style.display='none';
			}
			else{
				if(totalpage < page + 1 ){
			document.getElementById("next").style.display='inline';
				}
			}
		if(data.res != 'not'){				
			maxx = data.res.length;
			getData = [];
				for(i=0;i<maxx;i++){
					getData.push(data.res.pop());
				}
				gen_data();
		}else{
			var HTML = 'Your search did not match any documents. ';
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
				HTML += '<td align="center" width="50">'+row.PMKEY+'</td>';
				HTML += '<td align="center">'+row.JOBNO+'</td>';
				HTML += '<td align="center">'+row.RECPORT+'</td>';
				HTML += '<td align="center">'+row.VESSEL+'</td>';
				HTML += '<td align="center">'+row.V_VOY+'</td>';
				HTML += '<td align="center">'+n_eta+'</td>';
				HTML += '<td align="center">'+n_etd+'</td>';
				HTML += '<td align="center">'+row.SHED+'</td>';
				HTML += '<td align="center">'+row.MASTERNO+'</td>';
				HTML += '<td align="center">'+row.BLNO+'</td>';
				HTML += '<td align="center">&nbsp;</td>';
				HTML += '</tr>';
		}

		$('tbody').html(HTML);
}



</script>
    <title>Search</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS for the '3 Col Portfolio' Template -->
    <link href="css/portfolio-item.css" rel="stylesheet">
</head>

<body>
<input type="hidden" id="type_search" value="im">
    <nav class="navbar navbar-default  navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="pages"><span class="glyphicon glyphicon-home"></span> Home</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-list-alt"></span> Shipment Tracking <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#"><span class="glyphicon glyphicon-save"></span> Import</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-open"></span> Export</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Admin</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Shipment Tracking
                    <small><span class="glyphicon glyphicon-open"></span> Export</small>
                </h1>
         </div>
      </div>
<div class="panel panel-default">
  <!-- Default panel contents -->
   <form role="form" id="getdata" method="post">
  <div class="panel-heading">Searching System</div>
  <div class="panel-body">
   <div class="row">
  <div class="col-lg-4">
    <div class="input-group">
    <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span> VESSEL</span>
     <input type="text" class="form-control"  placeholder="VESSEL NAME" name="VESSEL" id="vesel_name"> 
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-4">
    <div class="input-group">
    <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span> VOYAGE</span>
      <input type="text" class="form-control"  placeholder="VOYAGE NO" name="VOYAGE" id="voyage_no">
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-4">
    <div class="input-group">
      <span class="input-group-addon">
        <input type="radio" name="radio_option" value="start_with" id="radioStart" checked> Start With
       </span>
        <span class="input-group-addon">
       <input type="radio" name="radio_option" value="contain" id="radioContain"> Contain
       </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
<br><br>
<div class="row">
  <div class="col-lg-4">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Master B/L" id="txtMaster" name="Master" disabled>
      <span class="input-group-addon">
        <input type="checkbox" id="Master_ch" name="Master_ch"> Master B/L
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-4">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="House B/L" id="txtHouse" disabled>
      <span class="input-group-addon">
        <input type="checkbox" id="House_ch"> House B/L
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-4">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Container NO." id="txtContainer" disabled>
      <span class="input-group-addon">
        <input type="checkbox" id="Container_ch"> Container NO.
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
  </div>
  </form>
<ul class="pager">
  <li class="previous" onClick="backpage()" id="back" style="display:none"><a>  &larr; Previous</a></li>
  Page <span id="text_page"></span>/<span id="total_all_page"></span>
  <li class="next" onClick="nextpage()" id="next" style="display:inline"><a>  Next &rarr;</a></li>
</ul>
  <!-- Table -->
  <table class="table table-responsive table-hover table-striped table-condensed" id="show_list">
   <thead>
   <th align="center" data-filter="PMKEY" class="ASC"><center>ID</center></th>
						<th align="center" data-filter="JOBNO"><center>JOB</center></th>
						<th align="center" data-filter="RECPORT"><center>PORT</center></th>
						<th align="center" data-filter="VESSEL"><center>VESSEL</center></th>
						<th align="center" data-filter="V_VOY"><center>VOYAGE</center></th>
						<th align="center" data-filter="ETA"><center>ETA</center></th>
						<th align="center" data-filter="ETD"><center>D/O<br/>DATE</center></th>
						<th align="center" data-filter="SHED"><center>SHED NO</center></th>
						<th align="center" data-filter="MASTERNO"><center>MASTER NO</center></th>
						<th align="center"data-filter="BLNO" ><center>BL NO</center></th>
						<th align="center"><center>EXCHANGE RATE<br/>UNSTUFFING DATE</center></th>
						
   </thead>
   <tbody>
   <td>1</td>
   <td>2</td>
   </tbody>
  </table>
  <center><ul class="pagination pagination-lg">
  <li><a>&laquo;</a></li>
  <li class="active"><span>1 <span class="sr-only">(current)</span></span></li>
  <span class="page_num"></span>
  <li><a>2</a></li>
  <li><a>3</a></li>
  <li><a>4</a></li>
  <li><a>5</a></li>
  <li><a>&raquo;</a></li>
</ul>
</center>
</div>
    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; BOSSKING @ GeniusNetwork 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
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
	 if(totalpage > page + 1) {
	document.getElementById("back").style.display='inline';
	 page = page + 1
	 makeAjaxCall();
	 	}
		if(totalpage <= page + 1 ){
		document.getElementById("back").style.display='inline';
		 document.getElementById("next").style.display='none';
		}
	 }
	 
	 function backpage() {
	if (page > 0) {
	 page = page - 1
	 makeAjaxCall();
	 	if(page < 1){
		document.getElementById("back").style.display='none';
		}
		}
		
	if (totalpage >= page + 1){
	document.getElementById("next").style.display='inline';
	}
	 }
	 

			  </script>
</body>

</html>
