<!-- <option value="cycles">cycle </option>
<option value="Drafter">Drafter</option>
<option value="mobile">Mobile</option>
<option value="Apron">Apron</option>
<option value="Books">Books</option> -->
<?php
 
 include 'connect.php';
 $select_query="select *from `categories`";
 $result_query=mysqli_query($conn,$select_query);
 while($row=mysqli_fetch_assoc($result_query))
 {
    $category_title=$row['category_title'];
    $category_id=$row['c_id'];
    echo "<option value='$category_id'>$category_title</option>";
 }
?> 