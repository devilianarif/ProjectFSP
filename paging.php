<?php
	function generate_page($cari, $totalData, $limit, $noPage){
		$res = "";

		$maxPage = ceil($totalData/$limit);
		for ($page=1; $page < $maxPage ; $page++) { 
			if($noPage == $page){
				$res .= "<b>$page</b>";
			} else{
				$res .= "<a href='?page=$page&cari=$cari'>$page</a>";
			}
		}
	return "$res";
	}
?>