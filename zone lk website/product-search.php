<?php include('partials-front/menu.php'); ?>


    <!-- product sEARCH Section Starts Here -->
    <section class="product-search text-center">
        <div class="container">
            
            <form action="<?php echo $siteurl; ?>product-search.php" method="POST">
                <input type="search" name="search" placeholder="Search Here..." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- product sEARCH Section Ends Here -->

    <!-- product sEARCH Section Starts Here -->
    <section class=" text-center">
        <div class="container">

        <?php
                    
            //get the search keyword
            $search = $_POST['search'];
        
        ?>
            <h2>Item on Your Search <a href="#" >"<?php echo $search; ?>"</a></h2>
            <!--class="text-white" -->
        </div>
    </section>
    <!-- product sEARCH Section Ends Here -->



    <!-- product MEnu Section Starts Here -->
    <section class="product-menu-text-color">
        <div class="container">
           <!-- <h2 class="text-center">product Menu</h2> -->

            <?php


                //sql query get product on searched keyword
                $sql = "SELECT * FROM tbl_product WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

                //execute the query
                $res = mysqli_query($conn,$sql);

                //count rows
                $count = mysqli_num_rows($res);

                //check product available o not
                if($count>0)
                {
                    //product available
                    while($row =mysqli_fetch_assoc($res))
                    {
                        //get the detils
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $desciprion = $row['description'];
                        $image_name = $row['image_name'];
                        ?>

                                <div class="product-menu-box">
                                    <div class="product-menu-img">
                                        <?php 
                                            //check image name is available or not
                                            if($image_name == "")
                                            {
                                                //image not available
                                                echo "Image Not Available";
                                            }
                                            else
                                            {
                                                //image available
                                                ?>
                                                    <img src="<?php echo $siteurl; ?>images/product/<?php echo $image_name; ?>" alt="image name" class="img-responsive img-curve">
                                                <?php

                                            }
                                        ?>
                                    </div>

                                    <div class="product-menu-desc">
                                        <h4><?php echo $title; ?></h4>
                                        <p class="product-price">Rs.<?php echo $price; ?></p>
                                        <p class="product-detail">
                                            <?php echo $desciprion; ?>
                                        </p>
                                        <br>

                                        <a href="#" class="btn btn-primary">Buy Now</a>
                                    </div>
                                </div>

                        <?php
                    }
                }
                else
                {
                    //product not availble
                    echo "Product Not Found";
                }            
            ?>

            <div class="clearfix"></div>

        </div>

    </section>
    <!-- product Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>
