<?php
    function getTopicsByCategories($topics){
        $topics_per_category = array();
        foreach ($topics as $key => $value) {
            if($topics_per_category[$value["category"]] == NULL)
                $topics_per_category[$value["category"]] = array();
            array_push($topics_per_category[$value['category']],$value);
        }
        return $topics_per_category;
    }

    function getCategories($conn){
        $stmt = $conn->prepare("SELECT id,name FROM Category ORDER BY id ASC");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data =  $stmt->fetchAll();  
        return $data;
    }

    function getTopics($conn){
        $stmt = $conn->prepare("SELECT id,name,category FROM Topic ORDER BY category,id ASC");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data =  $stmt->fetchAll();  
        return $data;
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=test", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $categories = getCategories($conn);
        $topics = getTopicsByCategories(getTopics($conn));
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://localhost/newsite101/css/main.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>CommissionX</title>
</head>
<body>
    <div class="container-fuild">
         <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-white">
            <div class="container p-4">
                    <a href="#" class="navbar-brand"><p class="display-6">CommissionX</p></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navy">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                
                <div class="collapse navbar-collapse justify-content-center" id="navy">
                    <ul class="navbar-nav">
                        <li class="nav-item mx-3 p-2">
                            <a href="#library" class="nav-link text-dark"><b>My Library</b></a>
                        </li>
                        <li class="nav-item mx-2 p-2">
                            <a href="#support" class="nav-link  text-dark"><b>Support</b></a>
                        </li>
                        <li class="nav-item mx-2 p-2">
                            <a href="#book_a_call" class="nav-link text-dark"><b>Book A Call</b></a>
                        </li>
                        <li class="nav-item mx-2 p-2">
                            <a href="#logout" class="nav-link text-dark"><b>Logout</b></a>
                        </li>
                        <li class="nav-item mx-2">
                            <a href="#logout"  type="button" class="text-light border px-4 py-3 border-black rounded-1 btn btn-warning btn-md"><b>DFY COMPAIN</b></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="border-bottom border-3"></div>
        <div class="container px-5">
            <div class="row d-flex pt-5 justify-content-center">
                <div class="col-lg-5 pt-3 px-5">
                    <div class="accordion" id="menu-sidebar">
                            <?php 
                            foreach ($categories as $key => $value) { ?>
                                <div id=<?php echo $value['id']; ?> class="accordion-item">
                                    <h3 class="accordion-header">
                                        <button class="accordion-button bg-warning text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $value['id']; ?>" aria-expanded="true" aria-controls="collapseOne">
                                            <b><?php 
                                                 echo $value['name'];
                                                ?>
                                            </b>
                                        </button>
                                    </h3>
                                    <div id="collapse<?php echo $value['id']; ?>" class="accordion-collapse collapse show">
                                        <div class="accordion-body">    
                                            <div class="card-body">
                                            <div class="list-group list-group-flush">
                                                <?php foreach($topics[$value['id']] as $key => $value) { ?>
                                                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                                        <?php echo $value["name"]; ?>
                                                        <i class='fas'>&#xf105;</i>
                                                    </a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>           
                            <?php  } ?>
                    </div>
                    <form action="index.php" method="post" class="container mt-3">
                        <input id="search_course" name="search" type="text" class="form-control" onkeyup="FilterCategories()" placeholder="Search through the course..." >
                    </form>
                </div>
                <div class="col-md-12 col-lg-7 pt-3">
                    <!-- Title Section -->
                    <div class="card bg-warning text-white">
                        <div class="card-body text-center">
                          <h2 class="border-bottom p-4"><b>Getting started</b></h2>
                        </div>
                    </div>
                    <div class="container m-3">
                        <!-- Video Section -->
                        <video controls>
                            <source src="https://www.youtube.com/watch?v=R6S-b_k-ZKY&ab_channel=Fireship" type="video/mp4">
                          Your browser does not support the video tag.
                          </video>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
