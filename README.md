# UnifiControllerStub
UnifiControllerStub for PHP testing of curl API requests


## Integrate the UnifiControllerStub in your Git repository as submodule

### Why submodules?

In Git you can add a submodule to a repository. This is basically a repository embedded in your **main** repository. 


### Basics

When you add a submodule in Git, you don't add the **code** of the submodule to the main repository, you only add **information about the submodule** that is added to the main repository. This information describes which **commit the submodule is pointing** at. This way, the submodule's **code** won't automatically be updated if the submodule's **repository** is updated. This is good, because your code might not work with the latest commit of the submodule, it prevents unexpected behaviour.


### Adding a submodule

You can add a submodule to a repository like this:

    git submodule add https://github.com/Brovning/UnifiControllerStub tests/UnifiControllerStub


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


## Setup PHP for using the UnifiControllerStub

In the UnifiControllerStub a redeclaration of the curl functions is made.
If you use the UnifiControllerStub, you have to deactivate/remove the curl extension, to avoid an error message like this:
> [PHP Fatal error:  Cannot redeclare curl_close() in /home/runner/work/Unifi-Toolbox/Unifi-Toolbox/tests/UnifiControllerStub/UnifiControllerStub.php on line 166]

To remove the curl extension from your PHP configuration, you have to look for you php.ini and open it.
Remove the curl extension line in your php.ini or add a ';' in front of it to have it commented (no longer used for extension integration).
```
;extension=curl.so
```

There is an example [php.ini](php.ini), which is containing all recommended PHP configuration settings for PHPUnit.
This [php.ini](php.ini) is working e.g. with GitHub actions, using ubuntu with PHP 8.1.


## Setup GitHub Action for automated tests

For automated tests in GitHub you have to create a workflow in the folder ".github/workflows/".
The file can be named for example "ValidationTests.yml".
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


