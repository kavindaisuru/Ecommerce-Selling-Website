<?php include('partials/menu.php'); ?>

    <!--menu content start-->
    <div class="main-content">
        <div class="wrapper">
            <h1>Dashboard</h1>

            <br><br>

            <?php 
             /*   if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login']; //disaplay meaaage
                    unset($_SESSION['login']); //remove messge
                } 
                */
            ?>
            <br><br>


                <div class="col-4 text-center">

                    <?php
                        $sql = "SELECT * FROM tbl_category";
                        //execute query
                        $res = mysqli_query($conn,$sql);
                        //count rows
                        $count = mysqli_num_rows($res);
                    ?>

                    <h1><?php echo $count; ?></h1>
                    <br>
                        Categories
                </div>



                <div class="col-4 text-center">

                    <?php
                        $sql2 = "SELECT * FROM tbl_product";
                        //execute query
                        $res2 = mysqli_query($conn,$sql2);
                        //count rows
                        $count2 = mysqli_num_rows($res2);
                    ?>

                    <h1><?php echo $count2; ?></h1>
                    <br>
                        Products
                </div>



                <div class="col-4 text-center">
                    <?php
                        //sql query
                        $sql3 = "SELECT * FROM tbl_order";
                        //execute query
                        $res3 = mysqli_query($conn, $sql3);
                        //count rows
                        $count3 = mysqli_num_rows($res3);
                    ?>
                    <h1><?php echo $count3; ?></h1>
                    <br>
                        Total Orders
                </div>


                <div class="col-4 text-center">

                    <?php
                        //create sql query get revenue
                        //aggregate function in sql
                        $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status = 'Deliverd'";

                        //execute query
                        $res4 = mysqli_query($conn,$sql4);

                        //get the value
                        $row4 = mysqli_fetch_assoc($res4);

                        //get the total revenue
                        $total_revenue = $row4['Total'];
                    ?>

                    <h1><?php 
                        //check total revenue is zero(Rs.0)
                        if($total_revenue == 0)
                        {
                            //display revenue is Rs.0
                            echo "Rs.0"; 
                        }
                        else
                        {
                            //display total revenue
                            echo "Rs.$total_revenue";
                        }
                    //echo $total_revenue;
                    
                        ?>
                    </h1>
                    <br>
                        Revenue Generated
                </div>

                <div class="clearfix"></div>
        </div>
    </div>
    <!--end-->

<?php include('partials/footer.php');?>