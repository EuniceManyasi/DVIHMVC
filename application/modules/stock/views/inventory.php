 <?php echo $this->session->flashdata('msg');  ?>
<table class="table" id="inventory">
        <thead>
                
              <th style="width:20%;" class="small">Vaccine/Diluents</th>
              <th style="width:20%;" class="small">Vaccine Formulation</th>
              <th style="width:20%;" class="small">Mode Of Administration</th>
              <th style="width:20%;" class="small">Action</th>
        </thead>

        <tbody>

             <?php foreach ($vaccines as $vaccine) {
              $ledger_url = base_url().'stock/get_vaccine_ledger/'.$vaccine['ID'];
              ?>
              <tr>
                    <td><?php echo $vaccine['Vaccine_name']?></td>
                    <td><?php echo $vaccine['Vaccine_formulation']?></td>
                    <td><?php echo $vaccine['Mode_administration']?></td>  
                    <td align="center"><a href="<?php echo $ledger_url ?>"> view vaccine ledger</a></td>
              </tr>
               <?php }?>

        </tbody>
        </table>


        <script type="text/javascript">

               window.setTimeout(function() {
                  $("#alert-message").fadeTo(500, 0).slideUp(500, function(){
                      $(this).remove(); 
                  });
              }, 2000);
        </script> 