#!/bin/php
<?php
$p=explode(",",$argv[1]);$q=["qwertyuiop","sdfghjkl","zxcvbnm"];$l=0;$b="";for($i=0;$i<sizeof($p);$i++){for($j=0;$j<3;$j++){$r=strspn($p[$i],$q[$j]);$f=strlen($p[$i]);if($r==strlen($p[$i])&&$f>$l){$b=$p[$i];$l=$f;}}}echo $b;
?>

<!--231 characters-->