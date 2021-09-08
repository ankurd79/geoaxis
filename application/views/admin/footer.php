<footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="<?php echo base_url() ?>"><?php echo $site_config['site_name']?></a>.</strong> All rights
    reserved.
  </footer>
  <!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="<?php echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url() ?>assets/bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url() ?>assets/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>

<!--calendar-->
<link href='<?php echo base_url() ?>assets/fullcalendar/packages/core/main.css' rel='stylesheet' />
<link href='<?php echo base_url() ?>assets/fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
<link href='<?php echo base_url() ?>assets/fullcalendar/packages/timegrid/main.css' rel='stylesheet' />
<script src='<?php echo base_url() ?>assets/fullcalendar/packages/core/main.js'></script>
<script src='<?php echo base_url() ?>assets/fullcalendar/packages/interaction/main.js'></script>
<script src='<?php echo base_url() ?>assets/fullcalendar/packages/daygrid/main.js'></script>
<script src='<?php echo base_url() ?>assets/fullcalendar/packages/timegrid/main.js'></script>
<!--calendar-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<style>
.switch {
  position: relative;
  display: inline-block;
  width: 45px;
  height: 18px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 12px;
  width: 12px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #8DB39E;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>




<?php $actionName=$this->router->fetch_method() ?>	
	
	<script>

      
      //var basepath="http://localhost/wizwings_corp";
      var basepath=("<?php echo base_url() ?>");


			
			$('#example1').DataTable()
			$(function () {
				$('.select2').select2()
				$('#example1').DataTable()
				$('#example2').DataTable({
				  'paging'      : true,
				  'lengthChange': false,
				  'searching'   : true,
				  'ordering'    : true,
				  'info'        : true,
				  'autoWidth'   : false
				})
			 })
			
			//Date picker
				$('#datepicker,#idatepicker').datepicker({
				  autoclose: true
				})
				
				    //Date picker
                $('#frm_date,#to_date,#testimonial_date').datepicker({
                  autoclose: true
                })



        $('#datetimepicker9').datepicker({
                viewMode: "years", 
                //format: 'MM/YYYY',
                minViewMode: "years"


        });


			
			$("#chngpass").on('submit',(function(e) {
				//alert('ddd');
					e.preventDefault();
					$.ajax({
					type:'POST',
					cache: false,
					contentType: false,
					processData: false,
					url:'<?php echo base_url() ?>Admin/changePassword',
					data:new FormData(this),
					success:function(data){
						alert(data);
						jQuery("#responsepass").text("Password updated. Please logout and re-login! ");
						$("#responsepass").fadeOut(6000);
						$('#upass').val('');
					},
					
					error : function(XMLHttpRequest, textStatus, errorThrown) {
					alert(textStatus);
				}
					
				});
			 }));
			 
			 
		                
		                <?php if($actionName=='index') {?>
		                
						        <?php } ?>
		                
		                
		                <?php if($actionName=='addblogs') {?>
		                
                        var max_fields      = 10; //maximum input boxes allowed
                        var wrapper       = $("#wrap"); //Fields wrapper
                        var add_button      = $("#addmore"); //Add button ID
      
                        var x = 1; //initlal text box count
                        $(wrapper).html('');
                        $(add_button).click(function(e){ //on add input button click
                          //alert('kkkk');
                        e.preventDefault();
                        //alert("---");
                        if(x < max_fields){ 
                            $(wrapper).append('<div class="form-group col-lg-12"><input type="file" name="image[]" id="image"><a href="javascript:void(0)" id="remove_field">Remove</a></div>');

                        }

                        });  

                        $(wrapper).html('');
                          $(wrapper).on("click","#remove_field", function(e){ //user click on remove text
                          var checkstr =  confirm('Are you sure you want to delete this?');
                          if(checkstr == true){
                              // do your code
                        }else{
                            return false;
                        }
                        e.preventDefault(); 
                        $(this).parent('div').remove();
                        //$(wrapper).html('');
                        x--;
                      })  


                        		                    
		                    	$.validator.addMethod("alpha", function (value, element) {
                                    if (/^[a-zA-Z\s]+$/.test(value)) {
                                        return true;
                                    } else {
                                        return false;
                                    };
                            }, "Please provide input in alphabets only!");

                          $.validator.addMethod('filesize', function (value, element, arg) {
                            var minsize=1000; // min 1kb
                            if(element.files[0].size<=arg){
                                return true;
                            }else{
                                return false;
                            }
                          });


		                    $(function () {
                                $("#sectionfrm").validate({
                                    rules: {           
                                        'blog_title': {
                                            required: true,
                                            minlength: 10,
                                            maxlength: 70
                                            //alpha:true
                                        },

                                        'blog_description': {
                                            required: true,
                                            minlength: 20
                                            
                                            //alpha:true
                                        },
                                        
                                        'image[]': {
                                            extension: "jpg|jp?g|png|gif",
                                            filesize: 300000   //max size 300 kb
                                            
                                        }
                                        
                                    },
                                    
                                    messages: {
                                        'blog_title': {
                                              required: "Please specify a title for the blog",
                                              minlength: jQuery.validator.format("At least {0} characters required!"),
                                              maxlength: jQuery.validator.format("A maximum of 70 characters allowed.")
                                            },

                                            'blog_description': {
                                              required: "Please specify blog details.",
                                              minlength: jQuery.validator.format("At least {0} characters required!")
                                              //maxlength: jQuery.validator.format("A maximum of 70 characters allowed.")
                                            },

                                            'image[]': {
                                              extension: "File should be in jpg/png/gif format",
                                              filesize:" file size must be 300 KB or less."
                                            },
                                            
                                            
                                    },
                                    
                                    /*here*/
                                    
                                });
                            });


                            $("#sectionfrm").on('submit',(function(e) {
                                  $("#loaderimg").show();
                                  e.preventDefault();
                                  if($("#sectionfrm").valid()){     
                                      $.ajax({
                                          type:'POST',
                                          cache: false,
                                          contentType: false,
                                          processData: false,
                                          url:'<?php echo base_url() ?>index.php/Admin/processuploadBlogs',
                                          data:new FormData(this),
                                          beforeSend: function ( xhr ) {
                                                //Add your image loader here
                                                jQuery("#results").html('<img src="<?php echo base_url() ?>images/ajax-loader.gif">');
                                          },
                                          success:function(data){
                                            //alert(data);
                                            $("#results").hide();
                                            if(data==0){
                                                //$("#subjresponse").show();
                                                //$("#subjresponse").html("Details already present in records!!");
                                            }else{
                                                     
                                                 $("#subjresponse").show();
                                                 $("#subjresponse").html("Blog added Successfully");               
                                                 
                                                 $("#sectionfrm")[0].reset();
                                                 //$("#lst").load("<?php echo base_url() ?>index.php/Admin/getarticlecategoryList/");
                                                 
               
                                            } 
                                            
                                        },
                          
                          error : function(XMLHttpRequest, textStatus, errorThrown) {
                          alert(textStatus);
                        }
                          
                        });
                                 }  
                        
                        
                              }));
		                    		
						<?php } ?>

            <?php if($actionName=='editblog') {?>
                        
                        
              //delimgresponse

                      $('input:checkbox').click(function() {
                          if ($(this).is(':checked')) {
                              $('#imgbtnremove').prop("disabled", false);
                          } else {
                          if ($('.checks').filter(':checked').length < 1){
                            $('#imgbtnremove').attr('disabled',true);}
                          }
                      });







                      $("#imgbtnremove").on('click',(function(e) {
                                  $("#loaderimg").show();
                                  e.preventDefault();
                                  var selected = new Array();
                                  $('#chkbhj input[type="checkbox"]:checked').each(function() { 
                                  //$('#delimgresponse').append(', '+$(this).val());
                                  selected.push(this.value)
                                    //alert(append(', '+$(this).val());
                                  });

                                  
                                  var selection=selected.join(",");
                                  //var finalvalues = selection.replace("on", "");
                                  finalvalues=selection;
                                  //alert(finalvalues);


                          var checkstr =  confirm('Are you sure you want to delete?');
                          if(checkstr == true){
                              // do your code
                             $.ajax({
                                    type:"POST",
                                    url:"<?php echo base_url() ?>index.php/Admin/removeimages",
                                    data: {finalvalues:finalvalues},
                                    success: function (data, textStatus, jqXHR) {
                                        alert('images deleted!');
                                        location.reload();

                                    },
                                    error: function (jqXHR, textStatus, errorThrown) {      
                                        alert("some error occured->" + jqXHR.responseJSON);
                                    }
                                });   


                          }else{
                              return false;
                          }  





                                  


                                  
                       }));           












                        var max_fields      = 10; //maximum input boxes allowed
                        var wrapper       = $("#wrap"); //Fields wrapper
                        var add_button      = $("#addmore"); //Add button ID
      
                        var x = 1; //initlal text box count
                        $(wrapper).html('');
                        $(add_button).click(function(e){ //on add input button click
                          //alert('kkkk');
                        e.preventDefault();
                        //alert("---");
                        if(x < max_fields){ 
                            $(wrapper).append('<div class="form-group col-lg-12"><input type="file" name="image[]" id="image"><a href="javascript:void(0)" id="remove_field">Remove</a></div>');

                        }

                        });  

                        $(wrapper).html('');
                          $(wrapper).on("click","#remove_field", function(e){ //user click on remove text
                          var checkstr =  confirm('Are you sure you want to delete this?');
                          if(checkstr == true){
                              // do your code
                        }else{
                            return false;
                        }
                        e.preventDefault(); 
                        $(this).parent('div').remove();
                        //$(wrapper).html('');
                        x--;
                      })  


                                                
                          $.validator.addMethod("alpha", function (value, element) {
                                    if (/^[a-zA-Z\s]+$/.test(value)) {
                                        return true;
                                    } else {
                                        return false;
                                    };
                            }, "Please provide input in alphabets only!");
                          /*
                          $.validator.addMethod('filesize', function (value, element, arg) {
                            var minsize=1000; // min 1kb
                            if(element.files[0].size<=arg){
                                return true;
                            }else{
                                return false;
                            }
                          });
                          */

                        $(function () {
                                $("#sectionfrm").validate({
                                    rules: {           
                                        'blog_title': {
                                            required: true,
                                            minlength: 10,
                                            maxlength: 70
                                            //alpha:true
                                        },

                                        'blog_description': {
                                            required: true,
                                            minlength: 20
                                            
                                            //alpha:true
                                        },
                                        
                                        'image[]': {
                                            extension: "jpg|jp?g|png|gif",
                                            //filesize: 300000   //max size 300 kb
                                            
                                        }
                                        
                                    },
                                    
                                    messages: {
                                        'blog_title': {
                                              required: "Please specify a title for the blog",
                                              minlength: jQuery.validator.format("At least {0} characters required!"),
                                              maxlength: jQuery.validator.format("A maximum of 70 characters allowed.")
                                            },

                                            'blog_description': {
                                              required: "Please specify blog details.",
                                              minlength: jQuery.validator.format("At least {0} characters required!")
                                              //maxlength: jQuery.validator.format("A maximum of 70 characters allowed.")
                                            },

                                            'image[]': {
                                              extension: "File should be in jpg/png/gif format",
                                              //filesize:" file size must be 300 KB or less."
                                            },
                                            
                                            
                                    },
                                    
                                    /*here*/
                                    
                                });
                            });


                            $("#sectionfrm").on('submit',(function(e) {
                                  $("#loaderimg").show();
                                  e.preventDefault();
                                  if($("#sectionfrm").valid()){     
                                      $.ajax({
                                          type:'POST',
                                          cache: false,
                                          contentType: false,
                                          processData: false,
                                          url:'<?php echo base_url() ?>index.php/Admin/procesupdateBlogs',
                                          data:new FormData(this),
                                          beforeSend: function ( xhr ) {
                                                //Add your image loader here
                                                jQuery("#results").html('<img src="<?php echo base_url() ?>images/ajax-loader.gif">');
                                          },
                                          success:function(data){
                                            //alert(data);
                                            $("#results").hide();
                                            $("#subjresponse").show();
                                            $("#subjresponse").html("Details updated Successfully");               
                                            $("#sectionfrm")[0].reset();
                                            location.reload();
                                                 //$("#lst").load("<?php echo base_url() ?>index.php/Admin/getarticlecategoryList/");
                                            
                                        },
                          
                          error : function(XMLHttpRequest, textStatus, errorThrown) {
                          alert(textStatus);
                        }
                          
                        });
                                 }  
                        
                        
                              }));
                            
            <?php } ?>  

				</script>		