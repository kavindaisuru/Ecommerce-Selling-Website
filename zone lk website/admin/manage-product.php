<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Product</h1>

        <br>
            <!--button to add admin-->
            <a href="<?php echo $siteurl;?>admin/add-product.php" class="btn-primary">Add Product</a> 
            <br><br><br>

            <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            if(isset($_SESSION['Unauthorized']))
            {
                echo $_SESSION['Unauthorized'];
                unset($_SESSION['Unauthorized']);
            }
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            
        ?>

            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>

                <?php 
                
                //create a sql query to get all product
                $sql = "SELECT * FROM tbl_product";

                //execute the query
                $res = mysqli_query($conn,$sql);

                //count rows to check we have product or not
                $count = mysqli_num_rows($res);
                $sn = 1;

                if($count>0)
                {
                    //we have product in db
                    //get the product from db and dispplay
                    while($row = mysqli_fetch_assoc($res))
                    {
                        //get the value form individual
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                        ?>

                            <tr>
                                <td><?php echo$sn++; ?>. </td>
                                <td><?php echo $title; ?></td>
                                <td><?php echo $price; ?></td>
                                <td>
                                    <?php
                                    
                                        //check we haev image no not
                                        if($image_name == "")
                                        {
                                            //we dont have image,display error
                                            echo "<div class = 'error'>Image Not Add.</div>";
                                        }
                                        else
                                        {
                                            //we have image,and dispaly
                                            ?>
                                            <img src="<?php echo $siteurl; ?>images/product/<?php echo $image_name; ?>" width="100px">
                                            <?php
                                        }
                                    
                                    ?>
                                          
                                </td>
                                <td><?php echo $featured; ?></td>
                                <td><?php echo $active; ?></td>
                                    <td>
                                        <a href="<?php echo $siteurl; ?>admin/update-product.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
                                        <a href="<?php echo $siteurl; ?>admin/delete-product.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete</a>
                                    </td>
                            </tr>

                        <?php
                    } 
                }
                else
                { 
                    //product not add in db
                    echo "<tr> <td colspan = '7' class = 'error'>Product Not Added yet.</td></tr> ";
                }
                
                ?> 
                
            </table>
    </div>
    
</div>

<?php include('partials/footer.php'); ?>