<?
$app->get('/', function () use ($app) {
    $app->render('home.php');
})->name('home');

$app->get('/about', function () use ($app) {
    $app->render('about.php');
})->name('about');

$app->get('/login', function () use ($app) {
    $app->render('login.php');
})->name('login');

$app->post('/login', function () use ($app) {
    $app->render('login.php', array('error' => $app->view()->tr('login-error-dne', array('email' => $app->request()->post('email')))));
})->name('loginPost');