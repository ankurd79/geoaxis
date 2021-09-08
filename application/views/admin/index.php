<?php
//print_r($navlist);
//exit;
$this->load->model('Common_model');

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Version 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        
        <!-- /.col -->

        
        
    	
		    <div class="col-md-6 col-sm-6 col-xs-12">
          Hello <strong><?php echo ucfirst($this->session->userdata['ufname']); ?> <?php echo ucfirst($this->session->userdata['ulname']); ?></strong>; Please Use the button below to generate zoom meet links.
        </div>

        
        
        <!-- /.col -->
      </div>

    



      <!-- /.row -->
    <?php //if($uid==5){?> 
    <br><br> 
    <div class="row">
        <div class="col-md-10">
               <button type="button" class="btn btn-default zoom">Generate Zoom Link</button>
        </div> 

           
    </div> 

    
    <?php //} ?>
    <br>
    <div id='results'></div>
    <br>
    <div id="shwtabledatacount"></div>
       

      <!-- Main row -->
	  
      <div class="row">
        <!-- Left col -->
       
          
           
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    
    
    
  </div>
  <!-- /.content-wrapper -->
<script>
  
  var base_url='<?php echo base_url()?>';
  $("#shwtabledatacount").load(base_url+'index.php/admin/getzoomlinks'); 
  $(document).on('click', '.zoom', function(){
                                       
                                      $('#results').show();
                                      $('#results').html('<img src="<?php echo base_url() ?>images/ajax-loader.gif">');
                                       //alert(value);
                                         // AJAX Request
                                         var recordid=0;
                                       $.ajax({
                                         url: base_url+'index.php/admin/generateZoomlink',
                                         type: 'POST',
                                         data: { id:recordid},
                                         success: function(response){
                                            // Remove row 
                                       alert(response);
                                       $('#results').hide();
                                       $("#shwtabledatacount").load(base_url+'index.php/admin/getzoomlinks');
                                       
                                        }
                                       });
                                       
                                    
                                     });

 </script>                                    