<!DOCTYPE html>
<html>
  <head>
    <title>Local Pages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <style>
      
      #custom-btn{
        width: 100px;
        height: 20px;
      }

      #ajax2{
        border: 1px solid rgba(215, 213, 212, 0.48);
        text-align:center;
        background-color: #D2322C;
        color: #fff;
        border-radius: 50px;
      }

    </style>
  </head>
  <body>
    <div data-role="page">
      <div data-role="header" style="background-color:#fff;">
        <center>
        	<img src="images/logo.png">
        </center>
      </div>
      <div data-role="main" class="ui-content" style="background-color:rgba(215, 213, 212, 0.48);color:black;">
        <form>
         <div class="ui-grid-solo">
            <div class="ui-block-a" >
              <div id="ajax"></div>
            <label for="name">Listing Name</label>
            <input type="text" name="listingname" id="listingname" placeholder="Your Listing Name .."><br>
            <label for="info">Address</label>
            <textarea name="address" id="address" placeholder="Your Address .."></textarea><br> 
            <label for="name">Phone Number</label>
            <input type="text" name="phone" id="phone" placeholder="Your Phone Number .."><br>
            <label for="name">Area</label>
            <select id="area">
              <option value="">select Area</option>
              <option value=""></option>
            </select><br>

            <label for="name">Category</label>
            <select id="category">
               <option>select Category</option>
               <option value=""></option>
            </select><br>
            <label for="name">Keywords</label>
            <input type="text" name="keywords" id="keywords" placeholder="Your Keywords .."><br>
            <label for="name">camera</label>
            <div>
              <input type="submit" data-inline="true" value="capture"><br><br>
            </div>
            <center>
              <img src="images/logo.png" style="height:150px;width:150px;">
            </center>
            <a href="" data-rel="popup" id="popup" data-position-to="window" data-transition="fade" class="ui-btn ui-corner-all ui-shadow ui-btn-inline">Open Dialog Popup</a>
            <div data-role="popup" id="myPopupDialog">
              <div data-role="header">
                <h1>Header Text</h1>
              </div>

              <div data-role="main" class="ui-content">
                <label for="name">Image Caption</label>
              <input type="text" name="listingname" id="listingname" placeholder="Add Caption ..">
              <a href="#" class="ui-btn  ui-btn-b" data-rel="back">Submit</a>
              </div>

              <div data-role="footer">
                <h1>Footer Text</h1>
              </div>
            </div>
          </div>
          
          
            <center>
              <input type="hidden" id="useremail" value="">
              <input type="hidden" id="Lat" value="">
              <input type="hidden" id="Lon" value="">
                <a href="" data-transition="pop" data-role="button" id="custom-btn" style="background: rgb(4, 114, 76);color: rgb(255, 218, 3);text-shadow: none;">Submit</a>
            </center>
            <br><br><br><br>
          </div>
          </div>
        </form>
      </div> 
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
      $("#useremail").val(localStorage.getItem('username'));

      $('#myPopupDialog').dialog({
                autoOpen: false,
                title: 'Basic Dialog'
            });

      $("#popup").click(function(){
        alert("amar");
        $("#myPopupDialog").dialog('open');

      });

      //dynamic drop down //

      
      $('#area').on('change', function() {
        //alert( this.value ); // or $(this).val()
        var areaname = this.value;

        $.post("processing.php",
            {
              
              area : areaname
            },
            function(data,status){
                //alert(data);
                  $('#category').html(data);
                
            });

      });

      $.ajax({
        url:'dynamicdrd.php',
        data:'',
        success:function(rslt){
          $('#area').html(rslt);
      }
      });


      //geocordinates code//

      if (navigator.geolocation) var gl = navigator.geolocation;
      if (gl) {
         gl.getCurrentPosition(function(position) {
            //alert(position.coords.latitude);
            //document.getElementById("Lat").innerHTML = position.coords.latitude;
            var latt = position.coords.latitude;
           
            document.getElementById("Lat").value = latt;
            //alert(position.coords.longitude);
            //document.getElementById("Lon").innerHTML = position.coords.longitude;
            var lont = position.coords.longitude;
            document.getElementById("Lon").value = lont;
         }, function(positionError) {
            alert(positionError.message);
         });


      }

        $("#custom-btn").click(function(){
           
            var lname = $("#listingname").val();
            var address = $("#address").val();
            var phone = $("#phone").val();
            var area = $("#area").val();
            var category = $("#category").val();
            var keywords = $("#keywords").val();
            var useremail =  $("#useremail").val();

            //alert(lname);
            //alert(address);
            //alert(phone);
            //alert(area);
            //alert(category);
            //alert(keywords);

            $.post("formprocessing.php",
            {
              email : useremail,
              listingname : lname,
              address: address,
              phone : phone,
              area : area,
              category : category,
              keywords : keywords
            },
            function(data,status){
                
                  $('#ajax').html(data);
                
            });
        });
    });
    </script>  
  </body>
</html>
