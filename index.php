<?php
require "./php_search_db/db.php"; 
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <link rel="stylesheet" type="text/css" href="main.css">

    <!--Bootstrap CSS-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="./startbootstrap-grayscale-gh-pages/startbootstrap-grayscale-gh-pages/css/styles.css" rel="stylesheet" />

    <!--Ajax Tables-->
    <link href="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.css" rel="stylesheet">


</head>

<body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="http://cinema/"><img class="logo" id="logoepitech"src="./img/LOGO-WEBACADEMIE-2019-QUADRI-2048x367.png" alt="logo"
                width="auto" height="50"/></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto" id="navbar-gap">
                        <li class="nav-item"><a class="nav-link" id="nav-item-link-color-text" href="./crud_ajax/index.php">Sign Up</a></li>
                        <li class="nav-item"><a class="nav-link" id="nav-item-link-color-text" href="./startbootstrap-grayscale-gh-pages/startbootstrap-grayscale-gh-pages/index.html">Projects</a></li>
                        <li class="nav-item"><a class="nav-link" id="nav-item-link-color-text" href="./startbootstrap-grayscale-gh-pages/startbootstrap-grayscale-gh-pages/index.html#signup">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
     
    <main>
    <!--Search for Movie Title, Distributor, Director, Release_Date, Genre, Rating-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card my-4">
                    <div class="card-header">
                        Welcome to the Movie Space
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <!--Search box-->
                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required
                                         value="<?php if (isset($_GET["search"])) {echo $_GET["search"];} ?>"
                                         class="form-control" placeholder="Search movie"/>
                                        <button type="sumbit" class="btn btn-primary">Search</button> 
                                    </div>
                                </form>

                                <!--Dropdown category-->
                                <p>
                                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    Category List
                                    </a>
                                </p>
                                <div class="collapse" id="collapseExample">
                                    <div class="card card-body">
                                        Write in search box following category to search for a film with desired genre.
                                        <strong>
                                            Action, Adventure, Animation, Drama, Comedy, Mystery,
                                            Biography, Crime, Fantasy, Horror, Sci-Fi, Romance, Family, Thriller.
                                        </strong>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!--GET results-->
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-body">
                        <table class="table table-striped table-bordered table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>title</th>
                                    <th>director</th>
                                    <th>distributor</th>
                                    <th>release_date</th>
                                    <th>genre</th>
                                    <th>rating</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                <?php
                                    require './php_search_db/search-movies.php';
                                ?>
                                <?php
			 
                                if(isset($results) && count( $results->data ) > 0){
                                
                                for( $i = 0; $i < count( $results->data ); $i++ ) { ?>
                                <tr>
                                <td><?php echo $results->data[$i]['title']; ?></td>
                                <td><?php echo $results->data[$i]['director']; ?></td>
                                <td><?php echo $results->data[$i]['name']; ?></td>
                                <td><?php echo $results->data[$i]['release_date']; ?></td>
                                <td><?php echo $results->data[$i]['name']; ?></td>
                                <td><?php echo $results->data[$i]['rating']; ?></td>
                                </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>  

                </div>
            </div>
        </div>
    </div>


    <!--Search for Members-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card my-4">
                    <div class="card-header">
                        Welcome to the Movie Space. 
                       <strong> Discover our Members </strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <!--Search box-->
                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search-members" required
                                         value="<?php if (isset($_GET["search-members"])) {echo $_GET["search-members"];} ?>"
                                         class="form-control" placeholder="Search for Members"/>
                                        <button type="sumbit" class="btn btn-primary">Search</button> 
                                    </div>
                                </form>
                            </div>

                             <!--Dropdown List-->
                             <p>
                                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Info List
                                </a>
                            </p>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                    Search for Members by Name, City, Country, @mail if you know one etc.
                                    <strong>
                                        Ex's: Diaz, Nice(city), France etc.
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!--GET Members results-->
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover table-responsive "
                            id="table"                      
                            data-toggle="table"
                            data-height="460"
                            data-ajax="ajaxRequest"
                            data-search="true"
                            data-side-pagination="server"
                            data-pagination="true"> 
                            <!--Ajax Tables-->
                        <thead>
                            <tr>
                                <th data-field="email"> email</th>
                                <th data-field="firstname"> firstname</th>
                                <th data-field="lastname"> lastname</th>
                                <th data-field="city"> city</th>
                                <th data-field="country"> country</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                           require './php_search_db/search-members.php'; 
                           ?>
                        </tbody>
                    </table>
                    <script>
                    // your custom ajax request here
                        function ajaxRequest(params) {
                            var url = 'https://examples.wenzhixin.net.cn/examples/bootstrap_table/data'
                            $.get(url + '?' + $.param(params.data)).then(function (res) {
                            params.success(res)
                            })
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
    </main>

    <footer class="footer bg-light small text-center text-white-50" style="margin-top: 5%;">

        <div class="container px-4 px-lg-5">
            <a href="https://www.epitech.eu/en/" target="_blank">
                <img class="logo" id="logoepitech-footer"src="./img/LOGO-WEBACADEMIE-2019-QUADRI-2048x367.png" alt="logo"
                    width="auto" height="80" />
            </a>
        </div>

    </footer>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

    <!--Bootstrap JS-->
    <script src="bootstrap-5.2.0-beta1-dist/js/bootstrap.min.js"></script>
    <!--Main JS-->
    <script src="main.js"></script>
    <!--Ajax JS-->
    <script src="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.js"></script>
</body>
</html>