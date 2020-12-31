<?php
include 'db_connection.php';

ini_set('display_errors', 0);

$pineapple = new db();

if(isset($_GET['id'])) 
{
    $pineapple->delete($_GET['id']);
}

$search = $_GET['search'];


$result = $pineapple->getRecords($_GET['search'], $_GET['domain'], $_GET['sort']);
$domains = $pineapple->getDomains();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    </head>
    <style>
        html{
            min-width: 1000px;
        }
        input, button{
            padding: 10px;
        }
        table { 
            margin: 20px auto;
        }
        table, tr, td, th { 
            font-size: 1.3rem;
            border: 1.5px solid gray; 
            border-collapse: collapse;
            padding: 2px 3.5px;
            line-height: 2;
        }   
    </style>
    <body>
        <div class="box">
            <table>
                <form>
                    <tr>
                        <th colspan="3">
                            <input type="text" name="search">
                            <button type="submit">submit</button>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">
                            <?php foreach($domains as $domain) { ?>
                            <a href="?domain=<?php echo $domain['domain'];?>"><?php echo $domain['domain']; ?></a>
                            <?php } ?>
                        </th>
                    </tr>
                    <tr>
                        <th><a href="?sort=email">Email</a></th>
                        <th><a href="?sort=created_at">Subscribed at</a></th>
                        <th>Delete</th>
                    </tr>
                    <?php foreach($result as $row) { ?>
                    <tr>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td><a href="?id=<?php echo $row['id']; ?>">delete</a></td>
                    </tr>
                    <?php } ?>
                </form>
            </table>
        </div>
    </body>
</html>