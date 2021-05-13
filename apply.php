<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin='anonymous'>

</head>
<body>
     <!-- NavBar-->
    <?php include "./includes/db.php"; ?>
    <?php include "includes/navigation.php"?>
    <!-- Apply card-->
    <div class="row mt-5 ms-5 me-5 justify-content-sm-center d-flex">
        <div class="col-md-6" id="apply">
        </div>
        <div class="col-md-5" id="form">
            <h3 class="mt-4 mb-4" id="h3_apply">APPLY FOR THE JOB</h4>
            <form action="includes/jobApply.php" id="" class="job-form" method ='post'>
                <div class="align-middle">
                    <div class="input-group-lg mb-3">
                        <input type="text" name="name" placeholder="Name" id="name" class="form-control" autofocus required>
                    </div>
                    <div class="input-group-lg mb-3">
                        <input type="number" name="age" placeholder="Age" id="age" class="form-control" required>
                    </div>
                    <div class=" input-group-lg mb-3">
                        <input type="text" name="city" placeholder="City" id="city" class="form-control" required>
                    </div>
                    <div class=" input-group-lg mb-3">
                        <input type="number" name="contact" placeholder="Contact No" id="contact" class="form-control" required>
                    </div>
                    <div class="mb-3" id="submit">
                        <button class="apply" name='job_apply'>Apply</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- JOB-DETAILS -->
    <?php
            $id = $_SESSION['job_id'];
            $query = "SELECT * FROM job WHERE id = '$id' ";
            $result = mysqli_query($connection,$query);
            while($row = mysqli_fetch_array($result))
            {
            ?>
    <div class="job_detail">
        <div class="job_1">
            <h2 style="text-align: center;" class="job_head">JOB DETAILS</h2>
        </div>
            <div style="margin-top:30px; margin-bottom: 30px;display: flex; flex-direction: column; flex-wrap: wrap;">
                <p class="job_info">Job Title</p>
                <p class="detail_response"><?php echo $row['title']?></p>
                <p class="job_info">Job Desription</p>
                <p class="detail_response"><?php echo $row['description']?></p>
                <p class="job_info" >Preferred Gender</p>
                <p class="detail_response"><?php echo $row['gender']?></p>
                <p class="job_info">Salary</p>
                <p class="detail_response"><?php echo $row['salary']?></p>
                <p class="job_info">Location</p>
                <p class="detail_response"><?php echo $row['location']?></p>
                <p class="job_info">Pincode</p>
                <p class="detail_response"><?php echo $row['pincode']?></p>
                <p class="job_info">Start Date</p>
                <p class="detail_response"><?php echo $row['start_date']?></p>
                <p class="job_info">Duration</p>
                <p class="detail_response"><?php echo $row['duration']?></p>
                <?php } ?>
            </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
</body>
</html>