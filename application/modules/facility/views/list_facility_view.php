<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
  <div class="row">
    <div class="col-lg-12">
      <a href="<?php echo site_url('facility/create');?>" class="btn btn-primary">Add Facility</a>
    </div>
  </div>
  <div class="row">
  </br>
  </br>
  <?php echo $this->session->flashdata('msg');  ?>
    <div class="col-lg-12" style="margin-top: 10px;">
     <div class="table-responsive" style="overflow-x:auto">
  <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Facility Name</th>
                                        <th>Type</th>
                                        <th>Owner</th>
                                        <th>Region</th>
                                        <th>County</th>
                                        <th>Sub-county</th>
                                        <th>Constituency</th>
                                        <th>Ward</th>
                                        <th>Nearest Town</th>
                                        <th>Distance</th>
                                        <th>Depot Distance</th>
										<th>Fridge</th>
                                        <th>WCBA Population</th>
                                        <th>Cold Boxes</th>
                                        <th>Vaccine Carriers</th>
                                        <th>Status</th>
										
                                        <td align="center"><b>Edit</b></td>
                                        <td align="center"><b>Delete</b></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($records->result() as $row){
                                        $edit_url = base_url().'facility/create/'.$row->id;
                                        $delete_url = base_url().'facility/delete/'.$row->id;
                                      ?>
                                    <tr>
                                        <td><?php echo $row->facility_name ?></td>
                                        <td><?php echo $row->type ?></td>
                                        <td><?php echo $row->owner ?></td>
                                        <td><?php echo $row->region_id ?></td>
                                        <td><?php echo $row->county_id ?></td>
                                        <td><?php echo $row->subcounty_id ?></td>
                                        <td><?php echo $row->constituency ?></td>
                                        <td><?php echo $row->ward ?></td>
                                        <td><?php echo $row->nearest_town ?></td>
                                        <td><?php echo $row->nearest_town_distance ?></td>
                                        <td><?php echo $row->nearest_depot_distance ?></td>                                       
                                        <td><?php echo $row->refrigerator ?></td>
                                        <td><?php echo $row->wcba_population ?></td>
                                        <td><?php echo $row->cold_box ?></td>
                                        <td><?php echo $row->vaccine_carrier ?></td>
                                        <td><?php echo $row->status ?></td>
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
