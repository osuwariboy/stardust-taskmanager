StarDust Testing skill test
==========================

### Application
The task manager allows anybody to simply manage tasks through a web interface.

### Requirements
* php 5.6+
* mysql
* a local server (like Wamp)
* A github account
* php composer

### Installation
**You must fork and clone your fork localy first.** Then do this procedure:
```sh
composer install
php bin/console doctrine:database:create
php bin/console doctrine:schema:create
```
(optional) You can import the fixtures.sql into your newly created database if you want to start with demo data.

Then, launch a local test server from the repo with this command: 
```sh
php bin/console server:run
```
You are now ready to access the application at http://localhost:8000.

### Instructions

You will be asked to improve the code of this app with the following tasks. You can complete the tasks in any order. Separate your commits by task and put the task number in your message.

### Tasks
* #1: The user can't add a new task without a description.
* #2: The user must be able to delete a task.
* #3: The user must be able to mark a task as completed.
* #4: A confirmation message must be shown when the user successfully add, complete or delete a task _(hint: flash messages)_.
* #5: When the user clicks on a task, he must land on a task page, with buttons to complete or delete the task.
* #6: Add pagination to the task list _(optional)_.


### Documentation
This app use [Symfony 3.3](http://symfony.com/), a PHP web application framework and a set of reusable PHP components/libraries. Documentation can be found here: http://symfony.com/doc/current/index.html


### How to submit your work?

Once you are done, make a pull request on the master branch of the project and tell us how it went.

That's it. Thanks for taking the test. :)


More documentation on Github:
* https://help.github.com/articles/fork-a-repo/
* https://help.github.com/articles/using-pull-requests/
