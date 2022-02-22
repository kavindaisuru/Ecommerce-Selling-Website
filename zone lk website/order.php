<?php include('partials-front/menu.php'); ?>

    <?php
        //check product id set or not
        if(isset($_GET['product_id']))
        {
            //get the product id and details of the selected product
            $product_id = $_GET['product_id'];

            //get the details of seletced product
            $sql = "SELECT * FROM tbl_product WHERE id=$product_id";
            //execute the query
            $res = mysqli_query($conn,$sql);
            //count the rows
            $count = mysqli_num_rows($res);
            //check data available o not
            if($count==1)
            {
                //we have data
                //get the data from db
                $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
            }
            else
            {
                //product not availble
                //redirect to homepage
                header('location:'.$siteurl);
            }
        }
        else
        {
            //redirect to homepage
            header('location:'.$siteurl);
        }
    ?>


    <!-- product sEARCH Section Starts Here -->
    <section class="product-img">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Item</legend>

                    <div class="product-menu-img">
                        <?php 
                            
                            //check the image available or not
                            if($image_name == "")
                            {
                                //image not availbale
                                echo "Image is not Available";
                            }
                            else
                            {
                                //image not available
                                ?>
                                    <img src="<?php echo $siteurl; ?>images/product/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                <?php
                            }
                        
                        ?>

                    </div>
    
                    <div class="product-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type ="hidden" name ="product" value ="<?php echo $title; ?>">

                        <p class="product-price">Rs.<?php echo $price; ?></p>
                        <input type ="hidden" name ="price" value ="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Jack wiliom" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. +94xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. exm@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php
            
                //check sumbit button is clicek or not
                if(isset($_POST['submit']))
                    {
                        //get all the details from the form
                        $product = $_POST['product'];
                        $price = $_POST['price'];
                        $qty = $_POST['qty'];

                        $total = $price * $qty; //total  = price * qty
                        
                        $order_date = date("Y-m-d h:i:sa"); //order date

                        $status = "ordered"; //orderd , on dilevery , delevery, cancelled

                        $customer_name = $_POST['full-name'];
                        $customer_contact = $_POST['contact'];
                        $customer_email = $_POST['email'];
                        $customer_address = $_POST['address'];


                        //save the order in db
                        //create sql to save the data
                        $sql2 = "INSERT INTO tbl_order SET
                            product = '$product',
                            price = '$price',
                            qty = '$qty',
                            total = '$total',
                            order_date = '$order_date',
                            status = '$status',
                            customer_name = '$customer_name',
                            customer_contact = '$customer_contact',
                            customer_email = '$customer_email',
                            customer_address = '$customer_address'
                        ";
                        //echo $slq2; die();
                        
                        //execute the query
                        $res2 = mysqli_query($conn,$sql2);

                        //check query execute or not
                        if($res2==true)
                        {
                            //echo "Item ordered Successfully.";
                            //query executed and order saved
                            $_SESSION['order'] = "<div class = 'success'>Item ordered, Thank you and Come Agian. </div>";
                            header('location:'.$siteurl);
                        }
                        else
                        {
                            //echo "Item ordered Successfully.";
                            //failed to save order
                            $_SESSION['order'] = "<div class = 'error'>Failed to order Item.</div>";
                            header('location:'.$siteurl);
                        }
                    }

            ?>

        </div>
    </section>
    <!-- product sEARCH Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>
