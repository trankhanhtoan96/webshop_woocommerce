<?php
if(!isset($_GET['token']) || $_GET['token']!='trankhanhtoanpoilpoi12345678') die('failed!');
class DataAccessHelper
{
	private $conn;
	function __construct()
	{
		$servername = "localhost:3306";
		$username = "root";
		$password = "";
		$dbname = "nnshop";
		$this->conn = new mysqli($servername, $username, $password, $dbname);
		if($this->conn->connect_error)
		{
			die("Connection failed: " . $this->conn->connect_error);
		}
	}
	function executeNonQuery($sql)
	{
		return $this->conn->query($sql);
	}
	function executeQuery($sql)
	{
		$result = $this->conn->query($sql);
		return mysqli_fetch_assoc($result);
	}
	function __destruct()
	{
		mysqli_close($this->conn);
	}
}
$db = new DataAccessHelper();
// lấy id sản phẩm
$sql = "SELECT MIN(ID) as id, guid FROM wp_posts WHERE post_type='product' AND tkt_update_price=0";
$a = $db->executeQuery($sql);
// nếu tất cả sản phẩm được cập nhật giá thì set tkt_price_update=0 và lặp lại vòng cập nhật giá tiếp theo
if($a['id'])
{
	preg_match("/san-pham\/([^\/]+)\//", $a['guid'],$url);
	$sql = "SELECT meta_value FROM wp_postmeta WHERE meta_key='_sku' AND post_id=".$a['id'];
	$b = $db->executeQuery($sql);
	preg_match("/^([0-9]+)[^-]-/",$b['meta_value'],$product_id);
	$product_id = rtrim($product_id[0],'-');

	//lấy html
	$html = file_get_contents('http://www.lazada.vn/'.$url[1].'-'.$product_id.'.html');

	//lấy giá
	preg_match("/<span id=\"product_price\" class=\"hidden\">([0-9]+)<\/span>/", $html,$price);

	// cập nhật giá
	$sql = "UPDATE wp_postmeta SET meta_value=".$price[1]." WHERE meta_key='_regular_price' AND post_id=".$a['id'];
	$db->executeNonQuery($sql);

	$sql = "UPDATE wp_postmeta SET meta_value=".$price[1]." WHERE meta_key='_price' AND post_id=".$a['id'];
	$db->executeNonQuery($sql);

	// cập nhật trạng thái sản phẩm sang đã đc cập nhật
	$sql = "UPDATE wp_posts SET tkt_update_price=1 WHERE id=".$a['id'];
	$db->executeNonQuery($sql);

	// thông báo ra màn hình
	echo "Đã cập nhật giá sản phẩm ID=".$a['id']." giá hiện tại: ".number_format($price[1])." VNĐ";
}else{
	echo "tất cả sản phẩm đã được cập nhật! bắt đầu cập nhật vòng lặp tiếp theo!";
	$sql = "UPDATE wp_posts SET tkt_update_price=0";
	$db->executeNonQuery($sql);
}