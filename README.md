<picture>
  <source media="(prefers-color-scheme: dark)" srcset=".github/assets/readme-header-dark.png">
  <img alt="kwtSMS: SMS gateway for Kuwait" src=".github/assets/readme-header-light.png">
</picture>

# kwtSMS for Joomla

[![CI](https://github.com/kwtsms/kwtsms-joomla/actions/workflows/ci.yml/badge.svg)](https://github.com/kwtsms/kwtsms-joomla/actions/workflows/ci.yml)
[![Latest release](https://img.shields.io/github/v/release/kwtsms/kwtsms-joomla)](https://github.com/kwtsms/kwtsms-joomla/releases/latest)
[![Joomla](https://img.shields.io/badge/Joomla-4%2B-1A3867?logo=joomla&logoColor=white)](https://extensions.joomla.org/extension/kwtsms/)
[![PHP](https://img.shields.io/badge/PHP-8.1%2B-777BB4?logo=php&logoColor=white)](https://www.php.net)
[![License](https://img.shields.io/badge/License-GPL%20v2%2B-blue)](LICENSE)

Send SMS to your VirtueMart customers when they order and when their order status changes, through kwtSMS, the
Kuwaiti SMS gateway.

kwtSMS delivers to Zain, Ooredoo, stc and Virgin in Kuwait and to more than 200 countries, with your own Sender ID,
free API testing and credits that do not expire.

## Features

**Notifications**
- VirtueMart order SMS to the customer: new order and order status changes.
- Message templates in English and Arabic.

**Admin**
- One admin panel with six tabs: Dashboard, Settings, Templates, Integrations, Logs and Help.
- Balance, Sender IDs and coverage synced daily.
- Every message logged with the full API response.
- Test mode: messages are queued on kwtSMS and not delivered.
- Phone numbers normalized and checked against your coverage, messages cleaned before sending.

## Requirements

- Joomla 4.0 or later (tested on Joomla 5 and 6), PHP 8.1 or later, MySQL 8.0 or later.
- VirtueMart 4.x for order notifications.
- A kwtSMS account (free test account, no papers): https://www.kwtsms.com/cportal/signup/

## Installation

1. Download the package from the [Joomla Extensions Directory](https://extensions.joomla.org/extension/kwtsms/) or
   the [latest release](https://github.com/kwtsms/kwtsms-joomla/releases/latest).
2. In the Joomla administrator go to **System > Install > Extensions**, upload the package and install it.
3. Under **System > Manage > Plugins**, enable the kwtSMS system, task and VirtueMart plugins.

## Setup

1. Open **Components > kwtSMS > Settings**.
2. Enter the API username and password of your kwtSMS account. They are not your mobile number.
3. Click **Test Connection**: it checks the login and saves it.
4. Choose your Sender ID, turn on test mode for a first try, and enable the gateway.
5. In **Templates**, adjust the order messages; in **Integrations**, choose which order events send SMS.
6. Place a test order. The message appears in **Logs**. Turn test mode off when you are ready to send for real.

Test mode messages are not delivered, but their credits are held until you delete them from the Sending Queue in your
kwtSMS account.

## Arabic

The admin panel and the plugin texts are available in Arabic, and Arabic SMS templates are sent as Unicode. One SMS
page holds 70 Arabic characters, against 160 English ones.

## FAQ

**Which username do I use?** The API username and password of your kwtSMS account, not your mobile number.

**Why do test messages not arrive?** Test mode queues messages without delivering them. Turn it off in Settings.

**What is a Sender ID?** The name shown as the sender on the phone. See the
[Sender ID help](https://www.kwtsms.com/sender-id-help.html).

## Changelog

See the [releases](https://github.com/kwtsms/kwtsms-joomla/releases).

## Support

Help: https://www.kwtsms.com/support.html | FAQ: https://www.kwtsms.com/faq/ |
API: [developers](https://www.kwtsms.com/developers.html), [API reference](https://www.kwtsms.com/api-documentation.html) |
[Issues](https://github.com/kwtsms/kwtsms-joomla/issues)

## Security

See [SECURITY.md](SECURITY.md).

## License

GNU General Public License v2 or later, (c) kwtSMS (BoxLink Center). See [LICENSE](LICENSE).
