<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <!-- All links  -->
    <?php include_once "links.php";  ?>
    <!-- Database connection -->
    <?php include_once "connection.php";  ?>
</head>

<body>
    <div class="header">
        <div class="inner-div">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="section-1-text">
                        <img src="./6.jpg" alt="">
                        <br>
                        <h2><strong>Welcome Man</strong> </h2>
                        <p>Please Enter Your Student_Id To Get Your Details.</p>
                        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi ullam officiis quos nemo quae animi sit odio, debitis, hic corrupti quisquam aspernatur voluptate qui veritatis error suscipit modi! Consequatur, quos. </p>
                    </div>

                </div>
                <div class="col-lg-7 col-md-7 col-12 ">
                    <div class="section-2-box">
                        <input type="text" placeholder="Search Student Id" id="input_search" autocomplete="off">
                    </div>

                    <div class="table">
                        <div id="table_content">

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    
    <script>
        $(document).ready(function() {

            // For fetching all details of students
            function loadtable() {
                $.ajax({
                    url: "fetch_data.php",
                    type: "POST",
                    success: function(data) {

                        if (data) {
                            $("#table_content").html(data);
                        }
                    }
                });
            };

            // calling function
            loadtable();


            // For fetching search details of student
            $('#input_search').on('keyup', function() {
                let serach_word = $(this).val();
                $.ajax({
                    url: "ajax_live_search.php",
                    type: "POST",
                    data: { search: serach_word },
                    success: function(data) {
                            $("#table_content").html(data);
                    }
                });
            });


        });
    </script>
</body>

</html>