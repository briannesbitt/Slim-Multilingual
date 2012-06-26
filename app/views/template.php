<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo strtoupper($lang)?>"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang?>" lang="<?php echo $lang?>">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title><?php echo $this->tr('title')?></title>
    <style type="text/css">
    body {width:750px; margin:auto; margin-top:10px; font-family:Arial;}
    .error {color:red}
    #chooser {font-size:12px; text-align:right; color:#333;}
    #chooser a {color:#999;}
    #nav {border-bottom:1px solid black; padding-bottom:10px;}
    #title {border-bottom:1px solid black; margin-bottom:10px;}
    </style>
</head>
<body>
    <div id="chooser"><?
    $chooser = array();
    foreach($availableLangs as $availableLang) {
        if ($lang == $availableLang) {
            $chooser[] = $this->tr('chooser_'.$availableLang);
        }
        else {
            $chooser[] = sprintf('<a href="%s">%s</a>', $this->url($pathInfo, $availableLang), $this->tr('chooser_'.$availableLang));
        }
    }
    echo implode(' | ', $chooser);
    ?></div>
    <div id="nav">
        <a href="<?php echo $this->urlFor('home');?>"><?php echo $this->tr('nav-home')?></a> | 
        <a href="<?php echo $this->urlFor('about');?>"><?php echo $this->tr('nav-about')?></a> | 
        <a href="<?php echo $this->urlFor('login');?>"><?php echo $this->tr('nav-login')?></a></div>
    <div id="title"><h1><?php echo $this->tr('header')?></h1></div>
    <div>
        <? require $this->getTemplatesDirectory() . '/' . $childView; ?>
    </div>
</body>
</html>