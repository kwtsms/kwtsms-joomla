# Changelog

All notable changes to kwtSMS for Joomla will be documented here.

## [Unreleased]

## [1.3.1] - 2026-11-07

### Fixed
- A fresh install created no database tables, so settings could not be saved ("Failed to save settings."), and uninstalling left the tables behind. Sites already on 1.3.0 get the tables when they update.
- Every send was refused as "outside your account coverage" when the credentials were saved with Save instead of Login. The check now waits until coverage has been synced; kwtSMS still refuses numbers outside your coverage.
- The test SMS and VirtueMart messages failed with ERR002 until a Sender ID was chosen. KWT-SMS is used until you choose one.

### Changed
- Docs and examples use the placeholder 965XXXXXXXX instead of a sample mobile number.

### Added
- Requests to kwtSMS carry the integration name and version (no personal data) so kwtSMS can see which integrations are in use.
- Initial release
- pkg_kwtsms package bundling com_kwtsms, plg_system_kwtsms, plg_task_kwtsms, plg_vmcustom_kwtsms
- 6-tab admin panel: Dashboard, Settings, Templates, Integrations, Logs, Help
- kwtSMS REST/JSON API client with full send pipeline
- VirtueMart order notifications (new order, status change)
- Daily cron sync via Joomla Task Scheduler
- English and Arabic language support
- PHPUnit test suite with real API integration tests
