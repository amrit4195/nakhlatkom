<?php
require_once('global-connect.inc.php');

function writeShoppingCart() {
	$cart = $_SESSION['cart'];
	if (!$cart) {
		return '0 item';
	} else {
		// Parse the cart session variable
		$items = explode(',',$cart);
		return count($items).'x items';
	}
}
session_start(); 
function showProduct() {
	global $connection;
	$cart = $_SESSION['cart'];
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		print("
		<table class='cart_table'>
		<tr class='cart_title'>
                	<td>Item pic</td>
                	<td>Product name</td>
                    <td>Unit price</td>
                    <td>Qty</td>
                 
                </tr>"); 
				foreach ($contents as $fid=>$qty) {
		
			$sql ="SELECT * FROM flowers WHERE id = '$fid'";
			
			// modified by Shang	
					
			$stmt = oci_parse($connection, $sql); 
  
			if(!$stmt)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
			oci_execute($stmt); 

			while(oci_fetch_array($stmt)) {

				$name= oci_result($stmt,"NAME");
				$price = oci_result($stmt,"PRICE");
				$realprice=substr($price,1);
				$photo = oci_result($stmt,"PICTURE");
				$fid = oci_result($stmt,"ID");		
			}
			print("<tr>
			<td><img src=http://www.deakin.edu.au/~miaoj/sit203/ass222/pics/".$photo."  border='0' class='cart_thumb' height='30' width='30'/></td>
			<td>$name</td>
			<td>AU $price</td>
			<td>$qty</td>
			</tr>");
			$total += $realprice * $qty;
			
		}
		$total+=20;
		print("<tr>
                <td colspan='4' class='cart_total'><span class='red'>TOTAL:</span></td>
                <td>$".$total."</td>                
                </tr>  </table>
				
	    
		</form>");
	} else 
	{
		Print("<p>You shopping cart is empty.<a href='index.php'>shop now</a></p>");
	}
	
}
function showCart() {
	global $connection;
	$cart = $_SESSION['cart'];
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		print("<form action='cart.php?action=update' method='post' id='cart1'>
		<table class='cart_table'>
		<tr class='cart_title'>
                	<td>Item pic</td>
                	<td>Product name</td>
                    <td>Unit price</td>
					<td>Minus</td>
                    <td>Qty</td>
					<td>Puls</td>
                    <td>Clear</td>
                </tr>"); 
	foreach ($contents as $fid=>$qty) {
			$sql ="SELECT * FROM flowers WHERE id = '$fid'";
			
			// modified by Shang	
					
			$stmt = oci_parse($connection, $sql); 
  
			if(!$stmt)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
			oci_execute($stmt); 

			while(oci_fetch_array($stmt)) {

				$name= oci_result($stmt,"NAME");
				$price = oci_result($stmt,"PRICE");
				$realprice=substr($price,1);
				$photo = oci_result($stmt,"PICTURE");
				$fid = oci_result($stmt,"ID");		
			}
			print("<tr><td><img src=pics/".$photo."  border='0' class='cart_thumb' height='30' width='30'/></td>
			<td>$name</td><td>AU $price</td>
			<td><a href='cart.php?action=min&id=".$fid."' class='r'><img src='images/minus.jpg' width='15' length='15'/></a></td>
			<td><input type='text' name='qty".$id."' value='".$qty."' size='3' maxlength='3' /></td>
			<td><a href='cart.php?action=add&id=".$fid."' class='r'><img src='images/plus.jpg' width='15' length='15'/></a></td>
			<td><a href='cart.php?action=delete&id=".$fid."' class='r'>delete </a></td>
			</tr>");
			$total += $realprice * $qty;
			/*$output[] = '<tr>'
			$output[] = '<td><img src=http://www.deakin.edu.au/~miaoj/sit203/ass2/pics/".$photo."  border="0" class="cart_thumb" /></td>';
			$output[] = '<td>$name</td>';
			$output[] = '<td>AU '.$price.'</td>';
			$output[] = '<td><input type="text" name="qty'.$id.'" value="'.$qty.'" size="3" maxlength="3" /></td>';
			$output[] = '<td>AU '.($price * $qty).'</td>';
			$total += $price * $qty;
			$output[] = '<td><a href="cart.php?action=delete&id='.$id.'" class="r">delete</a></td>';
			$output[] = '</tr>';*/
		}
		$total+=20;
		$_SESSION['total']=$total;
		print("
		      <tr>
                <td colspan='4' class='cart_total'><span class='red'>GST:</span></td>
                <td>10%</td>                
              </tr>
		      <tr>
                <td colspan='4' class='cart_total'><span class='red'>SHIPPING:</span></td>
                <td>$10</td>                
                </tr>
				<tr>
                <td colspan='4' class='cart_total'><span class='red'>HANDLING(PACKING AND POSTAGE ):</span></td>
                <td>$10</td>                
                </tr>
		       <tr>
                <td colspan='4' class='cart_total'><span class='red'>TOTAL:</span></td>
                <td>$".$total."</td>                
                </tr>  </table>
		</form>
		<br/>
		<a href = 'index.php' class='continue'> continue shopping</a>
		<a href = 'neworder.php' class='checkout'> order now </a>");
	} else 
	{
		Print("<p>You shopping cart is empty.</p><a href='index.php'>shop now</a>");
	}
	
}
?>
