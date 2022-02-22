<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Order</h1>

        <br><br>

        <?php
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
        ?>
            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty.</th>
                    <th>Total</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Contact.</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>

                <?php
                
                    //get all order from databse
                    $sql = "SELECT * FROM tbl_order ORDER BY id DESC"; //display the latest order at first
                    //execute query
                    $res = mysqli_query($conn,$sql);
                    //count the rows
                    $count = mysqli_num_rows($res);

                    $sn = 1; //create a Serial numer adn set its initial value as 1

                    if($count>0)
                    {
                        //order available
                        while($row=mysqli_fetch_assoc($res))
                        {
                            //get all order details
                            $id = $row['id'];
                            $product = $row['product'];
                            $price = $row['price'];
                            $qty = $row['qty'];
                            $total = $row['total'];
                            $order_date = $row['order_date'];
                            $status = $row['status'];
                            $customer_name = $row['customer_name'];
                            $customer_contact = $row['customer_contact'];
                            $customer_email = $row['customer_email'];
                            $customer_address = $row['customer_address'];

                            ?>

                                <tr>
                                    <td><?php echo $sn++; ?>.</td>
                                    <td><?php echo $product; ?></td>
                                    <td><?php echo $price; ?></td>
                                    <td><?php echo $qty; ?></td>
                                    <td><?php echo $total; ?></td>
                                    <td><?php echo $order_date; ?></td>
                                    <td><?php echo $status; ?></td>

                                    <td>
                                        <?php /*
                                            //orderd,on delivery,deliverd,canceld

                                            if($status=="Ordered")
                                            {
                                                echo "<lable>$status</lable>";
                                            }
                                            elseif($status=="on Delivery")
                                            {
                                                echo "<lable style='color: orange;'>$status</lable>";
                                            }
                                            elseif($status=="Deliverd")
                                            {
                                                echo "<lable style='color: red;'>$status</lable>";
                                            }
                                            elseif($status=="Cancelled")
                                            {
                                                echo "<lable style='color: green;'>$status</lable>";
                                            } */
                                        ?>
                                    </td>
                                        
                                    <td><?php echo $customer_name; ?></td>
                                    <td><?php echo $customer_contact; ?></td>
                                    <td><?php echo $customer_email; ?></td>
                                    <td><?php echo $customer_address; ?></td>
                                    
                                        <td>
                                            <a href="<?php echo $siteurl; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
                                        </td>
                                </tr>

                            <?php

                        }
                    }
                    else
                    {
                        //order not available
                        echo "<tr><td colsapn = '12' class = 'error'>Order not Available.</td></tr>";
                    }
                
                ?>
            </table>
    </div>
    
</div>

<?php include('partials/footer.php'); ?>