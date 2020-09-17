[![Build Status](https://travis-ci.org/andreaskou/PHPBB_IUM.svg?branch=master)](https://travis-ci.org/andreaskou/PHPBB_IUM)
# phpBB Inactive User Manager v 1.1.7-RC

phpBB Inactive User Manager is an Extension for [phpBB 3.1/3.2/3.3](https://www.phpbb.com/)

## Description

phpBB Inactive User Manager will allow you to manage inactive users in your phpBB3 board.
The extension is in a very early stage but I will try to update as often as I can.
Please let me know your ideas and thoughts.

## Features:

EXT sends e-mail reminders to users that are inactive for a certain amount of time. If user will not wake up after the 3d reminder user will be enabled for (auto) purging. After 3 reminders the ext stops sending reminders to user and admin will be able to delete that user.
Also user can self delete his account (with or without the approval of the administrator)

* List of inactive users and their reminders status
* Automatically send reminders to inactive users
* Two different templates depending on user's status
* Define by admin interval of days to consider a user as "sleeper"
* Define by admin how many reminders (mails) per day to send
* Option to include user's/forums top active topics in mail
* Exclude/Include forums for the e-mail reminder.
* Option to self delete for a user. (with or without admins approval)
* Ignore users. List of users that the ext should not send reminders
* Admin is able to send reminders to individual inactive users

## Installation

Clone into phpBB/ext/andreask/ium:

    git clone https://github.com/andreaskou/PHPBB_IUM.git phpBB/ext/andreask/ium

Go to "ACP" > "Customise" > "Extensions" and enable the "Inactive User Manager" extension.

## Collaborate

* Create a issue in the [tracker](https://github.com/andreaskou/PHPBB_IUM/issues)
* Note the restrictions for [branch names](https://wiki.phpbb.com/Git#Branch_Names) and [commit messages](https://wiki.phpbb.com/Git#Commit_Messages) are similar to phpBB3
* Submit a [pull-request](https://github.com/andreaskou/PHPBB_IUM/pulls)

## License

[GPLv2](license.txt)
