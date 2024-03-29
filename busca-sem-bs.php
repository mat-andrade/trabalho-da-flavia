<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pesquisa por '<?= $_GET["pesquisa"]; ?>'</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css"><?php include "estilo.css"; ?></style>
</head>
<body>
	<div class="conteudo">
		<?php
		include "barra-nav.html";
		include "funcoes.php";
		$categorias = selectCatsPorFilme($_GET["pesquisa"]);
		$filme = selectFilme($_GET["pesquisa"]);
		if ($filme):
			$sugestoes = selectSugestoes($filme["id"], -1, 0.0);
		?>
			<h1>Resultados da pesquisa por '<?= $_GET["pesquisa"]; ?>'</h1>
			<h2>Filme encontrado: <?= $filme["nome"];?></h2>
			<img src="img\<?= $filme['capa']; ?>" width=200>
			<p>Descrição: <?= $filme["descricao"]; ?></p>
			<p>
				<b>Categorias:</b>
					<?php
					$ultimo = array_key_last($categorias);
					foreach ($categorias as $i => $categoria)
					{
						echo $categoria . ($i != $ultimo ? ", " : "");
					}
					?>
			</p>
			<h2>Sugestões</h2>
			<center>
				<div id="sugestoes">
				<?php foreach ($sugestoes as $filme): ?>
					<div class="sugestao">
						<h3><?= $filme["nome"]; ?></h3>
						<img src="img\<?= $filme['capa'];  ?>" width=200>
						<p>Descrição: <?= $filme["descricao"]; ?></p>
					</div>
				<?php endforeach; ?>
				</div>
			</center>
		<?php else: ?>
			<h1>Filme '<?= $_GET["pesquisa"]; ?>' não encontrado</h1>
			<h2>Tente procurar com termos mais genéricos. Lembre-se que só é possível procurar pelo título.</h2>
		<?php endif; ?>
	</div>
</body>
</html>