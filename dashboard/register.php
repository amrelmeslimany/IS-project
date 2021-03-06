<?php
session_start();
if(isset($_SESSION['ID'])){
include '../function/registerGetData.php';
include '../function/profileGetData.php';
$profile=getDataFromStudentTable($_SESSION['ID']);
$level=getLevel($_SESSION['ID']);
$rows=getData($level);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta property="og:description" content="">
    <meta name="theme-color" content="#313131">
    <meta name="msapplication-navbutton-color" content="#313131">
    <meta name="apple-mobile-web-app-status-bar-style" content="#313131">
    <title>HAKR M - Register</title>
    <link rel="shortcut icon" href="assets/fivicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="assets/fivicon.png">
    <link rel="stylesheet" href="css/libs/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Mukta+Vaani:wght@200;300;400;500;600;700;800&amp;amp;family=Oswald:wght@500;700&amp;amp;family=Roboto:wght@500&amp;amp;display=swap'" rel="stylesheet">
    <link rel="stylesheet" href="css/libs/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <!-- navbar-->
    <nav class="main-nav">
      <div class="container-fluid">
        <div class="row">
          <div class="col-4">
              <div class="pic-user">
              <a class="username-img-text" href="profile.php">
                  <img class="img-fluid rounded-circle mr-2" src="<?php echo $profile['img'];?>" alt="avataruser">
                  <small class="username-text"><?php echo $profile['name'];?></small>
              </a>
          </div>
          </div>
          <div class="col-4"><img class="text-center ml-auto mr-auto d-block" src="assets/logomain.png" width="30px" height="30px"></div>
          <div class="col-4">
            <div class="list-links-bar text-right"><i class="fas fa-bars"></i></div>
          </div>
        </div>
      </div>
    </nav>
    <main class="links-self"><i class="fas fa-times close-navbar"></i>
      <div class="catch-them"><a class="logo-link" href="profile.php"><img class="logo-link" src="assets/logomain.png" alt="hackrm"></a>
        <h2 class="head-links">Hakr <strong>M</strong></h2>
        <ul class="outer-links list-unstyled">
          <li><a class="link-item" href="profile.php">profile</a></li>
          <li><a class="link-item" href="register.php">register</a></li>
          <li><a class="link-item" href="current-term.php">current-term</a></li>
          <li><a class="link-item" href="history.php">history</a></li>
            <li><a class="link-item" href="logout.php">logout</a></li>

        </ul>
      </div><img class="tringle" src="assets/decorations/tri-01.svg">
    </main>
    <!-- Image Upload -->

    <section class="page-content">
        <form action="../function/registerSetData.php" method="post">
          <div class="row no-gutters">
            <div class="col-md-9">
              <div class="container-fluid">
                <h1 class="text-center mt-4 mb-1">Registeration</h1><small class="text-center d-block mb-3 regist-pr">Select Yes If You Will Choose This Subject</small>
                <div class="table-responsive table-register mb-2">
                  <table class="table">
                    <thead class="thead-1">
                      <tr>
                        <th>Subject</th>
                        <th>Code</th>
                        <th>Houres</th>
                        <th>Department</th>
                        <th>Choosen</th>
                      </tr>
                    </thead>
                    <tbody class="body-rable-rgs">
                    <?php
                    foreach ($rows as $row) {
                           if ($row['Prerequisite_code'] == "0") {
                                echo "<tr>";
                                echo "<td class='text-uppercase'>";
                                echo $row['name'];
                                echo "</td>";
                                echo "<td class='text-uppercase'>";
                                echo $row['code'];
                                echo "</td>";
                                echo "<td class='text-uppercase'>";
                                echo $row['Credithours'];
                                echo " </td>";
                                echo "<td class='text-uppercase'>";
                                echo $row['codpart'];
                                echo " </td>";
                                echo "<td>
                                              <input class='choose-subject' type='checkbox' value='" . $row['code'] . "' name='select[]'>
                                            </td>
                                          </tr>";
                            }
                        if ($row['Prerequisite_code'] != "0" && $row['score']>=45 ) {
                            echo "<tr>";
                            echo "<td class='text-uppercase'>";
                            echo $row['name'];
                            echo "</td>";
                            echo "<td class='text-uppercase'>";
                            echo $row['code'];
                            echo "</td>";
                            echo "<td class='text-uppercase'>";
                            echo $row['Credithours'];
                            echo " </td>";
                            echo "<td class='text-uppercase'>";
                            echo $row['codpart'];
                            echo " </td>";
                            echo "<td>
                                              <input class='choose-subject' type='checkbox' value='" . $row['code'] . "' name='select[]'>
                                            </td>
                                          </tr>";
                        }

                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                <div class="buttons mb-4 clearfix">
                  <button class="btn submit-subjects" type="submit"><i class="fas fa-paper-plane mr-2"></i><span>Submit</span></button><a class="btn current-pg float-right" href="current-term.php"><i class="fas fa-list mr-2"></i><span>Current Term</span></a>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="help-part text-center">
                <div class="catch-them">
                  <h3 class="mb-4">Helps</h3>
                  <ul class="list-unstyled helps-self">
                    <li class="bx-hp p-1">
                      <h5 class="pt-2">Help 1</h5>
                      <p>Here is the help paragraph</p>
                    </li>
                    <li class="bx-hp p-1">
                      <h5 class="pt-2">Help 2</h5>
                      <p>Here is the help paragraph</p>
                    </li>
                    <li class="bx-hp p-1">
                      <h5 class="pt-2">Help 3</h5>
                      <p>Here is the help paragraph</p>
                    </li>
                    <li class="bx-hp p-1">
                      <h5 class="pt-2">Help 4</h5>
                      <p>Here is the help paragraph</p>
                    </li>
                    <li class="bx-hp p-1">
                      <h5 class="pt-2">Help 5</h5>
                      <p>Here is the help paragraph</p>
                    </li>
                  </ul>
                  <div class="social-icons"><i class="fab fa-facebook mr-2"></i><i class="fab fa-instagram mr-2"></i><i class="fab fa-twitter mr-2"></i></div>
                </div><img src="assets/decorations/tri-01.svg" id="tringle-1">
              </div>
            </div>
          </div>
        </form>
    </section>
    <!-- Scripts-->
    <script src="js/libs/jquery-3.5.1.min.js"></script>
    <script src="js/libs/bootstrap.min.js"></script>
    <script src="js/libs/bootstrap-checkbox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>
<?php
}else{
    header("location:../index.php");
}
?>