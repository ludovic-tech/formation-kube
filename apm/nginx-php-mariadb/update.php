<!DOCTYPE html>
<html>
<head>
        <title>Simple CRUD</title>
</head>
<body style="background-color:powderblue;">

 <script>
                function handleData()
{
    var form_data = new FormData(document.querySelector("form"));

    if(!form_data.has("app[]"))
    {
        document.getElementById("chk_option_error").style.visibility = "visible";
      return false;
    }
    else
    {
        document.getElementById("chk_option_error").style.visibility = "hidden";
      return true;
    }

}

        </script>



<center>

        <h2>SIMPLE CRUD PHP - MySQL/MariaDB</h2>
        <br/>
        <h3>EDIT DATA SERVER</h3>

        <?php
        include 'conn.php';
        $id = $_GET['id'];
        $query = mysqli_query($conn,"select * from server where id='$id'");
        while($data = mysqli_fetch_array($query)){
                $data_app=explode(', ', $data['app']);
                ?>
           <form method="post" action="update_db.php" onsubmit="return handleData()">
                <table cellpadding="3" cellspacing="0">

                     <!-- Edit the hostname field -->
                     <tr>
                         <td>Hostname</td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         <td>
                           <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                           <input type="text" name="hostname" value="<?php echo $data['hostname']; ?>">
                         </td>
                     </tr>

                     <!-- Edit the datacenter field -->
                     <tr>
                         <td>Data Center</td>
                         <td>
                           <label><input type="radio" name="dc" value="USA" <?php if($data['dc']=='USA') echo 'checked'?>>USA</label>
                           <label><input type="radio" name="dc" value="Singapore" <?php if($data['dc']=='Singapore') echo 'checked'?>>Singapore</label>
                         </td>
                     </tr>

                     <!-- Edit the brand field -->
                     <tr>
                     <td>Brand</td>
                     <?php $brand = $data['brand']; ?>
                         <td><select name="brand">
                           <option <?php echo ($brand == 'HP') ? "selected": "" ?>>HP</option>
                           <option <?php echo ($brand == 'Dell') ? "selected": "" ?>>Dell</option>
                           <option <?php echo ($brand == 'Huawei') ? "selected": "" ?>>Huawei</option>
                           <option <?php echo ($brand == 'Lenovo') ? "selected": "" ?>>Lenovo</option>
                           <option <?php echo ($brand == 'Supermicro') ? "selected": "" ?>>Supermicro</option>
                         </select></td>
                     </tr>

                     <!-- Edit the app field -->
                     <tr>
                         <td>Application</td>
                         <td>
                            <input type="checkbox"  name="app[]" value="Java" <?php if (in_array("Java", $data_app)) echo "checked";?>> Java
                            <input type="checkbox"  name="app[]" value="PHP" <?php if (in_array("PHP", $data_app)) echo "checked";?> > PHP
                            <input type="checkbox"  name="app[]" value="DB" <?php if (in_array("DB", $data_app)) echo "checked";?> > DB
                            <input type="checkbox"  name="app[]" value="Others" <?php if (in_array("Others", $data_app)) echo "checked";?> > Others
                            <div style="visibility:hidden; color:red; " id="chk_option_error"> Please select at least one option. </div>
                         </td>
                     </tr>

		     <!-- Edit the note field -->
                     <tr>
                         <td>Note</td>
                         <td><textarea rows="4" cols="25" name="note"><?php echo $data['note']; ?>   </textarea></td>
                     </tr>

                     <!-- Create update button -->
                     <tr>
                         <td></td>
                         <td><input type="submit" value="Update">&nbsp;&nbsp;<button onclick="goBack()">Go Back</button></td>
                     </tr>

                </table>
           </form>
                <?php
        }
        ?>

</body>
</html>
