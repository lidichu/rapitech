<?php
	interface ManagerItem{
		function AddShow();
		function ModifyShow();
		function ReadShow();
		function CheckScript();
		function AddScript();
		function ModifyScript();
		function ShowScript();
		function AddHandle(&$Param);
		function ModifyHandle(&$Param);
	}
?>