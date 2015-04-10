<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <script src="js/form.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/previewForm.css" />
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="./bower_components/bootstrap-material-design/dist/css/material-fullpalette.min.css">
  </head>
  <body>
    
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="well">
          <!-- SET FLASH MESSAGE -->
            <?php
            if ((isset($_SESSION['flash'])) && ($_SESSION['flash'] == true))
            { session_unset();
            ?>
            <div class="row">
              <div class="alert alert-dismissable alert-success">
              <button type="button" class="close" data-dismiss="alert">x</button>
                <span>Message sent successfully!!</span>
              </div>

            </div>
            <?php }
            elseif((isset($_SESSION['flash'])) && ($_SESSION['flash'] == false))
            { session_unset();
            ?>
            <div class="row">
              <div class="alert alert-dismissable alert-danger">
              <button type="button" class="close" data-dismiss="alert">x</button>
                <span>Message could not be sent</span>
              </div>
            </div>
            <?php
            }
            else{}
            ?>

            <!-- ====================== FORM START HERE ================================= -->
            <form id="mainform" class="form-horizontal" method="GET" action="./mail.php">
              <fieldset>
                <!-- Form Name -->
                <h3 align="center">Step 1</h3>
                <hr>
                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-2 control-label" for="fname">First Name:</label>
                  <div class="col-md-6">
                    <input id="fname" name="fname" placeholder="first name" class="form-control input-md" required="" type="text">
                    
                  </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-2 control-label" for="lname">Last Name:</label>
                  <div class="col-md-6">
                    <input id="lname" name="lname" placeholder="last name" class="form-control input-md" required="" type="text">
                    
                  </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-2 control-label" for="email">Email</label>
                  <div class="col-md-6">
                    <input id="email" name="email" placeholder="email" class="form-control input-md" required="" type="text">
                    
                  </div>
                </div>
                <hr>
                <h3 align="center">Step 2</h3>
                <hr>
                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-2 control-label" for="nickname">Nick Name:</label>
                  <div class="col-md-6">
                    <input id="nickname" name="nickname" placeholder="nick name" class="form-control input-md" type="text">
                    <span id="myForm"></span>
                    <span><a class="btn btn-success btn-sm" href="#"onclick="nameFunction()">Add more</a></span>
                  </div>
                </div>
                <h3 align="center">Step 3</h3>
                <hr>
                <!-- Button -->
                <div class="form-group">
                  <div class="col-md-4 col-md-offset-4">
                    <button type="submit" id="verify" name="verify" class="form-control btn btn-primary">Verify</button>
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- =========== END ================= -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="js/previewForm.js"></script>
    <script>
    $(document).ready(function() {
    $('#mainform').previewForm();
    $.material.init();
    });
    </script>
    <script src="/bower_components/bootstrap-material-design/dist/js/ripples.min.js"></script>
    <script src="/bower_components/bootstrap-material-design/dist/js/material.min.js"></script>
    <!--
    <script>
    $(document).ready(function() {
    // This command is used to initialize some elements and make them work properly
    });
    </script> -->
  </body>
</html>