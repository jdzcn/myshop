

<?php
include "nav.php";
include "conn.php";
?>
<form action="" method="get"> 
<ul>
<li><input type="date" name="sdate" value="<?php echo date("Y-m-01"); ?>"></li>
<li><input type="date" name="edate" value="<?php echo date("Y-m-d"); ?>"></li>

<li>
<select name="style" > 

<option value=0>月汇总表</option>
<!-- <option value=3>自产汇总表</option> -->
<option value=1>商品汇总表</option>
<option value =2>日汇总表</option> 
<option value =3>明细表</option> 
</select> 
</li>

<li><input type="text" name="remark" placeholder="备注"/></li>
<li class="naked"><input type ="submit" name="Save" value="查询"/></li>
</ul>
</form>
<?php
    $q = isset($_GET['remark'])? htmlspecialchars($_GET['remark']) : '';
    $mxsql='select pname as one,number as two,amount as three from orders,products where orders.pid=products.pid and';
    $datestr=" odate>='".($_GET['sdate']?$_GET['sdate']:date("Y-m-01"))."' and odate<='".($_GET['edate']?$_GET['edate']:date("Y-m-d"))."'";
    $sqlstr[3]=$mxsql.$datestr.' order by oid desc ';
    $sqlstr[1]='select pname as one,sum(amount) as two ,sum(amount-cost) as three from orders,products where orders.pid=products.pid and'.$datestr.' group by orders.pid order by three desc';
    $sqlstr[2]='select odate as one,sum(amount) as two,sum(amount-cost) as three from orders where'.$datestr.' group by odate order by odate desc';
    $sqlstr[0]='select substr(odate,1,7) as one,sum(amount) as two,sum(amount-cost) as three from orders where'.$datestr.' group by substr(odate,1,7) order by substr(odate,1,7) desc';
    if($q) 
    $sql=$mxsql." remark like '%".$q."%'";
    else
    $sql=$sqlstr[$_GET['style']?$_GET['style']:0];

    // echo $sql.'<hr>';
    // $sql = "SELECT * FROM products order by pid desc limit 5";
    $result = mysqli_query($conn, $sql);
     
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo $row["one"]."<span style='float:center'>".$row['two']."</span>"."<span style='float:right'>".$row["three"]."</span><hr>";
        }
    } else {
        echo "empty.";
    }
     
    mysqli_close($conn);
?>

</body>
</html>

