# UnifiControllerStub
UnifiControllerStub for PHP testing of curl API requests


## Table of Contens

1. [Integrate the UnifiControllerStub in your Git repository as submodule](#1-integrate-the-unificontrollerstub-in-your-git-repository-as-submodule)
2. [Setup PHP for using the UnifiControllerStub](#2-setup-php-for-using-the-unificontrollerstub)
3. [Setup GitHub Action for automated tests](#3-setup-github-action-for-automated-tests)
4. [PHP functions](#4-php-functions)
5. [Version History](#5-version-history)
6. [Do you need help or are you having suggestions?](#6-do-you-need-help-or-are-you-having-suggestions)
7. [How to contribute?](#7-how-to-contribute)


## 1. Integrate the UnifiControllerStub in your Git repository as submodule

### Why submodules?

In Git you can add a submodule to a repository. This is basically a repository embedded in your **main** repository. 


### Basics

When you add a submodule in Git, you don't add the **code** of the submodule to the main repository, you only add **information about the submodule** that is added to the main repository. This information describes which **commit the submodule is pointing** at. This way, the submodule's **code** won't automatically be updated if the submodule's **repository** is updated. This is good, because your code might not work with the latest commit of the submodule, it prevents unexpected behaviour.


### Adding a submodule

You can add a submodule to a repository like this:

    git submodule add https://github.com/Brovning/UnifiControllerStub tests/UnifiControllerStub

If you have some conflicts, you can force the submodule add with:

    git submodule add --force https://github.com/Brovning/UnifiControllerStub tests/UnifiControllerStub


After this operation, if you do a `git status` you'll see two files in the `Changes to be committed` list: 

the `.gitmodules` file and the path to the submodule. 

When you commit and push these files you commit/push just a reference to the submodule to your repository.


### Pushing updates in the submodule

The submodule is just a separate repository. If you want to make changes
to it, you have to switch to this repository and push them like
in a regular Git repository. 


### Keeping your submodules up-to-date

Even if there are changes in the UnifiControllerStub repository, this update will not be done automatically in your repository by `git pull`, because with `git pull` it only retrieves the **information** that the submodule is **pointing** to another **commit**, but doesn't update the submodule's **code**. 

To update the **code** of your submodules, you should run:

    git submodule update
    
If a submodule is not initiated yet, add the `--init` flag. If any submodule has submodules itself, you can add the `--recursive` flag to recursively init and update submodules.

If you never run this command, the **code** of your submodule will stay checked out to an **old** commit.


### Making it easier for everyone

It is sometimes annoying if you forget to initiate and update your submodules. 

Fortunately, there are some tricks to make it easier:

    git clone --recurse-submodules
    
This will clone a repository and also check out and init any possible submodules the repository has.

    git pull --recurse-submodules
    
This will pull the main repository and also it's submodules.

Alternative way for updating all submodules in your repository:

    git submodule foreach git pull origin master


## 2. Setup PHP for using the UnifiControllerStub

In the UnifiControllerStub a redeclaration of the curl functions is made.
If you use the UnifiControllerStub, you have to deactivate/remove the curl extension, to avoid an error message like this:
> [PHP Fatal error:  Cannot redeclare curl_close() in /home/runner/work/Unifi-Toolbox/Unifi-Toolbox/tests/UnifiControllerStub/UnifiControllerStub.php on line 166]

To remove the curl extension from your PHP configuration, you have to look for your php.ini and open it.
Remove the curl extension line in your php.ini or add a `;` in front of it to have it commented (no longer used for extension integration).
```
;extension=curl.so
```

You can show the currently used php.ini path by using:
```
php --ini
```
or:
```
php -i
```

Your php.ini can be printed on the terminal by using e.g.:
```
cat /home/runner/work/Unifi-Toolbox/Unifi-Toolbox/tests/UnifiControllerStub/php.ini
```

There is an example [php.ini](php.ini), which is containing all recommended PHP configuration settings for PHPUnit.
This [php.ini](php.ini) is working e.g. with GitHub actions, using ubuntu with PHP 8.1.


## 3. Setup GitHub Action for automated tests

For automated tests in GitHub you have to create a workflow in the folder `.github/workflows/`.

See also the official [GitHub Workflow documentation](https://docs.github.com/en/actions/learn-github-actions/workflow-syntax-for-github-actions) for creating actions.

The file can be named for example `ValidationTests.yml`.

In phpdbg you can set the php.ini which shall be used with the parameter `-c` and ignore the default php.ini with the parameter `-n`.

If your repository in GitHub is named "Unifi-Toolbox" the content of "ValidationTests.yml" must look like this:
```
name: Validation Tests

on: [push, pull_request]

jobs:

  test:
 
    runs-on: ubuntu-latest
 
    steps:
    - uses: actions/checkout@v1
      with:
          submodules: true

    - name: Install latest PHPUnit
      run: wget https://phar.phpunit.de/phpunit.phar

    - name: Run Tests
      run: phpdbg -c /home/runner/work/Unifi-Toolbox/Unifi-Toolbox/tests/UnifiControllerStub/php.ini -nqrr phpunit.phar tests
```


## 4. PHP functions


## 5. Version History

### v1.0, 2022-01-08
- first public release


## 6. Do you need help or are you having suggestions?

There is still work to be done to add functionality and further improve this UnifiControllerStub, so all suggestions/comments are welcome. 

Please use the [GitHub Discussions](https://github.com/Brovning/UnifiControllerStub/discussions) to share your suggestions and questions.


## 7. How to contribute?

If you would like to contribute, please open an [issue](https://github.com/Brovning/UnifiControllerStub/issues) and include your code there or commit your changes to a fork and create a [pull request](https://github.com/Brovning/UnifiControllerStub/pulls).
