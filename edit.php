<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Job</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin='anonymous'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
</head>
<body>
    <?php session_start(); ?>
    <?php include "./includes/db.php"; ?>
    <!-- NavBar-->
     <nav class="navbar sticky-top navbar-expand-lg navbar navbar-dark bg-dark" id="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.html">Aamdani</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav justify-content-evenly">
                    <a class="nav-link px-4" aria-current="true" href="index.php">Home</a>
                    <a class="nav-link px-4" href="index.php#services">Services</a>
                    <a class="nav-link px-4" href="search.php">Search</a>
                    <a class="nav-link px-4" href="dashboard.php#footer">Contact</a>
                    <a class="nav-link px-4" href="includes/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </nav> 
    
    <!-- Edit Job Form -->
    <div  class="row mt-5 ms-5 me-5 mb-5 justify-content-sm-center d-flex" style="width: 95%;">
        <div class="col-md-6" id="create-job" style="background:url('./images/img5.jpeg')">
            
        </div>
        <div class="col-md-5 " id="form">
            <h3 class="mt-4 mb-4" id="h3_create_job">EDIT JOB</h4>
        
            <form action="includes/editJob.php" id="" class="create-job-form" method="post">
                <div class="align-middle">
                <?php
                        $job_id = $job_id = $_SESSION['job_id'];
                        $query = "SELECT * FROM job WHERE id = '$job_id' ";
                        $result = mysqli_query($connection,$query);
                        while($row = mysqli_fetch_array($result))
                        {
                        ?>
                    <div class=" input-group-lg mb-3">
                        <select name="job_title" placeholder="Job Title" id="job_title" class="form-control form-select" required>
                            <option value="select">Select Job Title</option>
                            <option value="CHEF" <?php if($row['title'] == "CHEF"){echo "selected" ;} ?>>Chef</option>
                            <option value="SWEEPER" <?php if($row['title'] == "SWEEPER"){echo "selected" ;} ?>>Sweeper</option>
                            <option value="ELECTRICIAN" <?php if($row['title'] == "ELECTRICIAN"){echo "selected" ;} ?>>Electrician</option>
                            <option value="DRIVER" <?php if($row['title'] == "DRIVER"){echo "selected" ;} ?>>Driver</option>
                            <option value="PLUMBER" <?php if($row['title'] == "PLUMBER"){echo "selected" ;} ?>>Plumber</option>
                            <option value="PAINTER" <?php if($row['title'] == "PAINTER"){echo "selected" ;} ?>>Painter</option>
                            <option value="CARPENTER" <?php if($row['title'] == "CARPENTER"){echo "selected" ;} ?>>Carpenter</option>
                            <option value="MAID" <?php if($row['title'] == "MAID"){echo "selected" ;} ?>>Maid</option>
                            <option value="DAILY-WAGE" <?php if($row['title'] == "DAILY-WAGE"){echo "selected" ;} ?>>Daily Wage Worker</option>
                        </select>
                    </div>
                    <div class=" input-group-lg mb-3">
                        <select name="gender" placeholder="Gender" id="gender" class="form-control form-select" icon="fas fa-angle-down" default="<?php echo $row['gender'] ?>" required>
                            <option value="select">Select Preferred Gender</option>
                            <option value="Male" <?php if($row['gender'] == "Male"){echo "selected" ;} ?>>Male</option>
                            <option value="Female" <?php if($row['gender'] == "Female"){echo "selected" ;} ?>>Female</option>
                            <option value="NA">Not Applicable</option>
                        </select>
                    </div>
                    <div class=" input-group-lg mb-3">
                        <input type="text" name="salary" placeholder="Salary" id="salary" class="form-control" value="<?php echo $row['salary'] ?>" required>
                    </div>
                    <div class=" input-group-lg mb-3">
                        <input type="text" name="description" placeholder="Description" id="description" class="form-control" value="<?php echo $row['description'] ?>" required>
                    </div>
                    <div class=" input-group-lg mb-3">
                        <input type="text" name="location" placeholder="Location" id="pincode" class="form-control" value="<?php echo $row['location'] ?>" required>
                    </div>
                    <div class=" input-group-lg mb-3">
                        <input type="number" name="pincode" placeholder="Pincode" id="pincode" class="form-control" value="<?php echo $row['pincode'] ?>" required>
                    </div>
                    <div class=" input-group-lg mb-3">
                        <input type="text" onfocus="(this.type = 'date')" name="start_date" placeholder="Start Date (DD-MM-YYYY)" id="date" class="form-control" value="<?php echo $row['start_date'] ?>" required>
                    </div>
                    <div class=" input-group-lg mb-3">
                        <input type="text" name="duration" placeholder="Duration" id="duration" class="form-control" value="<?php echo $row['duration'] ?>" required>
                    </div>
                    <?php } ?>
                    <div class="mb-3" id="submit">
                        <button class="apply" name ="edit">Submit</button>
                    </div>
                </div>
            </form>
            
        </div>
    </div>

</body>
</html>