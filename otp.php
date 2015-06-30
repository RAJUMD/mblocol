<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Local Pages</title>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <style>

      #custom-btn{
        
        padding: 10px;
        background-color: rgb(4, 114, 76);
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
          <div id="ajax">
            <p></p>
          </div>
          <div data-role="main" class="ui-content">
            <div class="ui-grid-solo">
              <div class="ui-block-a">
                 <label for="pwd">Mobile:</label>
                 <input type="text" name="mobile" id="mobile" placeholder="Enter Your Mobile Number .."><br>
                 <center>
                    <a type="submit" data-role="button" id="custom-btn" value="submit" style="background: rgb(4, 114, 76);color: rgb(255, 218, 3);
                     text-shadow: none;">SEND OTP</a>
                  </center>
              </div>
              </div>
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
          </div>
        </form>
      </div> 
    </div>
  </body>
</html>
