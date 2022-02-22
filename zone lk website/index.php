<?php include('partials-front/menu.php') ?>

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

    <?php
    
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset ($_SESSION['order']);
        }
    
    ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Products</h2>

            <?php 
                //create sql query to diplay  category from db
                $sql = "SELECT * FROM tbl_category WHERE active = 'Yes' AND featured = 'Yes' LIMIT 3";
                //execute the query
                $res = mysqli_query($conn,$sql);
                //count rows to check the cateogry is availabe o not
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    //category availabe
                    while($row = mysqli_fetch_assoc($res))
                    {
                        //get the value title, id, image name
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>

                        <a href="<?php echo $siteurl; ?>category-product.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php 
                                //check image is available o not
                                if($image_name == "")
                                {
                                    //diapplay msg
                                    echo "Image Not Available";
                                }
                                else
                                {
                                    //image Availbe
                                    ?>
                                    <img src="<?php echo $siteurl; ?>images/category/<?php echo $image_name; ?>" alt="Product name" class="img-responsive img-curve">
                                    <?php 

                                }
                                
                                ?>
                                

                                <h3 class="float-text text-white"><?php echo $title; ?></h3>
                            </div>
                        </a>

                        <?php
                    }
                }
                else
                {
                    //category is not availabe
                    echo "<div class='error'>Category not Added.</div>";
                }
            
            ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- product Menu Section Starts Here -->
    <section class="product-menu">
        <div class="container">
            <h2 class="text-center">New Products</h2>

            <?php
            
                //getting products from db that are active and featured
                //sql query
                $slq2 = "SELECT * FROM tbl_product WHERE active = 'Yes' AND featured = 'Yes' LIMIT 6";
                
                //execute the query
                $res2 = mysqli_query($conn,$slq2);

                //count the rows
                $count2 = mysqli_num_rows($res2);

                //check product available o not
                if($count2>0)
                {
                    //product availbe
                    while($row = mysqli_fetch_assoc($res2))
                    {
                        //get all the value
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>

                            <div class="product-menu-box">
                                <div class="product-menu-img">
                                    <?php 
                                        //check image available
                                        if($image_name == "")
                                        {
                                            //image is not available
                                            echo "<div class = 'error'>iamge is not avaible.</div>";
                                        }
                                        else
                                        {
                                            //image available
                                            ?>  
                                                <img src="<?php echo $siteurl; ?>images/product/<?php echo $image_name; ?>" alt="Product name" class="img-responsive img-curve">
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
                    //product availbe
                    echo "<div class='error'>Product not Available.</div>";
                }

            ?>
            <div class="clearfix"></div>

            

        </div>

        <p class="text-center-product">
            <a href="<?php echo $siteurl; ?>product.php">See All Product</a>
        </p>
    </section>
    <!-- Product Menu Section Ends Here -->

<?php include('partials-front/footer.php') ?> 