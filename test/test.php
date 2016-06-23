<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php"); ?>
    
<!doctype html>
        <html lang="ru">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Canvas Draw Test</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand">
						Canvas Draw Test
					</a>
				</div>
				<ul class="nav navbar-nav">
                                        <li><a href="?show=list" class="nav-link">Список рисунков</a></li>
					<li><a href="?show=edit" class="nav-link">Создать рисунок</a></li>
				</ul>            
			</div>
		</nav>
            
<?
                $APPLICATION->IncludeComponent(
                    "brainkit:draw",
                    "",
                    Array(
                         "HL_BLOCK_DRAW_ID" => 3,
                    )
                );   
?>
            
        </body>
</html>

<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");

