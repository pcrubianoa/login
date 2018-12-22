<? session_start();
	require_once 'DB.php';
	abstract class Crud extends DB {
		protected $table;

		public $select="A.*";
		public $where="";
		public $order="";
		public $group="";
		public $limit="";

		public $joinSelect="";
		public $joinFrom="";

		abstract public function insert();

		public function setJoin($select, $from="", $where="") {
			if ($select == "") {
				$this->joinSelect = "";
				$this->joinFrom = "";
				$this->where="";	
			} else {
				$this->joinSelect .= ", ".$select;
				$this->joinFrom .= ", ".$from;
				if ($this->where=="")
					$this->where="WHERE ".$where;
				else
					$this->where.=" AND ".$where;
			}
		}

		public function select($select) {
				$this->select .= ", ".$select;
		}

		public function where($where) {
			if ($where=="")
				$this->where="";
			elseif ($this->where=="")
				$this->where="WHERE ".$where;
			else
				$this->where.=" AND ".$where;
		}

		public function order($order,$p="ASC") {
			if ($order=="")
				$this->order="";
			elseif ($this->order=="")
				$this->order = "ORDER BY ".$order. " ".$p;
			else
				$this->order .= ", ".$order;
		}

		public function group($group) {
			if ($group=="")
				$this->group="";
			elseif ($this->group=="")
				$this->group = "GROUP BY ".$group;
			else
				$this->group .= ", ".$group;
		}

		public function limit($limit) {
			$this->limit = "LIMIT ".$limit;
		}

		public function result($stmt) {
			$array=array();
			if ($stmt)
				while ($rec = mysqli_fetch_assoc($stmt)) {
					$array[] = $rec;
				}
			return $array;
		}

		public function resultOnce($stmt) {
			if ($stmt)
				$array = mysqli_fetch_assoc($stmt);
			return $array;
		}

		public function selectOnce($id,$table="A") {
			if ($this->where=="")
				$this->where .= "WHERE ".$table.".id=".$id;
			else
				$this->where .= " AND ".$table.".id=".$id;
			$sql  = "SELECT ".$this->select." ".$this->joinSelect." FROM ".$this->table." A".$this->joinFrom." ".$this->where." ".$this->group." ".$this->order." ".$this->limit;
			//$sql  = "SELECT A.* FROM ".$this->table." AS A  WHERE  A.id = ".$id;

			$stmt = DB::execute($sql);
			return self::resultOnce($stmt);
		}

		public function query($sql) {
				if ($stmt = DB::execute($sql))
			return self::result($stmt);
		}

		public function queryNR($sql) {
			$stmt = DB::execute($sql);

		}

		public function selectAll() {
			$sql  = "SELECT ".$this->select." ".$this->joinSelect." FROM ".$this->table." A".$this->joinFrom." ".$this->where." ".$this->group." ".$this->order." ".$this->limit;
			$stmt = DB::execute($sql);
			return self::result($stmt);
		}

		public function findBetween($a, $b) {
			$sql  = "SELECT  ".$this->table.".*".$this->func." FROM ".$this->table.$this->extra.$this->order." LIMIT $a, $b";
			$stmt = DB::execute($sql);
			return self::result($stmt);
		}

		public function last() {
			$sql  = "SELECT  MAX(id) AS id FROM ".$this->table.$this->where;
			$stmt = DB::execute($sql);
			return self::resultOnce($stmt);
		}

		public function countRegs($sql="") {
			if ($sql=="")
				$sql  = "SELECT DISTINCT (A.id), ".$this->select." ".$this->joinSelect." FROM ".$this->table." A".$this->joinFrom." ".$this->where." ".$this->group." ".$this->order." ".$this->limit;
			$stmt = DB::execute($sql);
			$regs = mysqli_num_rows($stmt);
			return $regs;
		}

		public function delete($id) {
			$sql  = "DELETE FROM ".$this->table." WHERE  id = ".$id." LIMIT 1";
			$stmt = DB::execute($sql);
		}

		public function updateField($field,$value,$id) {
			$sql  = "UPDATE ".$this->table." SET ".$field."='".$value."' WHERE  ".$this->table.".id = ".$id." LIMIT 1";
			$stmt = DB::execute($sql);
		}

		public function sum($field) {
			$sql  = "SELECT SUM($field) AS $field FROM ".$this->table." ".$this->where;
			if ($stmt = DB::execute($sql)) {
				$array = mysqli_fetch_assoc($stmt);
				$sum = $array[$field];
				return $sum;
			}

		}
	}
?>
