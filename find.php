

<?php
include "nav.php";
// include "conn.php";
?>
<form action="" method="get"> 
<ul>

<li>
<select name="month"> 
<option value =0>全年</option> 
<option value ="01">01</option> 
<option value ="02">02</option> 
<option value ="03">03</option> 
<option value ="04">04</option> 
<option value ="05">05</option> 
<option value ="06">06</option> 
<option value ="07">07</option> 
<option value ="08">08</option> 
<option value ="09">09</option> 
<option value ="10">10</option> 
<option value ="11">11</option> 
<option value ="12">12</option> 
</select>
</li>
<li>
<select name="style"> 
<option value =0>月汇总表</option> 
<option value =1>日汇总表</option> 
<option value=2>商品汇总表</option>
<option value=3>自产汇总表</option>
<option value=4>明细表</option>
</select> 
</li>

<li><input type="text" name="remark" placeholder="备注"/></li>
<li class="naked"><input type ="submit" name="Save" value="查询"/></li>
</ul>
</form>
<!-- <?php
    $q = isset($_GET['prod'])? htmlspecialchars($_GET['prod']) : '';
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

