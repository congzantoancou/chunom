<?php 
/**
* 
*/
class Database
{
	public static $connection = NULL;

	public function __construct()
	{
		if (!self::$connection) {
			self::$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			self::$connection->set_charset('utf8');
		}
		return self::$connection;
	}

	public function __destruct()
	{
		//self::$connection->close();
	}

	public function getLines($sql)
	{
		// Thực thi câu sql
		$data = self::$connection->query($sql);

		// Xử lý kết quả trả về: chuyển object $data -> array $items
		$items = array();
		while ($item = $data->fetch_assoc()) { // Đọc từng dòng trong $data
			$items[] = $item; // Gán từng dòng vào từng phần tử trong $items[]
		}

		return $items;
	}
}
?>