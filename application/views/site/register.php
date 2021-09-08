<?php
//print_r($roles);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>:Registration:</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/iCheck/square/blue.css">
  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    GEOXIS
    
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">
        <strong><?php echo $this->Common_model->userGreetings()?> !</strong>
        <br>
        Register your users here!
    </p>

    <div class="alert alert-success alert-dismissible" id="successful-registration" style="display: none;">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  Registration Successful!
</div>

<div class="alert alert-danger alert-dismissible" id="errordiv" style="display: none;">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  User Already Present!
</div>


    <form autocomplete="off" id="frm1" name="frm1">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div> 
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div> 
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="uname" id="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="upass" id="upass" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
          <div class="form-group">
                  
                  <select class="form-control" placeholder='Roles' id="roles" name="roles" required="required">
                    <option value=''>Choose a role</option>
                    <?php foreach($roles as $role) {?>
                        <option value='<?php echo $role['id'] ?>'><?php echo $role['role_type'] ?></option>
                    <?php } ?>
                  </select>
                </div>


      </div>  
      <div class="row">
        <!--<div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>-->
        <!-- /.col -->
        <div class="col-xs-4">
          <!--<button type="button" class="btn btn-primary btn-block btn-flat">Sign In</button>-->
          <input type="submit" value="Register" id="" class="btn btn-primary">   
        </div> | &nbsp; <a href='<?php echo base_url() ?>index.php/admin/adminlogin'>Admin Login</a>&nbsp; | &nbsp; <a href='<?php echo base_url() ?>index.php/user/userlogin'>User Login</a>
        <!-- /.col -->
      </div>
      <div id='results'></div>
    </form>
    <!--<a href="#">I forgot my password</a><br>-->
    </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
<script>

$(document).ready(function(jQuery){

      //alert('free');

      $.validator.addMethod("alpha", function (value, element) {
                                    if (/^[a-zA-Z\s]+$/.test(value)) {
                                        return true;
                                    } else {
                                        return false;
                                    };
      }, "Please provide input in alphabets only!");

      $.validator.addMethod("cemail", function (value, element) {
                                    if (/^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(value)) {
                                        return true;
                                    } else {
                                        return false;
                                    };
      }, "Please provide a valid email address!");
  

      $(function () {

          $("#frm1").validate({

              rules: {           
                                        first_name: {
                                            required: true,
                                            minlength: 2,
                                            maxlength: 70,
                                            alpha:true
                                        },
                                        
                                        last_name: {
                                            required: true,
                                            minlength: 2,
                                            maxlength: 70,
                                            alpha:true
                                        },
                                        
                                        uname: {
                                            required: true,
                                            cemail:true
                                            
                                        },

                                        upass: {
                                            required: true,
                                            minlength: 6,
                                            maxlength: 20
                                            
                                        },
                                        roles: {
                                            required: true
                                            
                                            
                                        }
                                        
                                        
                                    },
                                    
                                    messages: {
                                            first_name: {
                                              required: "Please Enter your First Name.",
                                              minlength: jQuery.validator.format("At least {0} characters required!"),
                                              maxlength: jQuery.validator.format("A maximum of 70 characters allowed.")
                                            },
                                            
                                            last_name: {
                                              required: "Please Enter your Last Name.",
                                              minlength: jQuery.validator.format("At least {0} characters required!"),
                                              maxlength: jQuery.validator.format("A maximum of 70 characters allowed.")
                                            },
                                            
                                            uname: {
                                              required: "Please Enter your email address."
                                            },

                                            upass: {
                                              required: "Please Enter password.",
                                              minlength: jQuery.validator.format("Password should be at least {0} characters!"),
                                              maxlength: jQuery.validator.format("A maximum of 20 characters allowed.")
                                            },

                                            roles: {
                                              required: "Choose a role",
                                              //minlength: jQuery.validator.format("Password should be at least {0} characters!"),
                                              //maxlength: jQuery.validator.format("A maximum of 20 characters allowed.")
                                            }
                                            
                                            
                                    },


                                    submitHandler: function (form) {
                                        $('#results').show();
                                        $('#results').html('<img src="<?php echo base_url() ?>images/ajax-loader.gif">');
                                        $.post('<?php echo base_url() ?>index.php/Site/processRegistration', 
                                        
                                        $("#frm1").serialize(), function (data) {
                                            $('#results').hide();
                                            
                                            if(data==0){
                                                $("#errordiv").show();
                                                $("#successful-registration").hide();
                                            }else{
                                                $("#errordiv").hide();
                                                //$("#container-signup").hide();
                                                $("#successful-registration").show();
                                                $("#frm1")[0].reset();
                                                
                                            }
                                        });
                                        return false; // <- last item inside submitHandler function
                                    }
                               // });
                                    




          }); //end
                                    

    });


});





</script>






</body>
</html>
