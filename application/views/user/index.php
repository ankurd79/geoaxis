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
          Hello <strong><?php echo ucfirst($this->session->userdata['fname']); ?> <?php echo ucfirst($this->session->userdata['lname']); ?></strong>; Here are the list of zoom meet links generated by admin.
        </div>

        
        
        <!-- /.col -->
      </div>

    



      <!-- /.row -->
    <?php //if($uid==5){?> 
    
    <?php //} ?>
    
    <div id="shwtabledatacount">fdd</div>
       

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
  $("#shwtabledatacount").load(base_url+'index.php/user/getzoomlinks'); 
  $(document).on('click', '.zoom', function(){
                                       
                                      
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
                                       $("#shwtabledatacount").load(base_url+'index.php/admin/getzoomlinks');
                                       
                                        }
                                       });
                                       
                                    
                                     });

 </script>                                    