<!-- Modal -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="columns">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
     	
         <div class="modal-body">
       	
                <div class="checkbox">
                <form name="tcol" onsubmit="return false">
    			  <input type="checkbox" name="col1" id="col1" onclick="toggleVis(this.name)"  checked> ID	<br>	
    			  <input type="checkbox" name="col2" id="col2" onclick="toggleVis(this.name)"  checked> JOB	<br>
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