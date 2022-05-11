
# Change Log
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [PhpBB User Reminder/Manager](https://www.phpbb.com/customise/db/extension/phpbb_inactive_user_manager_reminder/).

## [1.2.0] - 2022-03-30

It's a solo effort to make this ext so please be patient and helpful if possible!
In this version some internal issues have been addressed.
I tried to implement some of the requested features. Let me know your ideas.

### Added
- Ability to set different intervals for each of the 3 reminders.
- Option to respect each user's choice of communication. (receive e-mail from admins or not)

### Changed
- The way the ext fetches and sends reminders to the users.
- Language, for the extra options.
- Removed unused variables for the e-mail templates
- Email templates minor change, make sure to update it in your languages accordingly.
- Dropped unused column.

### Fixed
- Minor issues, typos.
- From: was not showing boards information in received e-mails