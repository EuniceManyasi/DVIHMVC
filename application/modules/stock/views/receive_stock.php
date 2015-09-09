<?php
$form_attributes = array('id' => 'stock_received_fm','method' =>'post');
echo form_open('',$form_attributes);?>

<table>
<div class="well well-sm"><h4>Transaction Details</h4></div>
	<thead>
		                  <th style="width:50%;" class="small" align="center">Received From</th>
							<th style="width:40%;" class="small">Date Received</th>
              <th></th>
	</thead>
	<tbody>
		<tr>
                <td><?php $data=array('name' => 'received_from','id'=> 'received_from','class'=>'col-xs-20'); echo form_input($data);?></td>
                <td><?php $data=array('name' => 'date_received','id'=>'date_received','class'=>'col-xs-11'); echo form_input($data);?></td>
                <td><input type="hidden" name ="transaction_type" class="transaction_type" value="1"><td>
		</tr>
	</tbody>
</table>
<hr></hr><hr></hr>


<div id="stock_receive_tbl">
	  <div class="well well-sm"><h4>Vaccine Details</h4></div>
	<table class="table">
		<thead>

			              <th style="width:26%;" class="small" align="center">Vaccine/Diluents</th>
							<th style="width:20%;" class="small">Batch No.</th>
							<th style="width:6%;" class="small">Expiry&nbsp;Date</th>
							<th style="width:12%;" class="small">Quantity(doses)</th>
							<th style="width:16%;" class="small">VVM Status</th>
							<th style="width:15%" class="small">Action</th>
		</thead>
		<tbody>

			<tr align="center" receive_row="1"> 
              
              <td> <select name="vaccine" class="vaccine col-xs-12" id="vaccine">
                 <option value="">--Select One--</option>
                 <?php foreach ($vaccines as $vaccine) { 
                     echo "<option value='".$vaccine['ID']."'>".$vaccine['Vaccine_name']."</option>";
                     }?>
                </select></td>

				
             		<td><?php $data=array('name' => 'batch_no','id'=>'batch_no','class'=>'batch_no col-xs-12'); echo form_input($data);?></td>
             		<td><?php $data=array('name' => 'expiry_date','id'=> 'expiry_date','class'=>'col-xs-15 expiry_date', 'type'=>'date'); echo form_input($data);?></td>
             		<td><?php $data=array('name' => 'quantity_received','id'=> 'quantity_received','class'=>'quantity_received col-xs-14'); echo form_input($data);?></td>
             		
                <td>
                <select name="vvm_status" class="vvm_status col-xs-15" id="vvm_status" name="vvm_status">
                <option value=""> --Select One-- </option>
                    <option value="1">Stage 1</option>
                    <option value="2">Stage 2</option>
                    <option value="3">Stage 3</option>
                </select></td>
             		<td class="col-xs-9 small "><a href="#" class="add"> Add </a><span class="divider"> | </span><a href="#" class="remove">Remove</a></td>
			</tr>

		</tbody>
	</table>


</div>
<input type="submit" name="stock_received" id="stock_received" value="Receive Stock">
<?php
   echo form_close();?>

   <script type="text/javascript">

             $('#date_received').datepicker().datepicker('setDate', new Date());

              $('#stock_receive_tbl').delegate( '.add', 'click', function () {
            
                       var thisRow =$('#stock_receive_tbl tr:last');
                       var cloned_object = $( thisRow ).clone();

                       var receive_row = cloned_object.attr("receive_row");
                       var next_receive_row = parseInt(receive_row) + 1;
                       cloned_object.attr("receive_row", next_receive_row);

                       var vaccine_id = "vaccine" + next_receive_row;
                       var vaccine = cloned_object.find(".vaccine");
                       vaccine.attr('id',vaccine_id);

                      var batch_id = "batch_no" + next_receive_row;
                      var batch = cloned_object.find(".batchno_");
                      batch.attr('id',batch_id);

                      var expiry_id = "expiry_date" + next_receive_row;
                      var expiry = cloned_object.find(".expiry_date");
                      expiry.attr('id',expiry_id);

                      var quantity_received_id = "quantity_received" + next_receive_row;
                      var quantity_received = cloned_object.find(".quantity_received");
                      quantity_received.attr('id',quantity_received_id);

                      var vvm_status_id = "vvm_status" + next_receive_row;
                      var vvm_status = cloned_object.find(".vvm_status");
                      vvm_status.attr('id',vvm_status_id);

                cloned_object .insertAfter( thisRow ).find( 'input' ).val( '' );
             
                });

       $('#stock_receive_tbl').delegate('.remove', 'click', function(){
             $(this).closest('tr').remove();});

  
 

   $("#stock_received_fm").submit(function(e)
         {
          e.preventDefault();//STOP default action
          var vaccine_count=0;
          $.each($(".vaccine"), function(i, v) {
                   vaccine_count++;
          });

       
       var formURL="<?php echo base_url();?>stock/save_received_stock";

       var vaccines = retrieveFormValues_Array('vaccine');
       var batch_no = retrieveFormValues_Array('batch_no');
       var expiry_date = retrieveFormValues_Array('expiry_date');
       var quantity_received = retrieveFormValues_Array('quantity_received');
       var vvm_status = retrieveFormValues_Array('vvm_status');
       var date_received = retrieveFormValues('date_received');
       var received_from= retrieveFormValues('received_from');
       var transaction_type= retrieveFormValues('transaction_type');

        for(var i = 0; i < vaccine_count; i++) {
          var get_vaccine=vaccines[i];
          var get_batch=batch_no[i];
          var get_expiry=expiry_date[i];
          var get_quantity_received=quantity_received[i];
          var get_vvm_status=vvm_status[i];
          var get_date_received=date_received;
          var get_received_from=received_from;
          var get_transaction_type=transaction_type;

          $.ajax(
          {
              url : formURL,
              type: "POST",
              data : {"transaction_type":get_transaction_type,"date_received":get_date_received,"received_from":get_received_from,"vaccine":get_vaccine,"batch_no":get_batch,"expiry_date":get_expiry,"quantity_received":get_quantity_received,"vvm_status":get_vvm_status},
             /* dataType : json,*/
            // url : "<?php echo site_url("stock/list_inventory"); ?>";
              success:function(data, textStatus, jqXHR) 
              {
                  //data: return data from server
                  
                  window.location.replace('<?php echo base_url().'stock/list_inventory'?>');



              },
              error: function(jqXHR, textStatus, errorThrown) 
              {
                  //if fails      
              }
          });
     }
       // e.unbind(); //unbind. to stop multiple form submit.
           });

           function retrieveFormValues_Array(name) {
                      var dump = new Array();
                      var counter = 0;
                        $.each($("input[name=" + name + "], select[name=" + name + "]"), function(i, v) {
                            var theTag = v.tagName;
                            var theElement = $(v);
                            var theValue = theElement.val();
                            /*dump[counter] = theElement.attr("value");*/
                            dump[counter] = theValue;

                            counter++;
                        });
                      return dump;
            }

            function retrieveFormValues(name) {
                      var dump;
                        $.each($("input[name=" + name + "], select[name=" + name + "]"), function(i, v) {
                            var theTag = v.tagName;
                            var theElement = $(v);
                            var theValue = theElement.val();
                            dump = theValue;
                        });
                      return dump;
            }




    
   </script>