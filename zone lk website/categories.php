<?php include('partials-front/menu.php'); ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Products</h2>

            <?php 
            
                //dsiplay all categroy
                //sql suqry
                $sql = "SELECT * FROM tbl_category WHERE active = 'Yes'";

                //execute the query
                $res = mysqli_query($conn,$sql);

                //count rows
                $count = mysqli_num_rows($res);

                //check cateogyr available
                if($count>0)
                {
                    //category availabe
                    while($row = mysqli_fetch_assoc($res))
                    {
                        //get the value
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>

                        <a href="<?php echo $siteurl; ?>category-product.php?category_id=<?php echo $id; ?>">
                             <div class="box-3 float-container">
                                 <?php
                                 if($image_name == "")
                                 {
                                     //image not availabe
                                     echo "<div class = 'error'>Image not found</div>";
                                 }
                                 else
                                 {
                                     //image availbe
                                     ?>
                                        <img src="<?php echo $siteurl; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
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
                    //category not availabe
                    echo "<div class = 'error'>Category not found</div>";
                }
            
            ?>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

<?php include('partials-front/footer.php'); ?>