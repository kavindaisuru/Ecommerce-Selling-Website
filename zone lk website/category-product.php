<?php include('partials-front/menu.php'); ?>

<?php

    //check cateogry id pass or not
    if(isset($_GET['category_id']))
    {
        //category id is set and get the id
        $category_id = $_GET['category_id'];
        //get the category title based on category id
        $sql = "SELECT title FROM tbl_category WHERE id = $category_id";

        //execute the cuery
        $res = mysqli_query($conn,$sql);

        //get the value from db
        $row = mysqli_fetch_assoc($res);
        //get the title
        $category_title = $row['title'];
    }
    else
    {
        //category not pass
        //redirect to homepage
        header('location:'.$siteurl);
    }

?>

    <!-- product sEARCH Section Starts Here -->
    <section class="product-search text-center">
        <div class="container">
            
            <h2>Item on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>
    <!-- product sEARCH Section Ends Here -->



    <!-- product MEnu Section Starts Here -->
    <section class="product-menu">
        <div class="container">
            <h2 class="text-center">Products Menu</h2>

            <?php
                //create sql query to get product on seletced category
                $sql2 = "SELECT * FROM tbl_product WHERE category_id = $category_id ";

                //execute the query 
                $res2 = mysqli_query($conn,$sql2);

                //count the rows
                $count2 = mysqli_num_rows($res2);

                //check product is available or not
                if($count2>0)
                {
                    //product available
                    while($row2 = mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['description'];
                        $image_name = $row2['image_name'];
                        ?>

                                <div class="product-menu-box">
                                    <div class="product-menu-img">
                                        <?php 
                                           if($image_name=="")
                                           {
                                               //image not available
                                               echo "Image is no Available.";
                                           }
                                           else
                                           {
                                               //image available
                                               ?>
                                                <img src="<?php echo $siteurl; ?>images/product/<?php  echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
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
                    echo "Product not Available";
                }
            
            ?>
            
            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>