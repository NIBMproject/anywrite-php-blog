
<?php

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

		$r = $db->queryExecute("SELECT count(id) as c FROM {$tableName}");
		$data = $r->fetch_assoc();
		$this->pageCount = ceil(($data['c']/$limit));
		


		// echo $this->pageCount.'-';


	}

	public function getPageContent($pageNo){
		$db = new Db();
		$this->pageNo = $pageNo;
		$this->currentStartLocation = ($this->pageNo -1 )*$this->limit;
		$this->lastPage = $this->pageCount;

		$this->nextPage = $pageNo + 1;
		$this->backPage = $pageNo -1;
		// echo $this->currentStartLocation;

		$r = $db->queryExecute("SELECT * FROM {$this->tableName} ORDER BY createAt DESC LIMIT {$this->currentStartLocation},{$this->limit}");
		// while($data = $r->fetch_assoc()){
		// 	echo $data['id'].'-'.$data['title']."<br>";
		// }
		return $r;
	}

	public function getLinks(){
		if($this->backPage < 1){
			$bp = "";
		}else{
			$bp = "<a class='btn' href='?page=home&p={$this->backPage}'>Back</a>";
		}
		if($this->nextPage > $this->lastPage){
			$np = "";
		}else{
			$np = "<a class='btn' href='?page=home&p={$this->nextPage}'>Next</a>";
		}
		
		
		$links = "
		<p>
		<a class='btn' href='?page=home&p=1'>Frist</a>
		{$bp}
		{$this->pageNo} of {$this->pageCount}
		{$np}
		<a class='btn' href = '?page=home&p={$this->lastPage}'>Last</a>
		</p>
		";
		echo $links;

	}


}


// $p = new Pagination("article",1);
// $p->getPageContent(3);
// $p->getLinks();

?>