<?php
include('db.php'); 
$param = $_POST['category'];
$pid = $_POST['parent'];

$sql = "INSERT INTO test (id, pid, name)
		VALUES ('', '$pid', '$param')";


if ($mysqli->query($sql) === TRUE) {
?><script type="text/javascript">
	alert(New record created successfully);
</script>
<?php
}

 header("Location: http://localhost/nadsoft/"); 

die();


// id= 1 pid= cate2 ;
// id= 2 pid=1 cate2.1;

// id 3 pid=2 cate2.1.1
// id =4 pid 3 cate2.1.1.1

