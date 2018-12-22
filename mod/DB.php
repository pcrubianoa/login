<? session_start();
require_once 'config.php';

class DB {
	private static $conn;

	public static function getInstance() {
		try {
			self::$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME,"3306");
			self::$conn->set_charset("utf8");
		} catch (Exception $e){
    		echo "Error 101. Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		return self::$conn;
	}

	public static function execute($sql) {
		$stmt = self::getInstance();
		try {
			return $stmt->query($sql);

			$stmt->close();
		} catch (Exception $e) {
			echo "Error 102. Error realizando operación: " . $e;
		}
	}
}
?>