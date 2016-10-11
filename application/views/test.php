<!doctype html>
<html>
<head>
<meta charset="utf-8">
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript">
	var getData = Array();
	var pages = 1;
	var total_page = 0;
	var cols = '';
	var orders = '';
	var show = 0;
	
	$().ready(function(){
		getquery();
		$('#per_page').change(function(){ getquery(); });
		$('#search_fil').keyup(function(){ getquery(); });
		$('thead th').click(function(){ 
			cols = $(this).data('value'); 
			if($(this).hasClass('asc')){
				$(this).attr('class','desc');
				orders = $(this).attr('class');
			}else{
				$(this).attr('class','asc');
				orders = $(this).attr('class');
			}
			 getquery();
		});	
		
	});	

	function getquery(){
			
		$.ajax({
				type:'POST',
				url: 'json.php',
				dataType: 'json',
				data: { 
						perpage : $('#per_page').val(),  
						search : $('#search_fil').val(),
						page : pages,
						cols : cols,
						order : orders
					},
				success: function(data){
						maxx = data.res.length;
						getData = [];
						for(i=0;i<maxx;i++){
							getData.push(data.res.pop());
						}

						$('#cur_page_int').html(data.page);

						total_page = Math.ceil(data.count/$('#per_page').val());

						if(pages > total_page) pages = total_page;
						
						gen_data(data.count);
				}
		});
	}

	function gen_data(data_count){
		var max = $('#per_page').val();
		var count_start = 0;
		var count_stop = 0;
		var txt = '';

		if(getData.length < max) max =getData.length;

		for(i=0;i<max;i++){
			if(i<data_count){	
				row = getData.pop();
				txt += '<tr class="numrow row_id'+row.AMPHUR_ID+'" data-value="'+row.AMPHUR_ID+'" onclick="chk_row('+row.AMPHUR_ID+');">';
				txt += '<td width="150" align="center" style="border-right: 1px solid #ccc;">'+row.PROVINCE_NAME+'</td>';
				txt += '<td width="170" align="center">'+row.AMPHUR_NAME+'</td>';
				txt += '</tr>';
				show++;
			}
		}	
	
		$('tbody').html(txt);
	
		$('.numrow').each(function(){ count_stop++; });

		if(parseInt($('#cur_page_int').html()) <=1){
			count_stop = count_stop;
			count_start = 1;
		}else{
			count_stop = (count_stop*parseInt($('#cur_page_int').html()));
			count_start = (count_stop-(parseInt($('#per_page').val()-1)));
		}

		$('#showrow').html('showing '+count_start+' to '+count_stop+' of '+data_count);
		$('#total_page').html(total_page);
	}

	function previous_page(){ 
		pages = (parseInt($('#cur_page_int').html())-1);
		if(pages>0) getquery(); 
	}
	function next_page(){ 
		pages = (parseInt($('#cur_page_int').html())+1);
		if(pages <= total_page) getquery(); 
	}
	
	function chk_row(row_id){
		if($('.row_id'+row_id).hasClass('active')){
			$('.row_id'+row_id).toggleClass('active');
		}else{
			$('.numrow').removeClass('active');
			$('.row_id'+row_id).addClass('active');
		}
	}

	function get_edit(id){
		$.getJSON('edit.php?option=get&code_id='+id , function(res){
			$('#edit_record .list_form input[name=province]').val(res.province);
			$('#edit_record .list_form input[name=amphur]').val(res.amphur);
			$('#edit_record .list_form input[type=hidden]').val(id);
		});
	}

	function edit_record(id){
		var data1 = $('#edit_record .list_form input[name=province]').val();
		var data2 = $('#edit_record .list_form input[name=amphur]').val();
		var data3 = $('#edit_record .list_form input[type=hidden]').val();
		var data_option = 'save';
		$.ajax({
			type : 'POST',
			url : 'edit.php',
			data : { option : data_option , province : data1 , amphur : data2 , code_id : data3 },
			success : function(res){
				alert(res);
				$('#edit_record').fadeOut('slow');
				getquery();
			}
		});
	}

	function add_record(){
		var data1 = $('#add_new .list_form input[name=province]').val();
		var data2 = $('#add_new .list_form input[name=amphur]').val();
		$.ajax({
			type : 'POST',
			url : 'insert.php',
			data : { province : data1 , amphur : data2 },
			success : function(res){
				alert(res);
				$('#add_new').fadeOut('slow');
				getquery();
			}
		});
	}
	
</script>
<title>Search</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS for the '3 Col Portfolio' Template -->
    <link href="css/portfolio-item.css" rel="stylesheet">
</head>

<body>

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
  <div class="col-lg-6">
    <div class="input-group">
    <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span> VESSEL</span>
     <input type="text" class="form-control"  placeholder="VESSEL NAME" name="VESSEL"> 
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-6">
    <div class="input-group">
    <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span> VOYAGE</span>
      <input type="text" class="form-control"  placeholder="VOYAGE NO" name="VOYAGE">
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
  <!-- Table -->
  <table class="table table-responsive table-hover table-striped" id="show_list">
   <thead>
   <th align="center" data-filter="PMKEY" class="ASC">ID</th>
						<th align="center" data-filter="JOBNO">JOB</th>
						<th align="center" data-filter="RECPORT">PORT</th>
						<th align="center" data-filter="VESSEL">VESSEL</th>
						<th align="center" data-filter="V_VOY">VOYAGE</th>
						<th align="center" data-filter="ETA">ETA</th>
						<th align="center" data-filter="ETD">D/O<br/>DATE</th>
						<th align="center" data-filter="SHED">SHED NO</th>
						<th align="center" data-filter="MASTERNO">MASTER NO</th>
						<th align="center"data-filter="BLNO" >BL NO</th>
						<th align="center">EXCHANGE RATE<br />UNSTUFFING DATE</th>
						
   </thead>
   <tbody>
   <td>1</td>
   <td>2</td>
   </tbody>
  </table>
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
			  </script>

</body>

</html>