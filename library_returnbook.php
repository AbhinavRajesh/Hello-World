<?php
$user_name = "root";
$server="localhost";
$password="";
$database="library";
$book_n=$_POST['book_n'];
$user_n=$_POST['user_n'];
$author_n=$_POST['author_n'];
$genre=$_POST['genre'];
$db_handle=mysql_connect($server,$user_name,$password);
if(!$db_handle){
	die("Could not connect");
}
$db_found=mysql_select_db($database);
if($db_found){
	$query1=mysql_query("DELETE FROM book_user WHERE user_name=\"".$user_n."\" AND book_name=\"".$book_n."\" ");
	$query2=mysql_query("INSERT INTO books(book_n, author_n , genre) VALUES('".$book_n."' ,'".$author_n."' , '".$genre."' )");
	$query3=mysql_query("Select * from  books");
	echo "<html> <body background= \"685e18ff8147427079a14ce27d984688.jpg\">
	<h1><center><font color=\"White\">RETURN BOOK</font></center></h1>";
		echo "<TABLE BGCOLOR=\"Blue\" BORDER='3' ALIGN=\"CENTER\">";
		echo "<TR>";
		echo "<TH  COLSPAN='4'><CENTER><FONT COLOR=\"GREEN\">BOOK LIST</FONT> <CENTER></TH>";
		echo "</TR>";
		echo "<TR>";
		echo "<TD>Sl.NO</TD>";
		echo "<TD>Book Name</TD>";
		echo "<TD>User Name</TD>";
		echo "<TD>Genre</TD>";
		echo "</TR>";
	while($tables =  mysql_fetch_array($query3)){
		echo "<TR>";
		echo "<TD>".$tables['sl_no']."</TD>";
		echo "<TD>".$tables['book_n']."</TD>";
		echo "<TD>".$tables['author_n']."</TD>";
		echo "<TD>".$tables['genre']."</TD>";
		echo "</TR>";
		}
		echo "</TABLE>";
		echo "</body> </html>";
}
else{
	echo "No Database Found!";
}
mysql_close($db_handle);
?>