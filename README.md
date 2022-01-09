# UnifiControllerStub
UnifiControllerStub for PHP testing of curl API requests


## Table of Contens

1. [Integrate the UnifiControllerStub in your Git repository as submodule](#1-integrate-the-unificontrollerstub-in-your-git-repository-as-submodule)
2. [Setup PHP for using the UnifiControllerStub](#2-setup-php-for-using-the-unificontrollerstub)
3. [Setup GitHub Action for automated tests](#3-setup-github-action-for-automated-tests)
4. [How to use UnifiControllerStub](#4-how-to-use-unificontrollerstub)
5. [PHP functions](#5-php-functions)
6. [Version History](#6-version-history)
7. [Do you need help or are you having suggestions?](#7-do-you-need-help-or-are-you-having-suggestions)
8. [How to contribute?](#8-how-to-contribute)



## 1. Integrate the UnifiControllerStub in your Git repository as submodule

### Why submodules?

In Git you can add a submodule to a repository. This is basically a repository embedded in your **main** repository. 


### Basics

When you add a submodule in Git, you don't add the **code** of the submodule to the main repository, you only add **information about the submodule** that is added to the main repository. This information describes which **commit the submodule is pointing** at. This way, the submodule's **code** won't automatically be updated if the submodule's **repository** is updated. This is good, because your code might not work with the latest commit of the submodule, it prevents unexpected behaviour.


### Adding a submodule

You can add a submodule to a repository like this:

```ShellSession
git submodule add https://github.com/Brovning/UnifiControllerStub tests/UnifiControllerStub
```

If you have some conflicts, you can force the submodule add with:

```ShellSession
git submodule add --force https://github.com/Brovning/UnifiControllerStub tests/UnifiControllerStub
```


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

```ShellSession
git submodule update
```
    
If a submodule is not initiated yet, add the `--init` flag. If any submodule has submodules itself, you can add the `--recursive` flag to recursively init and update submodules.

If you never run this command, the **code** of your submodule will stay checked out to an **old** commit.


### Making it easier for everyone

It is sometimes annoying if you forget to initiate and update your submodules. 

Fortunately, there are some tricks to make it easier:

```ShellSession
git clone --recurse-submodules
```
    
This will clone a repository and also check out and init any possible submodules the repository has.

```ShellSession
git pull --recurse-submodules
```
    
This will pull the main repository and also it's submodules.

Alternative way for updating all submodules in your repository:

```ShellSession
git submodule foreach git pull origin master
```


## 2. Setup PHP for using the UnifiControllerStub

In the UnifiControllerStub a redeclaration of the curl functions is made.
If you use the UnifiControllerStub, you have to deactivate/remove the curl extension, to avoid an error message like this:
> [PHP Fatal error:  Cannot redeclare curl_close() in /home/runner/work/Unifi-Toolbox/Unifi-Toolbox/tests/UnifiControllerStub/UnifiControllerStub.php on line 166]

To remove the curl extension from your PHP configuration, you have to look for your php.ini and open it.
Remove the curl extension line in your php.ini or add a `;` in front of it to have it commented (no longer used for extension integration).
```INI
;extension=curl.so
```

You can show the currently used php.ini path by using:
```ShellSession
php --ini
```

or:
```ShellSession
php -i
```

Your php.ini can be printed on the terminal by using e.g.:
```ShellSession
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
```YAML
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


## 4. How to use UnifiControllerStub

... to be added


## 5. PHP functions

### Unifi default values

$ControllerType = 0;

$Site = "default";

$ServerAddress = "192.168.1.1";

$ServerPort = "443";

$UserName = "testuser";

$Password = "testpass";

$Cookie = "0123456789";

$Xcsrftoken = "1234567890";


### Unifi Set() and Get() functions
```php
function Unifi_setControllerType(int $newControllerType = 0): void
```


```php
function Unifi_getControllerType(): int
```


```php
function Unifi_setSite(string $newSite = "default"): void
```


```php
function Unifi_getSite(): string
```


```php
function Unifi_setServerAddress(string $newServerAddress = "192.168.1.1"): void
```


```php
function Unifi_getServerAddress(): string
```


```php
function Unifi_setServerPort(string $newServerPort = "443"): void
```


```php
function Unifi_getServerPort(): string
```


```php
function Unifi_setUserName(string $newUserName = "testuser"): void
```


```php
function Unifi_getUserName(): string
```


```php
function Unifi_setPassword(string $newPassword = "testpass"): void
```


```php
function Unifi_getPassword(): string
```


```php
function Unifi_setCookie(string $newCookie = "0123456789"): void
```


```php
function Unifi_getCookie(): string
```


```php
function Unifi_setxcsrftoken(string $newXcsrftoken = "1234567890"): void
```


```php
function Unifi_getxcsrftoken(): string
```


### CURL functions

```php
function curl_close(CurlHandle $handle): void
```

curl_close: Close a cURL session

```php
function curl_copy_handle(CurlHandle $handle): ?CurlHandle/*|false*/
```

curl_copy_handle: Copy a cURL handle along with all of its preferences

```php
function curl_exec(CurlHandle $handle)/*: string|bool*/
```

curl_exec: Perform a cURL session

```php
function curl_file_create(string $filename, ?string $mime_type = null, ?string $posted_filename = null): CURLFile
```

curl_file_create: Create a CURLFile object

```php
function curl_getinfo(CurlHandle $handle, ?int $option = null): ?int/*mixed*/
```

curl_getinfo: Get information regarding a specific transfer

```php
function curl_init(?string $url = null): ?CurlHandle/*|false*/
```

curl_init: Initialize a cURL session

```php
function curl_setopt(CurlHandle $handle, int $option, $value): bool
```

curl_setopt: Set an option for a cURL transfer


### CURL functions NOT implemented yet! Do you like to contribute?!?

```php
function curl_errno(CurlHandle $handle): int
```

curl_errno: Return the last error number

```php
function curl_error(CurlHandle $handle): string
```

curl_error: Return a string containing the last error for the current session

```php
function curl_escape(CurlHandle $handle, string $string): ?string/*|false*/
```

curl_escape: URL encodes the given string

```php
function curl_multi_add_handle(CurlMultiHandle $multi_handle, CurlHandle $handle): int
```

curl_multi_add_handle: Add a normal cURL handle to a cURL multi handle

```php
function curl_multi_close(CurlMultiHandle $multi_handle): void
```

curl_multi_close: Close a set of cURL handles

```php
function curl_multi_errno(CurlMultiHandle $multi_handle): int
```

curl_multi_errno: Return the last multi curl error number

```php
function curl_multi_exec(CurlMultiHandle $multi_handle, &$still_running): int
```

curl_multi_exec: Run the sub-connections of the current cURL handle

```php
function curl_multi_getcontent(CurlHandle $handle): ?string
```

curl_multi_getcontent: Return the content of a cURL handle if CURLOPT_RETURNTRANSFER is set

```php
function curl_multi_info_read(CurlMultiHandle $multi_handle, &$queued_messages = null): ?array/*|false*/
```

curl_multi_info_read: Get information about the current transfers

```php
function curl_multi_init(): CurlMultiHandle
```

curl_multi_init: Returns a new cURL multi handle

```php
function curl_multi_remove_handle(CurlMultiHandle $multi_handle, CurlHandle $handle): int
```

curl_multi_remove_handle: Remove a multi handle from a set of cURL handles

```php
function curl_multi_select(CurlMultiHandle $multi_handle, float $timeout = 1.0): int
```

curl_multi_select: Wait for activity on any curl_multi connection

```php
function curl_multi_setopt(CurlMultiHandle $multi_handle, int $option, mixed $value): bool
```

curl_multi_setopt: Set an option for the cURL multi handle

```php
function curl_multi_strerror(int $error_code): ?string
```

curl_multi_strerror: Return string describing error code

```php
function curl_pause(CurlHandle $handle, int $flags): int
```

curl_pause: Pause and unpause a connection

```php
function curl_reset(CurlHandle $handle): void
```

curl_reset: Reset all options of a libcurl session handle

```php
function curl_setopt_array(CurlHandle $handle, array $options): bool
```

curl_setopt_array: Set multiple options for a cURL transfer

```php
function curl_share_close(CurlShareHandle $share_handle): void
```

curl_share_close: Close a cURL share handle

```php
function curl_share_errno(CurlShareHandle $share_handle): int
```

curl_share_errno: Return the last share curl error number

```php
function curl_share_init(): CurlShareHandle
```

curl_share_init: Initialize a cURL share handle

```php
function curl_share_setopt(CurlShareHandle $share_handle, int $option, mixed $value): bool
```

curl_share_setopt: Set an option for a cURL share handle

```php
function curl_share_strerror(int $error_code): ?string
```

curl_share_strerror: Return string describing the given error code

```php
function curl_strerror(int $error_code): ?string
```

curl_strerror: Return string describing the given error code

```php
function curl_unescape(CurlHandle $handle, string $string): ?string/*|false*/
```

curl_unescape: Decodes the given URL encoded string

```php
function curl_version(): ?array/*|false*/
```

curl_version: Gets cURL version information


## 6. Version History

### v1.0, 2022-01-08
- first public release


## 7. Do you need help or are you having suggestions?

There is still work to be done to add functionality and further improve this UnifiControllerStub, so all suggestions/comments are welcome. 

Please use the [GitHub Discussions](https://github.com/Brovning/UnifiControllerStub/discussions) to share your suggestions and questions.


## 8. How to contribute?

If you would like to contribute, please open an [issue](https://github.com/Brovning/UnifiControllerStub/issues) and include your code there or commit your changes to a fork and create a [pull request](https://github.com/Brovning/UnifiControllerStub/pulls).
