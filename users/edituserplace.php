<!--
=========================================================
* Soft UI Dashboard - v1.0.7
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
  <title>Saniya</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show bg-gray-100">
  <?php include '../api/usersidebar.php';
  sideBar('PlacementTable');
  ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm">
              <a class="opacity-5 text-dark" href="javascript:;">Pages</a>
            </li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
              Placement
            </li>
          </ol>
          <h6 class="font-weight-bolder mb-0">PLACEMENT</h6>
        </nav>
        <a class="btn bg-gradient-danger mb-0" href="../api/logout.php">&nbsp;&nbsp;logout</a>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container p-4">
      <form action="../api/updateplace.php" method="POST" enctype="multipart/form-data" onsubmit="return formValidate()">
        <div class="modal-body">
          <div id="errormsg"></div>
          <?php
          include '../api/dbcon.php';
          $pid = $_GET["pid"];
          $sql = "SELECT * FROM placement where PID=$pid";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_array($result)
          ?>
          <input type="hidden" name="type" value="user" />
          <input type="hidden" name="PID" value="<?php echo $pid ?>" />
          <input type="hidden" name="id" id="cid" />
          <input type="hidden" name="Upload" id="imageName" value="<?php echo $row["Upload"] ?>" />
          <div class="form-group">
            <label for="text1">Name of Student</label><br>
            <input type="text" class="form-control px-2" id="ename" name="StudentName" placeholder="Enter Name" value="<?php echo $row["StudentName"] ?> " />
            <br>
            <div class="form-group">
              <label for="phone">Enter Student Phone Number</label><br>
              <input type="number" class="form-control px-2" id="pid" name="Scontact" placeholder="enter number" value="<?php echo $row["Scontact"] ?> " />
            </div>
            <div class="form-group">
              <label for="year2">Year</label>
              <input type="number" class="form-control px-2" id="year2" name="Year" placeholder="Enter year" value="<?php echo $row["Year"] ?>" />
            </div>
            <div class="form-group">
              <label for="text1">Program Graduated From</label>
              <input type="text" class="form-control px-2" id="programid" name="GraduatedProgram" placeholder="enter course" value="<?php echo $row["GraduatedProgram"] ?> " /><br>

              <div class="form-group">
                <label for="text1">Name of Employer </label>
                <input type="text" class="form-control px-2" id="empid" name="EmployerName" placeholder="enter name of employer" value="<?php echo $row["EmployerName"] ?>" /><br>
                <div class="form-group">
                  <label for="phone">Enter Employer Phone Number</label><br>
                  <input type="number" class="form-control px-2" id="pid1" name="Econtact" placeholder="enter phone number" value="<?php echo $row["Econtact"] ?>" /><br>
                  <div class="form-group">
                    <label for="text1">Pay Package at Appoinment </label>
                    <input type="number" class="form-control px-2" id="payid" name="PayPackage" placeholder="enter pay package" value="<?php echo $row["PayPackage"] ?>" />
                  </div>
                  <div class="form-group">
                    <label for="file1">Upload certificate</label>
                  <input type="file" name="image" accept="image/png, image/jpeg" class="form-control" id="eimage" />
                  </div>
                </div>
                <div class="modal-footer border-top-0 d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
      </form>
    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1" />
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">
            Transparent
          </button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">
            White
          </button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">
          You can change the sidenav type just on desktop view.
        </p>
        <!-- Navbar Fixed -->
        <div class="mt-3">
          <h6 class="mb-0">Navbar Fixed</h6>
        </div>
        <div class="form-check form-switch ps-0">
          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)" />
        </div>
        <hr class="horizontal dark my-sm-4" />
        <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/soft-ui-dashboard">Free Download</a>
        <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/soft-ui-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i>
            Share
          </a>
        </div>
      </div>
    </div>
  </div>
  <script>
    const fileInput = document.getElementById("eimage");

    function imgValidate() {
      {
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
        if (!allowedExtensions.exec(filePath)) {
          fileInput.value = "";
          document.getElementById("errormsg").innerHTML = '<div class="alert alert-danger" role="alert"> It is not image file</div>'
          return false;
        }
        if (fileInput.files[0].size > 500000) {
          document.getElementById("errormsg").innerHTML = '<div class="alert alert-danger" role="alert">Uploaded image is too large</div>'
          fileInput.value = "";
          return false;
        }
        document.getElementById("errormsg").innerHTML = ""
      }

    }
    fileInput.onchange = function() {
      imgValidate()
    };

    function formValidate() {
      const stname = document.getElementById("ename");
      const phid = document.getElementById("pid");
      const year = document.getElementById("year2");
      const prograform = document.getElementById("programid");
      const empname = document.getElementById("empid");
      const empphno = document.getElementById("pid1");
      const paypackap = document.getElementById("payid");
      const choosefile = document.getElementById("eimage");
      if (stname.value == "") {
        stname.focus();
        document.getElementById("errormsg").innerHTML = '<div class="alert alert-danger text -white" role="alert">Fill The Name!</div>'
        return false;
      }
      if (phid.value == "" || phid.value.length != 10) {
        phid.focus();
        document.getElementById("errormsg").innerHTML = '<div class="alert alert-danger text -white" role="alert">Fill The Phonenumber(Max of 10)!</div>'
        return false;
      }
      if (year.value == "" || year.value.length != 4) {
        year.focus();
        document.getElementById("errormsg").innerHTML = '<div class="alert alert-danger text -white" role="alert">Fill The Year!</div>'
        return false;
      }
      if (prograform.value == "") {
        prograform.focus();
        document.getElementById("errormsg").innerHTML = '<div class="alert alert-danger text -white" role="alert">Fill The Program Graduated From!</div>'
        return false;
      }
      if (empname.value == "") {
        empname.focus();
        document.getElementById("errormsg").innerHTML = '<div class="alert alert-danger text -white" role="alert">Fill The Name Of Employer!</div>'
        return false;
      }
      if (empphno.value == "") {
        empphno.focus();
        document.getElementById("errormsg").innerHTML = '<div class="alert alert-danger text -white" role="alert">Fill The Phonenumber Of Employer!</div>'
        return false;
      }
      if (paypackap.value == "") {
        paypackap.focus();
        document.getElementById("errormsg").innerHTML = '<div class="alert alert-danger text -white" role="alert">Fill The Pay Package At Appointment!</div>'
        return false;


      }
      if (choosefile.value == "") {
        choosefile.focus();
        document.getElementById("errormsg").innerHTML = '<div class="alert alert-danger text-white" role="alert"> Select A File</div>'
        return false;
      }
    }
  </script>





  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf("Win") > -1;
    if (win && document.querySelector("#sidenav-scrollbar")) {
      var options = {
        damping: "0.5",
      };
      Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>