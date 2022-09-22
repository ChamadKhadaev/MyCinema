<?php

require "db.php";
include './php_search_db/page.php';

/**
 * @param Search-4-Title--Director--Distrib.Name--Release_Date--Genre.Category;
 */
    

// Launch Search;

if (isset($_GET['search'])) {
    $filtervalues = $_GET['search'];
    //DEFINE LIMIT for PER PAGE now 25 is page limit
    $limit      = (isset($_GET['limit'])) ? $_GET['limit'] : 10;

    //DEFAULT PAGE NUMBER if No page in url
    $page       = (isset($_GET['page'])) ? $_GET['page'] : 1;

    //Number of frequency links to show at one time ;
    $links      = (isset($_GET['links'])) ? $_GET['links'] : 7;

    //your query here in query varriable


    $query = "SELECT title, director, distributor.name, release_date, genre.category, rating
    FROM `movie` 
    INNER JOIN genre ON movie.id_genre = genre.id
    INNER JOIN distributor ON movie.id_distributor = distributor.id 
    WHERE CONCAT(title,director,distributor.name, release_date, genre.category, rating)  
    LIKE '%$filtervalues%' ";
    $query_run = mysqli_query($connect, $query);

    //create a paging class object with connection and query parameters
    $Paginator  = new Paginator($connect, $query);
    //get the results from paginator class
    $results    = $Paginator->getData($limit, $page);
    ?>
    <?php
    ?>
    <p>
        <?=
        $Paginator->createLinks( $links, $class="pagination");?>
    </p>

    
        <?php
}
    

/*
    if (strlen($filtervalues) >= 3) {
        $rows = mysqli_num_rows($query_run);
        if ($rows > 0) {
            ?> <p><?= 'Results:' . " $rows" ?></p> <?php
            foreach ($query_run as $items) {
                ?>
                    <tr>
                        <td><?= $items['title']; ?></td>
                        <td><?= $items['director']; ?></td>
                        <td><?= $items['name']; ?></td>
                        <td> 
                                <?= substr($items['release_date'], 0, 10); ?> <!--date format: YYYY-MM-DD: -->
                        </td>
                        <td><?= $items['category'] ?></td> 
                        <td><?= $items['rating'] ?></td> 
                    </tr>
                    <?php
            }
        } else {
            ?>
                <tr>
                    <td colspan="4">No Results Found</td>
                </tr>
            <?php
        }
    } else {
        ?>
         <tr>
             <td colspan="4" style="font-size: 20px;">Minimum 3 characters required</td>
       </tr>
        <?php
    }
}
    */
    ?>