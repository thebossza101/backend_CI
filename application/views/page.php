
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
        <?php if($port == 'im')
				{
					$nameport = 'Import';
					$home = base_url().'import';
					$class = 'glyphicon glyphicon-save';
					
					}else{
						$nameport = 'Export';
						$home = base_url().'export';
					$class = 'glyphicon glyphicon-open';
						
						}?>
      <!--<a class="navbar-brand" href="<?php echo $home; ?>"><span class="glyphicon glyphicon-home"></span> Home</a>-->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="<?php echo base_url();?>index.php/import"><span class="glyphicon glyphicon-save"></span> Shipment Import</a>
        </li>
        <li>
        <a href="<?php echo base_url();?>index.php/export"><span class="glyphicon glyphicon-open"></span> Shipment Export</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      
      <!--<li><a><span class="glyphicon glyphicon-user"></span> <?php //echo $Username ?></a></li>-->
      
      <!--<li><a data-toggle="modal" data-target="#logingout"><span class="glyphicon glyphicon-off"></span> Logout</a></li>-->
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Shipment Tracking
                        
                    <small><span class="<?php echo $class; ?>"></span> <?php echo $nameport; ?></small>
					
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
    <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span> VESSEL&nbsp;</span>
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
        <input type="checkbox" id="Master_ch" name="Master_ch">&nbsp;&nbsp;&nbsp;Master B/L&nbsp;&nbsp;&nbsp;
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-4">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="House B/L" id="txtHouse"  name="House" disabled>
      <span class="input-group-addon">
        <input type="checkbox" id="House_ch" name="House_ch">&nbsp;&nbsp;&nbsp; House B/L&nbsp;&nbsp;&nbsp;
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-4">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Container NO." id="txtContainer" name="Container" disabled>
      <span class="input-group-addon">
        <input type="checkbox" id="Container_ch" name="Container_ch"> Container NO.
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
  </div>
  </form>
<ul class="pager">
  <li class="previous" onClick="backpage()" id="back" style="display:none"><a>  &larr; Previous</a></li>
  <span id="pagetxt"></span>
  <li class="next" onClick="nextpage()" id="next" style="display:none"><a>  Next &rarr;</a></li>
</ul>
<ul class="pager">
	<li class="next" style="display:inline" data-toggle="modal" data-target="#columns"><!--<a>  Columns</a>--></li>
</ul>
<div class="table-responsive">
  <!-- Table --><!--test-->
  <table class="table table-bordered table-hover table-striped table-condensed" id="show_list"  >
   <thead>
   						<!--<th align="left" data-filter="PMKEY" class="ASC" id="tcol1" name="tcol1"><center>ID</center></th>
						<th align="left" data-filter="JOBNO" id="tcol2" name="tcol2"><center>JOB</center></th>-->
						<th align="left" data-filter="RECPORT" id="tcol3" name="tcol3"><center>PORT</center></th>
						<th align="left" data-filter="VESSEL" id="tcol4" name="tcol4"><center>VESSEL</center></th>
						<th align="left" data-filter="V_VOY" id="tcol5" name="tcol5"><center>VOYAGE</center></th>
						<th align="left" data-filter="ETA" id="tcol6" name="tcol6"><center>ETA</center></th>
						<th align="left" data-filter="ETD" id="tcol7" name="tcol7"><center>D/O<br/>DATE</center></th>
						<th align="left" data-filter="SHED" id="tcol8" name="tcol8"><center>SHED NO</center></th>
						<th align="left" data-filter="MASTERNO" id="tcol9" name="tcol9"><center>MASTER NO</center></th>
						<th align="left" data-filter="BLNO" id="tcol10" name="tcol10" ><center>BL NO</center></th>
						<th align="left" id="tcol11" name="tcol11"><center>EXCHANGE RATE<br/>UNSTUFFING DATE</center></th>
						
   </thead>
   <tbody>
 <td colspan="11" align="center"><font color="red">Search something first</font></td>
   </tbody>
  </table>
  <center><span id="page_bar"></span></center>
  <span id="totaltxt"></span>
  </div>
</div>
    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy;  GeniusNetwork 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

  