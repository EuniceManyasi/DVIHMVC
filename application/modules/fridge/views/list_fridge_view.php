<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
  <div class="row">
    <div class="col-lg-12">
      <a href="<?php echo site_url('fridge/create');?>" class="btn btn-primary">Add Fridge</a>
    </div>
  </div>
  <div class="row">
  </br>
  </br>
  <?php echo $this->session->flashdata('msg');  ?>
    <div class="col-lg-12" style="margin-top: 10px;">
     <div class="table-responsive">
  <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Item Type</th>
                                        <th>Model Name</th>
                                        <th>Manufacturer</th>
                                        <th>Freezing Capacity</th>
										
                                        <td align="center"><b>Edit</b></td>
                                        <td align="center"><b>Delete</b></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($records->result() as $row){
                                        $edit_url = base_url().'fridge/create/'.$row->id;
                                        $delete_url = base_url().'fridge/delete/'.$row->id;
                                      ?>
                                    <tr>
                                        <td><?php echo $row->item_type ?></td>
                                        <td><?php echo $row->model_name ?></td>
                                        <td><?php echo $row->manufacturer ?></td>
                                        <td><?php echo $row->freezing_capacity ?></td>
                                        <td align="center"><a href="<?php echo $edit_url ?>"><i class="fa fa-edit"></i></a></td>
                                        <td align="center"><a href="<?php echo $delete_url ?>"><i class="fa fa-trash-o"></i></td>
                                       
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                    <hr>
                    </br>
                    
                    <?php 

                    echo $this->pagination->create_links(); ?>
                    
                    
                    
                
                        </div>

  <script type="text/javascript">
window.setTimeout(function() {
    $("#alert-message").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 5000);

</script>
