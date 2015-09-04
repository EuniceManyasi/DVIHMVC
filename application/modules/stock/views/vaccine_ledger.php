<?php
$form_attributes = array('id' => 'vaccine_ledger');
echo form_open('',$form_attributes);?>
<table class="table">
	<thead>
		<th style="width:12%;" class="small">Vaccines/Diluents (Origin/Destination)</th>
							<th style="width:12%;" class="small">Count</th>
							<th style="width:12%;" class="small">Received</th>
							<th style="width:12%;" class="small">Issued</th>
							<th style="width:12%;" class="small">Store Balance</th>
							<th style="width:12%;" class="small">Voucher Number</th>
							<th style="width:12%" class="small">Batch Number</th>
							<th style="width:12%" class="small">Expiry Date</th>
							<th style="width:10%" class="small">VVM Status</th>
	</thead>
	<tbody>
		<tr align="center">
				
             	<td><?php $data=array('name' => '','id'=> '','class'=>'col-xs-11'); echo form_input($data);?></td>
             		<td><?php $data=array('name' => '','id'=>'','class'=>'col-xs-9'); echo form_input($data);?></td>
             		<td><?php $data=array('name' => '','id'=> '','class'=>'col-xs-11'); echo form_input($data);?></td>
             		<td><?php $data=array('name' => '','id'=> '','class'=>'col-xs-10'); echo form_input($data);?></td>
             		<td><?php $data=array('name' => '','id'=> '','class'=>'col-xs-9'); echo form_input($data);?></td>
             		<td><?php $data=array('name' => '','id'=> '','class'=>'col-xs-8'); echo form_input($data);?></td>
             		<td><?php $data=array('name' => '','id'=> '','class'=>'col-xs-7'); echo form_input($data);?></td>
             		<td><?php $data=array('name' => '','id'=> '','class'=>'col-xs-9'); echo form_input($data);?></td>
             		<td><?php $data=array('name' => '','id'=> '','class'=>'col-xs-8'); echo form_input($data);?></td>
             		
			</tr>
	</tbody>
</table>

<?php echo form_close();?>