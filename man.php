<?php

/**
 * @param CRUD Create Read Update Delete;
 */

$connect = mysqli_connect('localhost', 'hasan', 'hasan', 'cinema');
$db = new PDO(
    'mysql:host=localhost;dbname=cinema;charset=utf8',
    'hasan',
    'hasan',
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
);

// try {
//     $db = new PDO("mysql:host=localhost;dbname=cinema", ('hasan'),('hasan') );
// } catch (PDOException $e) {
//     print "Erreur :" . $e->getMessage() . "<br />";
//     die;
// }


/**
 * @param SELECT-&-BROWSE-DB Cinema;
 */
    $sqlQuery = 'SELECT * FROM `movie` WHERE rating = :rating ORDER BY rating DESC LIMIT 0, 25;';

    $recipesStatement = $db->prepare($sqlQuery);
    $recipesStatement->execute([
        'rating' => 'PG-13',
    ]);
    $recipes = $recipesStatement->fetchAll();

    foreach ($recipes as $recipe) {
        ?>
        <h1><?php echo $recipe['title']; ?></h1>
        <?php 
         ?>
         <p><?php echo $recipe['director']; ?></p>
         <?php 
    }


/**
 * @param INSERT-INTO-DB; Formula;
 */

    // Request;
    $sqlQuery = 'INSERT INTO job(name, description, salary, executive) VALUES (:name, :description, :salary, :executive)';

    //Preparation;
    $insertjob = $mysqlClient->prepare($sqlQuery);

    //Execute;
    $insertjob->execute([
        'name' => 'Cinematograficas',
        'description' => 'Cameraman',
        'salary' => 'freeguest',
        'executive' => '1',
    ]);




    // SELECT BY GENRE TITLE DISTRIBUTOR ETC.

    $query = "SELECT title, director, distributor.name, genre.genre  FROM movie
    INNER JOIN distributor ON movie.id_distributor = distributor.id
    INNER JOIN genre ON movie.id = genre.id
    WHERE CONCAT(title OR director OR distributor.name OR genre.name) LIKE '%$filtervalues%'";
?>

 <!--Navigation-->
 <nav class="navbar navbar-expand-md">
        <a class="navbar-brand" href="http://cinema/">
        </a>
        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main-navigation">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </nav> 