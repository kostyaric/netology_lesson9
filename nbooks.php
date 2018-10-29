<?php

	$pdo = new PDO('mysql:host=localhost;dbname=global', 'klastochkin', 'neto1901');
	$querytext = 'SELECT * FROM books';
	$pdo_prepare = $pdo -> prepare($querytext);
	$pdo_prepare -> execute();
	$result = $pdo_prepare -> fetchAll(PDO::FETCH_ASSOC);

	// var_dump($result);
	$table_string = '';
	foreach ($result as $row) {

		$name = $row['name'];
		$author = $row['author'];
		$year = $row['year'];
		$genre = $row['genre'];
		$isbn = $row['isbn'];

		$table_string .= "
		<tr>
			<td>$name</td>
			<td>$author</td>
			<td>$year</td>
			<td>$genre</td>
			<td>$isbn</td>
		</tr>
		";
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	    table { 
	        border-spacing: 0;
	        border-collapse: collapse;
	    }

	    table td, table th {
	        border: 1px solid #ccc;
	        padding: 5px;
	    }
	    
	    table th {
	        background: #eee;
	    }
	</style>
	<meta charset="utf-8">
</head>

<body>
	<h1>Библиотека</h1>

	<table>
	    <tr>
	        <th>Название</th>
	        <th>Автор</th>
	        <th>Год выпуска</th>
	        <th>Жанр</th>
	        <th>ISBN</th>
	    </tr>
		<?php echo $table_string; ?>
	</table>
</body>
</html>

