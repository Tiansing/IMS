<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<style>
  #clock {
    font-size: 20px;
    font-weight: bold;
    text-align: center;
  }
</style>
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container-fluid">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="#"><b>Yuan Rose</b></a>
      <div class="nav-collapse collapse">
        <ul class="nav pull-right">
          <li><a><i class="icon-user icon-large"></i> Welcome:<strong> <?php echo $_SESSION['SESS_LAST_NAME']; ?></strong></a></li>
          <li><a> <i class="icon-calendar icon-large"></i>
              <?php
              $Today = date('y:m:d', time());
              $new = date('l, F d, Y', strtotime($Today));
              echo $new;
              ?> |

            </a></li>
          <li> <a href="" id="clock"></a></li>
          <li><a href="../index.php">
              | <font color="yellow"><i class="icon-off icon-large"></i></font> Log Out
            </a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>
<script>
  function updateClock() {
    var now = new Date();
    var hours = now.getHours();
    var ampm = hours >= 12 ? 'PM' : 'AM'; // Set AM/PM based on whether the hour is greater than or equal to 12
    hours = hours % 12; // Convert hour to 12-hour format
    hours = hours ? hours : 12; // Set hour to 12 if it's currently 0 (which corresponds to midnight in a 24-hour format)
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    var timeString = hours.toString().padStart(2, '0') + ':' +
      minutes.toString().padStart(2, '0') + ':' +
      seconds.toString().padStart(2, '0') + ' ' + ampm; // Concatenate hour, minute, second, and AM/PM indicator
    document.getElementById("clock").innerHTML = timeString; // Update the clock display
  }

  // Update the clock every second
  setInterval(updateClock, 1000);
</script>