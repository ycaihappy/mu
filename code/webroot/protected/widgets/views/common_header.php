<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo $this->getController()->siteConfig->siteName?>-<?php echo $this->getController()->siteConfig->siteMetaTitle?></title>
	<meta name="Keywords" content="<?php  if (empty($keywords)) echo $this->getController()->siteConfig->siteMetaKeyword ; else echo $keywords?>" />
	<meta name="Description" content="<?php  echo $this->getController()->siteConfig->siteMetaDescription; ?>" />

    <link rel="stylesheet" href="/css/global.css">
	<link rel="shortcut icon" type="image/png" href="/img/favicon.png">


</head>
