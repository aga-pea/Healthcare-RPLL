<!DOCTYPE html>
<html lang="en">

@include('subs.meta-head')

<style>
  span.role-icon
  {
    display:inline-block;
    padding:30px;
  }
</style>

<body onload="getTime()">
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div class="container">
    <div id="showtime"></div>
    <!-- <div class="col-lg-4 col-lg-offset-4"> -->
    <div class="lock-screen">
      <div>
        <span class="role-icon">
          <h2><a data-toggle="modal" href="{{url('/patient_login')}}"><i class="fa fa-group"></i></a></h2>
          <p>Patient Login</p>
        </span>
        <span class="role-icon">
          <h2><a data-toggle="modal" href="{{url('/doctor_login')}}"><i class="fa fa-stethoscope"></i></a></h2>
          <p>Doctor Login</p>
        </span>
        <span class="role-icon">
          <h2><a data-toggle="modal" href="{{url('/receiptionist_login')}}"><i class="fa fa-handshake-o"></i></a></h2>
          <p>Receiptionist Login</p>
        </span>
        <span class="role-icon">
          <h2><a data-toggle="modal" href="{{url('/warehouse_login')}}"><i class="fa fa-archive"></i></a></h2>
          <p>Warehouse Login</p>
        </span>
        <span class="role-icon">
          <h2><a data-toggle="modal" href="{{url('/cashier_login')}}"><i class="fa fa-money"></i></a></h2>
          <p>Cashier Login</p>
        </span>                
      </div>
      <!-- Modal -->
    </div>
    <!-- /lock-screen -->
    <!-- </div> -->
    <!-- /col-lg-4 -->
  </div>
  <!-- /container -->
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="{{asset('assets/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/lib/bootstrap/js/bootstrap.min.js')}}"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="{{asset('assets/lib/jquery.backstretch.min.js')}}"></script>
  <script>
    $.backstretch("assets/img/login-bg.jpg", {
      speed: 500
    });
  </script>
  <script>
    function getTime() {
      var today = new Date();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      // add a zero in front of numbers<10
      m = checkTime(m);
      s = checkTime(s);
      document.getElementById('showtime').innerHTML = h + ":" + m + ":" + s;
      t = setTimeout(function () {
        getTime()
      }, 500);
    }

    function checkTime(i) {
      if (i < 10) {
        i = "0" + i;
      }
      return i;
    }
  </script>
</body>

</html>