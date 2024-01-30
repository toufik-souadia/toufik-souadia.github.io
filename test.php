<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 5 Center Navbar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<style>
    .navbar {
        margin: 0 auto;
    }
</style>
</head>
<body>
    <div class="mx-5">
        <nav class="row d-flex p-5 justify-content-center navbar navbar-expand-lg navbar-light bg-light">
                    <div class="col-lg-5 pt-3 px-5">
                        <a class="navbar-brand" href="#">My Website</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <div class="col-md-12 col-lg-7 px-5 collapse navbar-collapse border"  id="navbarSupportedContent">
                        <ul class="navbar-nav mb-lg-0">
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
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
    </div>
   
    <div class="border border-bottom">
    </div>
    <div class="row d-flex p-5 justify-content-center">
				<!-- Side Bar Menu -->
				<div class="col-lg-5 pt-3 px-5">
						<form action="index.php" method="post" class="container mt-3">
							<input id="search_course" name="search" type="text" class="form-control" onkeyup="FilterCategories()" placeholder="Search through the course..." >
						</form>
				</div>
				<!-- Main content -->
				<div class="col-md-12 col-lg-7 px-5">
                    <div class="card bg-warning text-white">
                        <div class="card-body text-center">
                            <h2 class="border-bottom p-4">
                                <b>
                                    Getting Started
                                </b>
                            </h2>
                        </div>
                    </div>
				</div>
        	</div>				
</body>
</html>