<?php 
include('db.php'); 

$sql = "select * from test";
$result = $mysqli->query($sql);
// $row = $result->fetch_assoc();



?>
<h1>Nested Tree hah</h1>



<form action='action.php' method="POST"><?php
$projects = array();
while($rows = $result->fetch_assoc()) {
	$projects[] = $rows ;
} ?>
<select id="parent" name="parent">
	<option value="0">select category</option> <?php
	foreach ($projects as $project) {?>

		<option value="<?php echo $project['id'];?>"><?php echo $project['name'];?></option>

		<?php 
	} ?>
</select>
<input type="category" name="category">


<button>Sumit</button>


</form>

<p>result</p>

<?php 

function getCategoryTree($level = 0,$sub_mark = '') {
	global $mysqli;
	$sql =  "SELECT * FROM test WHERE pid = $level ORDER BY name ASC";
	$results = $mysqli->query($sql);
        while($row = $results->fetch_assoc()){
            echo '<option value="'.$row['id'].'">'.$sub_mark.$row['name'].'</option>';
            getCategoryTree($row['id'], $sub_mark.'-');
        }

}

echo getCategoryTree();

?>
