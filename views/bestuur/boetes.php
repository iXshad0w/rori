<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<style>
			* {
				font-family: sans-serif;
			}
			a{
			    display: block;
			    margin-bottom: 10px;
			}
			h1 {
				margin: 0;
				padding: 24px;
				background: #424242;
				color: #FFF;
				border-top-left-radius: 2px;
				border-top-right-radius: 2px;
			}
			table {
				border-collapse: collapse;
				border-bottom-left-radius: 2px;
				border-bottom-right-radius: 2px;
				margin-bottom: 20px;
			}
			table th {
				background: #2196F3;
				color: #ffffff;
				font-weight: bold;
			}
			table td,
			table th {
				padding: 12px 20px;
			}
			table > tbody > tr:nth-child(even) {
				background: #424242;
				color: #fff;
			}
			table > tbody > tr:nth-child(odd) {
				background: #eee;
			}
		</style>
	</head>
	<body>
		<h1>Bestuur Boetes</h1>
		<table width="100%">
			<thead>
				<tr>
					<?php foreach ($spelers[0] as $key => $value): ?>
						<th align="left">{{ $key }} </th>
					<?php endforeach ?>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($spelers as $key => $speler): ?>
					<tr>
						<?php foreach ($speler as $key => $value): ?>
							<td>{{ $value }}</td>
						<?php endforeach ?>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<a href="#" onclick="window.history.back();">Terug</a>
	</body>
</html>