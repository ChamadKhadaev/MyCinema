<?php

require "db.php";

/**
 * @param Search-4-Members;
 */


if (isset($_GET['search-members'])) {
    $filtervalues = $_GET['search-members'];
    $query = "SELECT email, firstname, lastname, city, country
    FROM `user`
    WHERE CONCAT(email, firstname, lastname, city, country) 
    LIKE '%$filtervalues%'";
    $query_run = mysqli_query($connect, $query);
  

    if (strlen($filtervalues) >= 3) {
        
        $rows = mysqli_num_rows($query_run);
        if ($rows > 0)
        {
            ?> <p><?= 'Results:' . " $rows" ?></p> <?php 
            foreach ($query_run as $items)
            {
                ?>
                    <tr>
                        <td><?= $items['email']; ?></td>
                        <td><?= $items['firstname']; ?></td>
                        <td><?= $items['lastname']; ?></td>
                        <td><?= $items['city']; ?></td>
                        <td><?= $items['country']; ?></td> 
                    </tr>
                    <?php
            }
        } 
        
        else
        {
            ?>
                <tr>
                    <td colspan="4">No Results Found</td>
                </tr>
            <?php
        }
    }
    
    else {
        ?>
         <tr>
             <td colspan="4" style="font-size: 20px;">Minimum 3 characters required</td>
       </tr>
        <?php 
    }
    
}

?>
