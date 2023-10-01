
# Change Log
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [PhpBB Inactive User Reminder/Manager](https://www.phpbb.com/customise/db/extension/phpbb_inactive_user_manager_reminder/).

## [1.3.5] - 2023-10-10

It's a solo effort to make this ext so please be patient and helpful if possible!
In this version some internal issues have been addressed.
I tried to implement some of the requested features. Let me know your ideas.

### Added
- Ability to set different intervals for each of the 3 reminders.
- Option to respect each user's choice of communication. (receive e-mail from admins or not)
- Option to send reminders even after the 3 remind counter.
- Do not-reply e-mail field.

### Changed
- The way the ext fetches users and sends reminders.
- Removed unused variables for the e-mail templates
- Email templates minor change, make sure to update it in your languages accordingly.
- Dropped unused column.
- Reset user's remind count only if there is reason to reset it
- Language, for the extra options.

### Fixed
- Minor issues, typos and gramatical errors.
- "From:" in the e-mail was not showing boards information when received
- bug: ignore by admin was changing to auto ignore after sending reminder and reminder count was > 3
- bug: if user returns and he was ignored by "admin" he would continue being ignored, so if he would stop visiting board in the future he would not receive reminders.
