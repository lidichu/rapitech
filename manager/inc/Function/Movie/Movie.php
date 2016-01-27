<?php
//Youtube
function SetYoutube($YoutubeCode,$strWidth,$strHeight,$strMovieNote,$autoplay,$IsPic=false){
	if($YoutubeCode !=""){
		if($IsPic){
			echo "<img src=\"http://img.youtube.com/vi/" . $YoutubeCode . "/0.jpg\" width=\"".$strWidth."\" height=\"".$strHeight."\" border=\"0\">";
		}else{
			echo "<div style=\"width:".$strWidth."px;height:".($strHeight)."px\">\n";
			echo "<object width=\"" .$strWidth . "\" height=\"" . $strHeight . "\">\n";
			echo "<param name=\"allowfullscreen\" value=\"true\" />\n";
			echo "<param name=\"movie\" value=\"http://www.youtube.com/v/" .$YoutubeCode ."&rel=1&autoplay=".$autoplay."&loop=1\">\n";
			echo "<param name=\"wmode\" value=\"transparent\">\n";		
			echo "<embed allowfullscreen=\"true\" src=\"http://www.youtube.com/v/".$YoutubeCode ."&rel=1&autoplay=".$autoplay."&loop=1\" type=\"application/x-shockwave-flash\" wmode=\"transparent\" width=\"" .$strWidth . "\" height=\"" .$strHeight ."\">\n";
			if ($strMovieNote != ""){
				echo "<div class=\"bodytext\" style=\"padding:0px 3px;margin-top:5px;\">".$strMovieNote ."</div>\n";
			}		
			echo "</embed>\n";
			echo "</object>\n";
			echo "</div>\n";
		}
	}
}

