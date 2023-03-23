<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Group 01</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">Group 01</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="index.php">Home</a></li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="./about/about.html">About</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
        </header>
        <!-- Home Section-->
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                <!-- Home Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Home</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Home Items-->
                <div class="row justify-content-center">
                    <div class="col-12 mb-5 text-center">
                        Enter User ID into the textbox and press Submit to return User Name
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 mb-5 text-center">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <label for="uid">User ID (1-5):</label>
                            <input type="number" id="uid" name="uid" min="1" max="5"><br><br>
                            <input type="submit" value="Submit">
                        </form>
                    </div>
                </div>
                
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $servername = "localhost";
                        $username = "cen4010sp23g01";
                        $password = "Gsp#12386";
                        $dbname = "cen4010sp23g01";
                        
                        $uid = $_POST["uid"];
                    
                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT name FROM USER WHERE id = " . $uid;
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                            $uname = $row["name"];
                            }
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                    }
                ?>
                
                <div class="row justify-content-center">
                    <div class="col-12 mb-5 text-center">
                        <label for="uname">User Name:</label>
                        <input type="text" id="uname" name="uname" value="<?php echo $uname;?>" disabled><br><br>
                    </div>
                </div>
                
                <!-- About Item 5
                <div class="row justify-content-center">
                    <div class="col-3 mb-5"></div>
                    <div class="col-3 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal1">
                            <a href="./about/brojas/index.html"><img class="img-fluid" src="about\brojas\brojas.jpg" alt="..."></a>
                        </div>
                    </div>
                    <div class="col-3 mb-5">
                        <div class="portfolio-item h2 mx-auto my-3">
                            <a href="./about/brojas/index.html" class="align-middle">
                                Brandon Rojas
                            </a>
                        </div>
                        <div class="portfolio-item h4 mx-auto my-3">
                            <ul>
                                <li>Sports fanatic</li>
                                <li>Binge watcher</li>
                                <li>Beach lover</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-3 mb-5"></div>
                </div>-->
            </div>
        </section>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
