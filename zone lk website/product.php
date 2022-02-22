<?php include('partials-front/menu.php'); ?>

    <!-- product sEARCH Section Starts Here -->
    <section class="product-search text-center">
        <div class="container">
            
            <form action="<?php echo $siteurl; ?>Product-search.php" method="POST">
                <input type="search" name="search" placeholder="Search Here.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- product sEARCH Section Ends Here -->



    <!-- product MEnu Section Starts Here -->
    <section class="product-menu">
        <div class="container">
            <h2 class="text-center">All Items</h2>

            <?php 
                //display product that are active
                $sql = "SELECT * FROM tbl_product WHERE active  = 'Yes'";

                //execute the query
                $res = mysqli_query($conn,$sql);

                //count the rows
                $count = mysqli_num_rows($res);

                //check product are avialable o not
                if($count>0)
                {
                    //product available
                   while($row =mysqli_fetch_assoc($res))
                   {
                       //get the value
                       $id = $row['id'];
                       $title = $row['title'];
                       $description = $row['description'];
                       $price = $row['price'];
                       $image_name = $row['image_name'];
                       ?>

                        <div class="product-menu-box">
                            <div class="product-menu-img">
                                <?php 
                                    //check image is available o not
                                    if($image_name == "")
                                    {
                                        //image is not availble
                                        echo "<div class = 'error'>Image not available.</div>";
                                        
                                    }
                                    else
                                    {
                                        //image is avilable
                                        ?>
                                            <img src="<?php echo $siteurl; ?>images/product/<?php echo $image_name; ?>" alt="Image will be here" class="img-responsive img-curve">

                                        <?php
                                        
                                    }
                                
                                ?>
                                
                            </div>

                            <div class="product-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                    <p class="product-price">Rs.<?php echo $price; ?></p>
                                    <p class="product-detail">
                                        <?php echo $description; ?>
                                    </p>
                                <br>

                    <a href="<?php echo $siteurl; ?>order.php?product_id=<?php echo $id; ?>" class="btn btn-primary">Buy Now</a>
                </div>
            </div>


                       <?php

                   } 
                }
                else
                {
                    //product not available
                    echo "<div class='error'>Product not found</div>";
                }
            ?>

            <div class="clearfix"></div>

        </div>

    </section>
    <!-- product Menu Section Ends Here -->


    <?php include('partials-front/footer.php'); ?>
