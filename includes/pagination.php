
<?php
// session_start();
require_once("db.php");
class Pagination{

	private $tableName;
	private $limit;
	private $pageNo;
	private $currentStartLocation;
	public $pageCount;
	// private $fristpage = 1;
	private $lastPage;
	private $nextPage;
	private $backPage;



	public function __construct($tableName,$limit){
		$db = new Db();
		$this->tableName = $tableName;
		$this->limit = $limit;
	}

	public function getPageContent($pageNo,$category,$q){
		$db = new Db();
		$this->pageNo = $pageNo;
		$this->currentStartLocation = ($this->pageNo -1 )*$this->limit;
		$this->nextPage = $pageNo + 1;
		$this->backPage = $pageNo -1;
		// echo $this->currentStartLocation;

		if($category == 0){
			if($q != ""){
				$sqlq = "SELECT * FROM {$this->tableName} WHERE title LIKE '%{$q}%' ORDER BY createAt DESC LIMIT {$this->currentStartLocation},{$this->limit}";
				$this->pageCount = ceil(($db->queryExecute($sqlq)->num_rows)/$this->limit);
			}else{
				$sqlq = "SELECT * FROM {$this->tableName} ORDER BY createAt DESC LIMIT {$this->currentStartLocation},{$this->limit}";
				$this->pageCount = ceil(($db->getDataCountTable($this->tableName)/$this->limit));
			}

		}else{
			$sqlq = "SELECT * FROM {$this->tableName} WHERE category_id = '{$category}' ORDER BY createAt DESC LIMIT {$this->currentStartLocation},{$this->limit}";
			$this->pageCount = ceil(($db->getDataCount($this->tableName,"category_id",$category)/$this->limit));
		}

		$r = $db->queryExecute($sqlq);
		$this->lastPage = $this->pageCount;
		return $r;
	}

	public function getLinks(){
		if($this->backPage < 1){
			$bp = "";
		}else{
			$bp = "<a class='btn' href='?page=home&p={$this->backPage}&c={$_SESSION['cid']}&q='>Back</a>";
		}
		if($this->nextPage > $this->lastPage){
			$np = "";
		}else{
			$np = "<a class='btn' href='?page=home&p={$this->nextPage}&c={$_SESSION['cid']}&q='>Next</a>";
		}
		

		
		$links = "
		<p>
		<a class='btn' href='?page=home&p=1&c={$_SESSION['cid']}&q='>Frist</a>
		{$bp}
		{$this->pageNo} of {$this->pageCount}
		{$np}
		<a class='btn' href = '?page=home&p={$this->lastPage}&c={$_SESSION['cid']}&q='>Last</a>
		</p>
		";

		if($this->pageCount == 0 ){
			$links = "
				<h3>Nothing found</h3>
			";
		}

		echo $links;

	}


}


// $p = new Pagination("article",1);
// $p->getPageContent(3);
// $p->getLinks();

?>