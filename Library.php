<?php
$user_name = "root";
$server="localhost";
$password="";
$database="library";
$book_n=$_POST['book_n'];
$author_n=$_POST['author_n'];
$genre=$_POST['genre'];
$db_handle=mysql_connect($server,$user_name,$password);
if(!$db_handle){
	die("Could not connect");
}
$db_found=mysql_select_db($database);
if($db_found){
	$sql="
	INSERT INTO books(book_n,author_n,genre) 
	values('".$book_n."','".$author_n."','".$genre."')";
	
	$query= mysql_query($sql);
	$query2=mysql_query("Select * from books");
		echo "<TABLE BGCOLOR=\"RED\" BORDER='2' ALIGN=\"CENTER\">";
		echo "<TR>";
		echo "<TH  COLSPAN='4'><CENTER><FONT COLOR=\"GREEN\">BOOK LIST</FONT> <CENTER></TH>";
		echo "</TR>";
		echo "<TR>";
		echo "<TD>Sl.NO</TD>";
		echo "<TD>Book Name</TD>";
		echo "<TD>Authour Name</TD>";
		echo "<TD>Genre</TD>";
		echo "</TR>";
	while($tables =  mysql_fetch_array($query2)){
		echo "<TR>";
		echo "<TD>".$tables['sl_no']."</TD>";
		echo "<TD>".$tables['book_n']."</TD>";
		echo "<TD>".$tables['author_n']."</TD>";
		echo "<TD>".$tables['genre']."</TD>";
		echo "</TR>";
		}
		echo "</TABLE>";
}
else{
	echo "No Database Found!";
}
mysql_close($db_handle);
?>