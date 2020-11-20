

<?php
include "nav.php";
include "conn.php";
?>
<form action="" method="get"> 
<ul>
<li><input type="text" name="sql" placeholder="请输入sql" required/></li>
<li class="naked"><input type ="submit" name="Save" value="执行"/></li>
</ul>
</form>
<!-- <?php
    $q = isset($_GET['sql'])? htmlspecialchars($_GET['sql']) : '';
    if($q) {
    $sql="insert into products (pname) values ('".$q."')";
    
    if (mysqli_query($conn, $sql)) {
        // echo "<script>alert('新记录插入成功')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    }
    $sql = "SELECT * FROM products order by pid desc limit 5";
    $result = mysqli_query($conn, $sql);
     
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo $row["pname"]."<span style='float:right'>".$row["pid"]."</span><hr>";
        }
    } else {
        echo "empty.";
    }
     
    mysqli_close($conn);
?> -->

</body>
</html>

