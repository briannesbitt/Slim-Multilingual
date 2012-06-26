<?
$app->hook('slim.before', function () use ($app, $availableLangs) {
    $env = $app->environment();

    // setup default lang based on first in the list
    $lang = $availableLangs[0];

    // if they are accessing the root, you could try and direct them to the correct language
    if ($env['PATH_INFO'] == '/') {
        if (isset($env['ACCEPT_LANGUAGE'])) {

            // try and auto-detect, find the language with the lowest offset as they are in order of priority
            $priority_offset = strlen($env['ACCEPT_LANGUAGE']);

            foreach($availableLangs as $availableLang) {
                $i = strpos($env['ACCEPT_LANGUAGE'], $availableLang);
                if ($i !== false && $i < $priority_offset) {
                    $priority_offset = $i;
                    $lang = $availableLang;
                }
            }
        }
    } else {

        $pathInfo = $env['PATH_INFO'] . (substr($env['PATH_INFO'], -1) !== '/' ? '/' : '');

        // extract lang from PATH_INFO
        foreach($availableLangs as $availableLang) {
            $match = '/'.$availableLang;
            if (strpos($pathInfo, $match.'/') === 0) {
                $lang = $availableLang;
                $env['PATH_INFO'] = substr($env['PATH_INFO'], strlen($match));

                if (strlen($env['PATH_INFO']) == 0) {
                    $env['PATH_INFO'] = '/';
                }
            }
        }
    }

    $app->view()->setLang($lang);
    $app->view()->setAvailableLangs($availableLangs);
    $app->view()->setPathInfo($env['PATH_INFO']);
});