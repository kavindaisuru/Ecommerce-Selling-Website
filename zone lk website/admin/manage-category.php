<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>

        <br>

        <?php
        
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if(isset($_SESSION['remove']))
        {
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
        }
        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        if(isset($_SESSION['fail-remove']))
        {
            echo $_SESSION['fail-remove'];
            unset($_SESSION['fail-remove']);
        }
        
        ?>
        <br><br>
            <!--button to add admin-->
            <a href="<?php echo $siteurl; ?>admin/add-category.php " class="btn-primary">Add Category</a> 
            <br><br><br>

            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>

                <?php
                    //query get all categpry from db
                    $sql = "SELECT * FROM tbl_category ";

                    //execute query
                    $res = mysqli_query($conn,$sql);

                    //count rows
                    $count = mysqli_num_rows($res);

                    //create a S.N varibale
                    //$sn = 1;

                    //check data in db o not
                    if($count>0)
                    {
                        //we have data in db
                        //get data and display
                        while($row = mysqli_fetch_assoc($res))
                        {
                            $id = $row['id'];
                            $title = $row['title'];
                            $image_name = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];

                            ?>

                            <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $title; ?></td>

                                    <td>
                                        <?php 
                                            //check image name if avalible
                                            if($image_name!="")
                                            {
                                                //display the image
                                                ?>
                                                    <img src="<?php echo $siteurl; ?>images/category/<?php echo $image_name; ?>" width="100px">
                                                    
                                                <?php
                                            }
                                            else
                                            {
                                                //display the msg
                                                echo "<div class = 'error'>Image Not Added</div>";
                                            }
                                        ?>
                                    </td>

                                    <td><?php echo $featured; ?></td>
                                    <td><?php echo $active; ?></td>
                                        <td>
                                            <a href="<?php echo $siteurl; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
                                            <a href="<?php echo $siteurl; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete</a>
                                        </td>
                            </tr>

                            <?php
                        }
                    }
                    else
                    {
                        //we dont have data in db
                        //dispalay msg in side table
                        ?>
                        <tr>
                            <td colspan="6"><div class="error">No Categroy Added</div></td>
                        </tr>
                        <?php
                    }
                ?>

                
            </table>
    </div>
    
</div>

<?php include('partials/footer.php'); ?>