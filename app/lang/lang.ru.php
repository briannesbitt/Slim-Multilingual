<?
$locale['title'] = 'Многоязычный сайт с Slim';
$locale['header'] = $locale['title'];

$locale['nav-home'] = 'Главная страница';
$locale['nav-about'] = 'о';
$locale['nav-login'] = 'вход';

$locale['home-content'] = <<<TEXT
<p>русский © You can see that this is generated with the &copy; html entity.</p>
<p>This is just PHP so you can use Heredoc for longer text.  Heredoc text behaves just like a double-quoted string, without the double quotes. This means that quotes in a heredoc do not need to be escaped, but the escape codes listed above can still be used. Variables are expanded, but the same care must be taken when expressing complex variables inside a heredoc as with strings.</p>
TEXT;

$locale['login-email']    = 'Отправить по электронной почте';
$locale['login-password'] = 'пароль';
$locale['login-submit']   = 'вход';
$locale['login-error-dne'] = 'Sorry, there is no user with an email of "{{email}}" and you get the idea so I am not looking this one up on babelfish.';