function SetMovie($StrUrl,$StrWidth,$StrHeight,$StrMovieNote="",$Autoplay=0){ 
	$Ext="";
	if($StrUrl!=""){
		$UrlArray=explode(".",$StrUrl);
		$Ext=$UrlArray[count($UrlArray)-1];
	}else{
		$Ext="";
	}
	Switch($Ext){
		Case "avi":
		Case "wmv":
		Case "asf":
		Case "mov":
			echo  "<object classid=\"CLSID:6BF52A52-394A-11d3-B153-00C04F79FAA6\" width=\"" . $StrWidth . "\" height=\"" . $StrHeight . "\">\n";
			echo  "<param name=\"url\" value=\"" . $StrUrl . "\">\n";
			echo  "<param name=\"AutoStart\" value=\"".$Autoplay."\">\n";
			echo  "<embed id=\"MediaPlayer\" src=\"" . $StrUrl . "\" width=\"" . $StrWidth . "\" height=\"" . $StrHeight . "\" loop=\"false\" autostart=\"false\">\n";
			if($StrMovieNote !=""){
				echo  "<div class=\"bodytext\" style=\"padding:0px 3px;margin-top:5px;\">" . $StrMovieNote . "</div>\n";
			}					
			echo  "</embed>\n"; 
			echo  "</object>\n";
			break;
		Case "mov":
		Case "rm":
		Case "ra":
		Case "ram":
				echo  "<object height=\"" . $StrHeight . "\" width=\"" . $StrWidth . "\" classid=\"clsid:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA\">\n" ; 
				echo  "<param name=\"_ExtentX\" value=\"12700\">\n" ;
				echo  "<param name=\"_ExtentY\" value=\"9525\">\n" ;
				echo  "<param name=\"AUTOSTART\" value=\"".$Autoplay."\">\n" ;
				echo  "<param name=\"SHUFFLE\" value=\"0\">\n" ;
				echo  "<param name=\"PREFETCH\" value=\"0\">\n" ;
				echo  "<param name=\"NOLABELS\" value=\"0\">\n" ;
				echo  "<param name=\"SRC\" value=\"" . $StrUrl . "\">\n" ;
				echo  "<param name=\"CONTROLS\" value=\"ImageWindow\">\n" ;
				echo  "<param name=\"CONSOLE\" value=\"Clip\">\n" ;
				echo  "<param name=\"LOOP\" value=\"0\">\n" ;
				echo  "<param name=\"NUMLOOP\" value=\"0\">\n" ;
				echo  "<param name=\"CENTER\" value=\"0\">\n" ;
				echo  "<param name=\"MAINTAINASPECT\" value=\"0\">\n" ;
				echo  "<param name=\"BACKGROUNDCOLOR\" value=\"#000000\">\n" ;
				if($StrMovieNote !=""){
					echo  "<div class=\"bodytext\" style=\"padding:0px 3px;margin-top:5px;\">" . $StrMovieNote . "</div>\n";
				}					
				echo "</object>\n";
			break;	
		Case "mp3":
		Case "wma":
		Case "wav":
			echo  "<object id=\"mplayer\" width=\"" . $StrWidth . "\" height=\"" . $StrHeight . "\" classid=\"CLSID:22d6f312-b0f6-11d0-94ab-0080c74c7e95\" codebase=\"http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=6,4,5,715\" align=\"baseline\" border=\"0\" standby=\"Loading Microsoft Windows Media Player components...\" type=\"application/x-oleobject\">\n" ;
			echo  "<param name=\"FileName\" value=\"" . $StrUrl . "\">\n" ;
			echo  "<param name=\"ShowControls\" value=\"1\">\n" ;
			echo  "<param name=\"ShowPositionControls\" value=\"0\">\n" ;
			echo  "<param name=\"ShowAudioControls\" value=\"1\">\n" ;
			echo  "<param name=\"ShowTracker\" value=\"1\">\n" ;
			echo  "<param name=\"ShowDisplay\" value=\"0\">\n" ;
			echo  "<param name=\"ShowStatusBar\" value=\"1\">\n" ;
			echo  "<param name=\"AutoSize\" value=\"0\">\n" ;
			echo  "<param name=\"ShowGotoBar\" value=\"0\">\n" ;
			echo  "<param name=\"ShowCaptioning\" value=\"0\">\n" ;
			echo  "<param name=\"AutoStart\" value=\"1\">\n" ;
			echo  "<param name=\"PlayCount\" value=\"2\">\n" ;
			echo  "<param name=\"AnimationAtStart\" value=\"0\">\n" ;
			echo  "<param name=\"TransparentAtStart\" value=\"0\">\n" ;
			echo  "<param name=\"AllowScan\" value=\"0\">\n" ;
			echo  "<param name=\"EnableContextMenu\" value=\"1\">\n" ;
			echo  "<param name=\"ClickToPlay\" value=\"0\">\n" ;
			echo  "<param name=\"InvokeURLs\" value=\"1\">\n" ;
			echo  "<param name=\"DefaultFrame\" value=\"datawindow\">\n" ;
			echo  "<embed src=\"" . $StrUrl . "\" align=\"baseline\" \n";
			echo  "border=\"0\" width=\"" . $StrWidth . "\" height=\"" . $StrHeight . "\" type=\"application/x-mplayer2\" \n" ;
			echo  "pluginspage=\"http://www.microsoft.com/isapi/redir.dll?prd=windows. \n" ;
			echo  "sbp=mediaplayer.ar=media.sba=plugin.\" \n" ;
			echo  "name=\"MediaPlayer\" showcontrols=\"1\" showpositioncontrols=\"0\" \n" ;
			echo  "showaudiocontrols=\"1\" showtracker=\"1\" showdisplay=\"0\" \n" ;
			echo  "showstatusbar=\"1\" autosize=\"0\" showgotobar=\"0\" showcaptioning=\"0\" \n" ;
			echo  "autostart=\"0\" autorewind=\"0\" \n" ;
			echo  "animationatstart=\"0\" transparentatstart=\"0\" allowscan=\"1\" \n" ;
			echo  "enablecontextmenu=\"1\" clicktoplay=\"0\" invokeurls=\"1\" defaultframe=\"datawindow\">\n" ;
			echo  "</embed>\n" ;
			if($StrMovieNote !=""){
				echo  "<div class=\"bodytext\" style=\"padding:0px 3px;margin-top:5px;\">" . $StrMovieNote . "</div>\n";
			}					
			echo "</object>\n";
			break;
		default:
			echo "不支援此影片格式";
			break;
	}
}
?>