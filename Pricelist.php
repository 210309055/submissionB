<?php
 // Error Reporting
 /*error_reporting(E_ALL);
 ini_set('display_errors','1');*/
 
// Parse the form data and add inventory items
if(isset($_POST['productName']))
{
	$product_name= mysql_real_escape_string($_POST['productName']);
	$price = mysql_real_escape_string($_POST['price']);
	$catagory = mysql_real_escape_string($_POST['catagory']);
	$subcatagory = mysql_real_escape_string($_POST['subcategory']);
	$details = mysql_real_escape_string($_POST['productDetails']);
	
	//see if the product is identical to another1 Placed in the system
	$sqlQuery =mysql_query("SELECT id FROM product WHERE product_name ='".$product_name."'LIMIT");
	$productMatch = mysql_num_rows($sqlQuery);
	if($productMatch>0)
	{
		echo "Sorry you tried to place a duplicate Product Name into the system";
		exit();
		
		
		
	} 
	$sqlQuery = mysql_query("INSERT INTO `e-commerce`.`product` (`ID`, `PRODUCT_NAME`, `PRICE`, `DETAILS`, `CATAGORY`, `SUBCATAGORY`, `DATE_ADDED`) 
	VALUES ('".$product_name."', '".$productPrice."', '".$details." ', '".$catagory."', '".$subcatagory."','".date('H:i, jS F Y')."'")or die(mysql_error());
	$pid = mysql_insert_id();
	$newname = "$pid.jpg";
	move_uploaded_file($_FILES['fileFiled']['tmp_name'],"../Product_imagies/$newname");
	header("Location : Pricelist.php");
	exit();
	
	
}



?>
<?php
include "functions.php";

//this block grabs the whole list of viewing
$product = "";

$query = mysql_query("SELECT * FROM product");
$productCount = mysql_num_rows($query);

if($productCount!=0)
{
	echo "They are ".$productCount." products avaleble in your shop";
	
	while($row = mysql_fetch_array($query ))
	{
			$id = $row["ID"];
			$productName = $row["PRODUCT_NAME"];
			$productPrice = $row["PRICE"];
			$dateAdd =date('H:i, jS F Y');
			$product = "ID : ".$id."  "."Product Name : ".$productName.
			"  Product Price R:".$productPrice."<br/>";
			echo $product;
			
		
	}
}
else
{
	echo "You dont have any products listed in your shop at this moment";
	exit();	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inventtory List</title>
</head>

<body>
<p>&nbsp;</p>
<p>ADD Products</p>
<form id="form1" name="form1" method="post" action="">
  <table width="494" border="0.2">
    <tr>
      <th width="163" scope="row">Product Name</th>
      <td width="321"><label for="productName"></label>
      <input type="text" name="productName" id="productName" /></td>
    </tr>
    <tr>
      <th scope="row">Product Price</th>
      <td>R
        <label for="price"></label>
      <input type="text" name="price" id="price" /></td>
    </tr>
    <tr>
      <th scope="row">Category</th>
      <td><label for="catagory"></label>
        <label for="catagory"></label>
        <select name="catagory" id="catagory">
          <option value="shoes">Shoes</option>
      </select></td>
    </tr>
    <tr>
      <th scope="row">Subcatgory</th>
      <td><label for="subcatagory"></label>
        <label for="subcategory"></label>
        <select name="subcategory" id="subcategory">
          <option value="formal">Formal</option>
          <option value="loafers">Loafers</option>
          <option value="hills">Hills</option>
          <option value="sneakers">Sneakers</option>
      </select></td>
    </tr>
    <tr>
      <th scope="row">Product Details</th>
      <td><label for="productDetails"></label>
      <textarea name="productDetails" id="productDetails" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <th scope="row">Prouct Image</th>
      <td><label> 
      <input type="file" name="fileFiled" id = "fileFiled"/>
      </label></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><input type="submit" name="button" id="button" value="Add This Item Now" /></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>