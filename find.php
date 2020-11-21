

<?php
include "nav.php";
include "conn.php";
?>
<form action="" method="get"> 
<ul>

<!-- <li>
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
</li> -->
<li><input type="date" name="sdate" value="<?php echo date("Y-m-d"); ?>"></li>
<li><input type="date" name="edate" value="<?php echo date("Y-m-d"); ?>"></li>

<li>
<select name="style" > 

<option value=0>明细表</option>
<!-- <option value=3>自产汇总表</option> -->
<option value=1>商品汇总表</option>
<option value =2>日汇总表</option> 
<option value =3>月汇总表</option> 
</select> 
</li>

<li><input type="text" name="remark" placeholder="备注"/></li>
<li class="naked"><input type ="submit" name="Save" value="查询"/></li>
</ul>
</form>
<?php
    $q = isset($_GET['remark'])? htmlspecialchars($_GET['remark']) : '';
    $mxsql='select pname as one,number as two,amount as three from orders,products where orders.pid=products.pid and';
    $datestr=" odate>='".$_GET['sdate']."' and odate<='".$_GET['edate']."'";
    $sqlstr[0]=$mxsql.$datestr;
    $sqlstr[1]='select pname as one,sum(number) as two,sum(amount) as three ,sum(amount-cost) as four from orders,products where orders.pid=products.pid and'.$datestr.' group by orders.pid order by four ';
    $sqlstr[2]='select odate as one,sum(number) as two,sum(amount) as three,sum(amount-cost) as four from orders where'.$datestr.' group by odate order by odate ';
    $sqlstr[3]='select substr(odate,1,7) as one,sum(number) as two,sum(amount) as three,sum(amount-cost) as four from orders where'.$datestr.' group by substr(odate,1,7)';
    if($q) 
    $sql=$mxsql." remark like '%".$q."%'";
    else
    $sql=$sqlstr[$_GET['style']];

    echo $sql.'<hr>';
    // $sql = "SELECT * FROM products order by pid desc limit 5";
    $result = mysqli_query($conn, $sql);
     
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo $row["one"]."<span style='float:right'>".$row["three"]."</span><hr>";
        }
    } else {
        echo "empty.";
    }
     
    mysqli_close($conn);
?>

</body>
</html>

