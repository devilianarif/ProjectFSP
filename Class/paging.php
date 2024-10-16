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


	function bunchProposal($cari, $totalData, $limit, $noPage, $pageW, $pageA, $pageR, $change)
	{
		$res = "";

		$maxPage = ceil($totalData/$limit);
		for ($page=1; $page <= $maxPage ; $page++) { 
			if($noPage == $page){
				$res .= "<b>$page</b>";
			} else{
				if($change == "W"){
					$res .= "<a href='?pageW=$page&pageA=$pageA&pageR=$pageR&cari=$cari'>$page</a>";	
				} else if($change == "A"){
					$res .= "<a href='?pageW=$pageW&pageA=$page&pageR=$pageR&cari=$cari'>$page</a>";	
				} elseif($change == "R"){
					$res .= "<a href='?pageW=$pageW&pageA=$pageA&pageR=$page&cari=$cari'>$page</a>";	
				}		
			}
		}
		return "$res";
	}
?>