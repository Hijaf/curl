<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>CURLing Me</title>
        <link href="<?= site_url().CSS_DIR?>" rel="stylesheet" type="text/css" />
</head>
<body>
    <header>
        <h1><a href="<?= site_url()?>" title="Vers l'accueil du site">CURLing Me</a></h1>
    </header>
    <div id="curl">    
            <?= $vue?>
    </div>
    <script src="<?= site_url().JQ_DIR?>"></script>
    <script src="<?= site_url().JS_DIR?>"></script>
</body>
</html>