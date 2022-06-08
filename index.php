<?php
  include("core/init.php");
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax Address Book | Welcome</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/custom.css">
  </head>
<body>
  <div class="grid-container">
    <div class="grid-x grid-padding-x"><!-- row -->
      <div class="large-6 cell">
        <h1>Ajax Address Book</h1>
      </div>
      <div class="large-6 cell">
        <a class="add-btn button float-right small" data-open="addModal">Add Contact</a>
        <div id="addModal" class="reveal" data-reveal>
          <h2>Add Contact</h2>
          <form id="addContact" action="#" method="post">
            <div class="grid-x grid-padding-x"><!-- row -->
              <div class="large-6 cell">
                <label>First Name
                  <input type="text" name="first_name" placeholder="Enter First Name" />
                </label>
              </div>
              <div class="large-6 cell">
                <label>Last Name
                  <input type="text" name="last_name" placeholder="Enter Last Name" />
                </label>
              </div>
            </div>
            <div class="grid-x grid-padding-x"><!-- row -->
              <div class="large-4 cell">
                <label>E-mail
                  <input type="email" name="email" placeholder="Enter E-mail Address" />
                </label>
              </div>
              <div class="large-4 cell">
                <label>Phone Number
                  <input type="text" name="phone" placeholder="Enter Phone Number" />
                </label>
              </div>
              <div class="large-4 cell">
                <label>Contact Group
                  <select name="contact_group">
                    <option value="husker">Family</option>
                    <option value="starbuck">Friends</option>
                    <option value="hotdog">Business</option>
                  </select>
                </label>
              </div>
            </div>
            <div class="grid-x grid-padding-x"><!-- row -->
              <div class="large-6 cell">
                <label>Address 1
                  <input type="text" name="address1" placeholder="Enter Address 1" />
                </label>
              </div>
              <div class="large-6 cell">
                <label>Address 2
                  <input type="text" name="address2" placeholder="Enter Address 2" />
                </label>
              </div>
            </div>
            <div class="grid-x grid-padding-x"><!-- row -->
              <div class="large-4 cell">
                <label>City
                  <input type="text" name="city" placeholder="Enter City" />
                </label>
              </div>
              <div class="large-4 cell">
                <label>State
                  <select name="state">
                    <option>Select State</option>
                    <?php
                      foreach($states as $key => $value){
                    ?>
                      <option value="<?php echo $key; ?>">
                      <?php echo $value; ?>
                      </option>
                    <?php
                      }
                    ?>
                  </select>
                </label>
              </div>
              <div class="large-4 cell">
                <label>Zipcode
                  <input type="text" name="zipcode" placeholder="Enter Zipcode" />
                </label>
              </div>
            </div>
            <div class="grid-x grid-padding-x"><!-- row -->
              <div class="large-12 cell">
                <label>Notes
                  <textarea name="notes" placeholder="Enter Optional Notes"></textarea>
                </label>
              </div>
            </div>
            <input type="submit" name="submit" class="add-btn button float-right small" value="Add" />
            <a class="close-button" data-close>&times;</a>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Loading image -->
  <div id="loaderImage">
	<img src="img/ajax-loader.gif" />
  </div>
  
  <!-- Main content -->
  <div id="pageContent">
    
  </div>
  
<script src="js/vendor.js"></script><!-- jQuery -->
<script src="js/script.js"></script>
<script src="js/foundation.js"></script>
<script language="javascript">
  var popup = new Foundation.Reveal($('#addModal'));
  $(".add-btn").click(function(){
    popup.open();
  });
  //vendorTeszt();
  //foundationTeszt();
</script>
</body>
</html>