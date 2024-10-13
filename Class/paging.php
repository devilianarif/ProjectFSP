<?php
	function generate_page($cari, $totalData, $limit, $noPage, $special=null){
		$res = "";

		$maxPage = ceil($totalData/$limit);
		for ($page=1; $page <= $maxPage ; $page++) { 
			if($noPage == $page){
				$res .= "<b>$page</b>";
			} else{
				if(is_null($special)){
					$res .= "<a href='?page=$page&cari=$cari'>$page</a>";
				} else{
					$res .= "<a href='?$special&page=$page&cari=$cari'>$page</a>";
				}
				
			}
		}
	return "$res";
	}
?>