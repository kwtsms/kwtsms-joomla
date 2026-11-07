<?php
/**
 * FILE:      .github/ci/live-send.php
 * CREATED:   2026-11-07 09:06 +03
 * TASK:      joomla-ci-install
 * AUTHOR:    M Alhassoun
 * WHAT:      Inside the Joomla container: stores the kwtSMS login the way the component does (encrypted), turns the
 *            gateway and test mode on, sends one SMS with KwtSmsApiClient::send() to KWTSMS_TEST_NUMBER with test=1,
 *            and checks the result. Prints no phone number and no credentials.
 * WHY:       Proves a fresh install works end to end (1.3.0 shipped with no tables and nobody noticed).
 * USAGE:     php /tmp/live-send.php   (run by .github/workflows/joomla-install.yml)
 * DEPENDS:   Installed pkg_kwtsms; env KWTSMS_USERNAME, KWTSMS_PASSWORD, KWTSMS_TEST_NUMBER.
 */
declare(strict_types=1);

define('_JEXEC', 1);
define('JPATH_BASE', '/var/www/html/administrator');
require JPATH_BASE . '/includes/defines.php';
require JPATH_BASE . '/includes/framework.php';

$ns = 'KwtSMS\\Component\\Kwtsms\\Administrator\\';
spl_autoload_register(static function (string $class) use ($ns): void {
    if (strpos($class, $ns) === 0) {
        $file = JPATH_ADMINISTRATOR . '/components/com_kwtsms/src/' . str_replace('\\', '/', substr($class, strlen($ns))) . '.php';
        if (is_file($file)) {
            require $file;
        }
    }
});

$container = \Joomla\CMS\Factory::getContainer();
$cfg = new JConfig();
$settingsClass = $ns . 'Service\\SettingsService';
$settings = new $settingsClass($container->get(\Joomla\Database\DatabaseInterface::class), $cfg->secret);
$settings->set('gateway_enabled', '1');
$settings->set('gateway_configured', '1');
$settings->set('test_mode', '1');
$settings->saveCredentials((string) getenv('KWTSMS_USERNAME'), (string) getenv('KWTSMS_PASSWORD'));

if ($settings->get('test_mode', '0') !== '1') {
    fwrite(STDERR, "ABORT: test mode is off, nothing sent\n");
    exit(2);
}

$creds = $settings->getCredentials();
$clientClass = $ns . 'Service\\KwtSmsApiClient';
$client = new $clientClass($creds['username'], $creds['password']);
$result = $client->send([(string) getenv('KWTSMS_TEST_NUMBER')], 'QA-joomla-ci ' . gmdate('YmdHi'), 'KWT-SMS', $settings);

$safe = array_intersect_key($result, array_flip(['result', 'reason', 'code', 'description', 'numbers', 'points-charged']));
echo 'result: ' . json_encode($safe) . "\n";
exit(($result['result'] ?? '') === 'OK' ? 0 : 1);
