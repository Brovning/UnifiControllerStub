<?php

declare(strict_types=1);

include_once __DIR__.'/UnifiControllerStub.inc.php';

/* ***************************************
    Unifi Default Values
 *************************************** */
$ControllerType = 0;
$Site = "default";
$ServerAddress = "192.168.1.1";
$ServerPort = "443";
$UserName = "testuser";
$Password = "testpass";
$Cookie = "0123456789";
$Xcsrftoken = "1234567890";


/* ***************************************
    Unifi Set() and Get() functions
 *************************************** */
function Unifi_setControllerType(int $newControllerType = 0): void
{
    global $ControllerType;
    $ControllerType = $newControllerType;
}

function Unifi_getControllerType(): int
{
    global $ControllerType;
    return $ControllerType;
}

function Unifi_setSite(string $newSite = "default"): void
{
    global $Site;
    $Site = $newSite;
}

function Unifi_getSite(): string
{
    global $Site;
    return $Site;
}

function Unifi_setServerAddress(string $newServerAddress = "192.168.1.1"): void
{
    global $ServerAddress;
    $ServerAddress = $newServerAddress;
}

function Unifi_getServerAddress(): string
{
    global $ServerAddress;
    return $ServerAddress;
}

function Unifi_setServerPort(string $newServerPort = "443"): void
{
    global $ServerPort;
    $ServerPort = $newServerPort;
}

function Unifi_getServerPort(): string
{
    global $ServerPort;
    return $ServerPort;
}

function Unifi_setUserName(string $newUserName = "testuser"): void
{
    global $UserName;
    $UserName = $newUserName;
}

function Unifi_getUserName(): string
{
    global $UserName;
    return $UserName;
}

function Unifi_setPassword(string $newPassword = "testpass"): void
{
    global $Password;
    $Password = $newPassword;
}

function Unifi_getPassword(): string
{
    global $Password;
    return $Password;
}

function Unifi_setCookie(string $newCookie = "0123456789"): void
{
    global $Cookie;
    $Cookie = $newCookie;
}

function Unifi_getCookie(): string
{
    global $Cookie;
    return $Cookie;
}

function Unifi_setxcsrftoken(string $newXcsrftoken = "1234567890"): void
{
    global $Xcsrftoken;
    $Xcsrftoken = $newXcsrftoken;
}

function Unifi_getxcsrftoken(): string
{
    global $Xcsrftoken;
    return $Xcsrftoken;
}

/* ***************************************
    CURL
 *************************************** */

/**
 * @strict-properties
 * @not-serializable
 */
final class CurlHandle
{
    protected $CURLOPT = array();
    protected $CURLINFO = array();

    public function setOpt($option, $value)
    {
        $this->$CURLOPT[$option] = $value;
    }

    public function getOpt($option)
    {
        if (isset($this->$CURLOPT[$option])) {
            return $this->$CURLOPT[$option];
        } else {
            null;
        }
    }

    public function setInfo($option, $value)
    {
        $this->$CURLINFO[$option] = $value;
    }

    public function getInfo($option)
    {
        if (isset($this->$CURLINFO[$option])) {
            return $this->$CURLINFO[$option];
        } else {
            null;
        }
    }
}

/**
 * @strict-properties
 * @not-serializable
 */
final class CurlMultiHandle
{
}

/**
 * @strict-properties
 * @not-serializable
 */
final class CurlShareHandle
{
}


/*
curl_close
Close a cURL session
return: void
 */
function curl_close(CurlHandle $handle): void
{
    echo "\n***************\curl_close() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_copy_handle
Copy a cURL handle along with all of its preferences
 */
function curl_copy_handle(CurlHandle $handle): ?CurlHandle/*|false*/
{
    $CurlHandle = new CurlHandle();
    return $CurlHandle;
}

/*
curl_errno
Return the last error number
 */
function curl_errno(CurlHandle $handle): int
{
    echo "\n***************\curl_errno() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_error
Return a string containing the last error for the current session
 */
function curl_error(CurlHandle $handle): string
{
    echo "\n***************\curl_error() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_escape
URL encodes the given string
 */
function curl_escape(CurlHandle $handle, string $string): ?string/*|false*/
{
    echo "\n***************\curl_escape() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_exec
Perform a cURL session
 */
function curl_exec(CurlHandle $handle)/*: string|bool*/
{
    global $ControllerType, $ServerAddress, $ServerPort, $UserName, $Password, $Cookie, $Xcsrftoken;

    // check if URL has been defined
    if (null === $handle->getOpt(CURLOPT_URL)) {
        return false;
    }

    $url = $handle->getOpt(CURLOPT_URL);

    echo "\ncurl_exec URL:".$url."\n";

    // check IP and Port
    if (false === strpos($url, $ServerAddress) || false === strpos($url, $ServerPort)) {
        return false;
    }

    // check ControllerType and RequestedURL
    if (
        (0 == $ControllerType && false === strpos($url, "/proxy/network/") && false === strpos($url, "/api/auth/login"))
        || (1 == $ControllerType && false !== strpos($url, "/proxy/network/") && false !== strpos($url, "/api/auth/login"))
    ) {
        $httpCode = '404';
        if (null !== $handle->getOpt(CURLOPT_HEADER) && true == $handle->getOpt(CURLOPT_HEADER)) {
            $returnValue = 'HTTP/2 404 <CR><LF>vary: Origin<CR><LF>x-dns-prefetch-control: off<CR><LF>x-frame-options: SAMEORIGIN<CR><LF>strict-transport-security: max-age=15552000; includeSubDomains<CR><LF>x-download-options: noopen<CR><LF>x-content-type-options: nosniff<CR><LF>x-xss-protection: 1; mode=block<CR><LF>accept-ranges: bytes<CR><LF>x-csrf-token: '.$Xcsrftoken.'<CR><LF>x-response-time: 3ms<CR><LF>set-cookie: TOKEN='.$Cookie.'; path=/; samesite=none; secure; httponly<CR><LF>content-type: text/plain; charset=utf-8<CR><LF>content-length: 3<CR><LF>date: '.date(DATE_RFC2822).'<CR><LF><CR><LF>404';
            $handle->setInfo(CURLINFO_HEADER_SIZE, strpos($returnValue, "httponly"));
            $handle->setInfo(CURLINFO_HTTP_CODE, $httpCode);
            return $returnValue;
        } else {
            return $httpCode;
        }
    }
    // remove controller specific part
    else {
        $url = str_replace(array("/proxy/network/", "/api/auth", "https://".$ServerAddress, ":".$ServerPort), array("/", "/api", "", ""), $url);
    }

    // check credentials (only if in login-phase!)
    if (null !== $handle->getOpt(CURLOPT_POSTFIELDS)) {
        echo "\ncurl_exec CURLOPT_POSTFIELDS: ".$handle->getOpt(CURLOPT_POSTFIELDS);
        $controller0 = @explode("&", $handle->getOpt(CURLOPT_POSTFIELDS));
        $controller0 = str_ireplace(array("username=", "password="), array("", ""), $controller0);
        echo "\ncurl_exec Controller0:";
        print_r($controller0);
        $controller1 = @json_decode($handle->getOpt(CURLOPT_POSTFIELDS));
        echo "\ncurl_exec Controller1:";
        print_r($controller1);
    } else {
        $controller0 = array(null, null);
        $controller1 = array(null, null);
    }
    if ("/api/login" == $url &&
    (($UserName != $controller0[0] && $UserName != $controller1[0])
    || ($Password != $controller0[1] && $Password != $controller1[1]))) {
        $httpCode = '401';
        if (null !== $handle->getOpt(CURLOPT_HEADER) && true == $handle->getOpt(CURLOPT_HEADER)) {
            $returnValue = 'HTTP/2 401 <CR><LF>vary: Origin<CR><LF>x-dns-prefetch-control: off<CR><LF>x-frame-options: SAMEORIGIN<CR><LF>strict-transport-security: max-age=15552000; includeSubDomains<CR><LF>x-download-options: noopen<CR><LF>x-content-type-options: nosniff<CR><LF>x-xss-protection: 1; mode=block<CR><LF>accept-ranges: bytes<CR><LF>x-csrf-token: '.$Xcsrftoken.'<CR><LF>content-type: application/json; charset=utf-8<CR><LF>content-length: 56<CR><LF>x-response-time: 411ms<CR><LF>set-cookie: TOKEN='.$Cookie.'; path=/; samesite=none; secure; httponly<CR><LF>date: '.date(DATE_RFC2822).'<CR><LF><CR><LF>{<LF>  "errors": [<LF>    "Invalid username or password"<LF>  ]<LF>}';
            $handle->setInfo(CURLINFO_HEADER_SIZE, strpos($returnValue, "httponly"));
            $handle->setInfo(CURLINFO_HTTP_CODE, $httpCode);
            return $returnValue;
        } else {
            return $httpCode;
        }
    }

    // check cookie (only if not in login-phase!)
    //curl_setopt($ch, CURLOPT_HTTPHEADER, array("cookie: ".$Cookie));
    echo "\ncurl_exec CURLOPT_HTTPHEADER: ";
    if ("/api/login" != $url) {
        if (null !== $handle->getOpt(CURLOPT_HTTPHEADER)) {
            foreach ($handle->getOpt(CURLOPT_HTTPHEADER) as $httpHeader) {
                if (false !== strpos($httpHeader, "cookie:")) {
                    if (false === strpos($httpHeader, "=".$Cookie)) {
                        $CookieIssue = true;
                    } else {
                        $CookieIssue = false;
                        break;
                    }
                }
            }
        } else {
            $CookieIssue = true;
        }

        if ($CookieIssue) {
            return "CookieIssue";
        }
    }

    // get return data
    switch ($url) {
        case "/api/login":
            $httpCode = '200';
            if (null !== $handle->getOpt(CURLOPT_HEADER) && true == $handle->getOpt(CURLOPT_HEADER)) {
                $returnValue = 'HTTP/2 200 <CR><LF>vary: Origin<CR><LF>x-dns-prefetch-control: off<CR><LF>x-frame-options: SAMEORIGIN<CR><LF>strict-transport-security: max-age=15552000; includeSubDomains<CR><LF>x-download-options: noopen<CR><LF>x-content-type-options: nosniff<CR><LF>x-xss-protection: 1; mode=block<CR><LF>accept-ranges: bytes<CR><LF>x-csrf-token: '.$Xcsrftoken.'<CR><LF>content-type: application/json; charset=utf-8<CR><LF>content-length: 5591<CR><LF>x-response-time: 202ms<CR><LF>set-cookie: TOKEN='.$Cookie.'; path=/; samesite=none; secure; httponly<CR><LF>date: '.date(DATE_RFC2822).'<CR><LF><CR><LF>{<LF>  "unique_id": "56ba3a92-4dce-4adf-8938-79ae4542088d",<LF>  "first_name": "Brovning",<LF>  "last_name": "Brovning",<LF>  "full_name": "Brovning Brovning",<LF>  "email": "",<LF>  "email_status": "UNVERIFIED",<LF>  "phone": "",<LF>  "avatar_relative_path": "",<LF>  "avatar_rpath2": "",<LF>  "status": "ACTIVE",<LF>  "employee_number": "",<LF>  "create_time": 1630602086,<LF>  "extras": {},<LF>  "username": "Brovning",<LF>  "local_account_exist": true,<LF>  "password_revision": 1630602086,<LF>  "sso_account": "",<LF>  "sso_uuid": "",<LF>  "sso_username": "",<LF>  "sso_picture": "",<LF>  "uid_sso_id": "",<LF>  "uid_sso_account": "",<LF>  "groups": [<LF>    {<LF>      "unique_id": "a754f8ad-4dfc-45e0-89d5-2597e1c4d2b8",<LF>      "name": "0_KG_UDMPRO",<LF>      "up_id": "",<LF>      "up_ids": [],<LF>      "system_name": "0_KG_UDMPRO",<LF>      "create_time": "2021-08-13T09:14:23Z"<LF>    }<LF>  ],<LF>  "roles": [<LF>    {<LF>      "unique_id": "ee68eeda-8397-445f-83e0-ba6575b392cd",<LF>      "name": "Super Administrator",<LF>      "system_role": true,<LF>      "system_key": "super_administrator",<LF>      "level": 2<LF>    }<LF>  ],<LF>  "permissions": {<LF>    "access.management": [<LF>      "admin"<LF>    ],<LF>    "connect.management": [<LF>      "admin"<LF>    ],<LF>    "led.management": [<LF>      "admin"<LF>    ],<LF>    "network.management": [<LF>      "admin"<LF>    ],<LF>    "protect.management": [<LF>      "admin"<LF>    ],<LF>    "system.management.location": [<LF>      "admin"<LF>    ],<LF>    "system.management.user": [<LF>      "admin"<LF>    ],<LF>    "talk.management": [<LF>      "admin"<LF>    ]<LF>  },<LF>  "scopes": [<LF>    "write:protect.viewer",<LF>    "write:protect.user:$",<LF>    "write:protect.user",<LF>    "write:protect.sensor",<LF>    "write:protect.recordingSchedule",<LF>    "write:protect.nvr",<LF>    "write:protect.light",<LF>    "write:protect.legacyUFV",<LF>    "write:protect.group",<LF>    "write:protect.doorlock",<LF>    "write:protect.display",<LF>    "write:protect.camera",<LF>    "write:protect.bridge",<LF>    "view:user_timezone",<LF>    "view:user",<LF>    "view:systemlog",<LF>    "view:settings",<LF>    "view:role",<LF>    "view:permission:viewer",<LF>    "view:permission:admin",<LF>    "view:permission",<LF>    "view:notification",<LF>    "view:location_policy",<LF>    "view:location_device",<LF>    "view:location_activity",<LF>    "view:location",<LF>    "view:holiday_timezone",<LF>    "view:holiday",<LF>    "view:group",<LF>    "view:door_group",<LF>    "view:controller:uid-agent",<LF>    "view:controller:talk",<LF>    "view:controller:protect",<LF>    "view:controller:network",<LF>    "view:controller:led",<LF>    "view:controller:connect",<LF>    "view:controller:access",<LF>    "view:cloud_access",<LF>    "view:app:users",<LF>    "view:app:settings",<LF>    "view:app:locations",<LF>    "view:access.visitor",<LF>    "view:access.systemlog",<LF>    "view:access.settings",<LF>    "view:access.schedule",<LF>    "view:access.policy",<LF>    "view:access.pin_code",<LF>    "view:access.nfc_card",<LF>    "view:access.face",<LF>    "view:access.device",<LF>    "view:access.dashboard",<LF>    "update:access.device",<LF>    "systemlog:user",<LF>    "systemlog:system",<LF>    "systemlog:location",<LF>    "systemlog:access",<LF>    "readmedia:protect.camera",<LF>    "read:protect.viewer",<LF>    "read:protect.user:$",<LF>    "read:protect.user",<LF>    "read:protect.sensor",<LF>    "read:protect.recordingSchedule",<LF>    "read:protect.nvr",<LF>    "read:protect.light",<LF>    "read:protect.legacyUFV",<LF>    "read:protect.group",<LF>    "read:protect.doorlock",<LF>    "read:protect.display",<LF>    "read:protect.camera",<LF>    "read:protect.bridge",<LF>    "open:door",<LF>    "notify:user",<LF>    "notify:location",<LF>    "notify:access",<LF>    "manage:controller:talk",<LF>    "manage:controller:network",<LF>    "manage:controller:led",<LF>    "manage:controller:connect",<LF>    "manage:controller:access",<LF>    "edit:user_timezone",<LF>    "edit:user",<LF>    "edit:systemlog",<LF>    "edit:settings",<LF>    "edit:role",<LF>    "edit:permission:viewer",<LF>    "edit:permission:admin",<LF>    "edit:notification",<LF>    "edit:location_policy",<LF>    "edit:location_device",<LF>    "edit:location_activity",<LF>    "edit:location",<LF>    "edit:holiday_timezone",<LF>    "edit:holiday",<LF>    "edit:group",<LF>    "edit:feedback",<LF>    "edit:door_group",<LF>    "edit:controller:uid-agent",<LF>    "edit:access.visitor",<LF>    "edit:access.settings",<LF>    "edit:access.schedule",<LF>    "edit:access.policy",<LF>    "edit:access.pin_code",<LF>    "edit:access.nfc_card",<LF>    "edit:access.face",<LF>    "edit:access.device",<LF>    "deletemedia:protect.camera",<LF>    "delete:protect.viewer",<LF>    "delete:protect.user:$",<LF>    "delete:protect.user",<LF>    "delete:protect.sensor",<LF>    "delete:protect.recordingSchedule",<LF>    "delete:protect.nvr",<LF>    "delete:protect.light",<LF>    "delete:protect.legacyUFV",<LF>    "delete:protect.group",<LF>    "delete:protect.doorlock",<LF>    "delete:protect.display",<LF>    "delete:protect.camera",<LF>    "delete:protect.bridge",<LF>    "delete:access.device",<LF>    "create:protect.viewer",<LF>    "create:protect.user",<LF>    "create:protect.sensor",<LF>    "create:protect.recordingSchedule",<LF>    "create:protect.liveview",<LF>    "create:protect.light",<LF>    "create:protect.group",<LF>    "create:protect.doorlock",<LF>    "create:protect.display",<LF>    "create:protect.camera",<LF>    "create:protect.bridge",<LF>    "assign:role",<LF>    "adopt:access.device"<LF>  ],<LF>  "cloud_access_granted": false,<LF>  "update_time": 1640763533,<LF>  "avatar": "",<LF>  "nfc_token": "",<LF>  "nfc_display_id": "",<LF>  "nfc_card_type": "",<LF>  "nfc_card_status": "",<LF>  "id": "56ba3a92-4dce-4adf-8938-79ae4542088d",<LF>  "isOwner": false,<LF>  "isSuperAdmin": true,<LF>  "deviceToken": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiI2M2NhMDRmYy04ZDM3LTQzZmQtODQ2ZS1hNzAzM2M1YmE1ZDIiLCJpYXQiOjE2NDE0NTkyNTQsImlzcyI6IlVMUC1HTyIsInVzZXJfaWQiOiI1NmJhM2E5Mi00ZGNlLTRhZGYtODkzOC03OWFlNDU0MjA4OGQifQ.egnDFusDmdEwGUmgKUjPxeYae6Ve2K68DTgkjATZmR4"<LF>}';
                $handle->setInfo(CURLINFO_HEADER_SIZE, strpos($returnValue, "httponly"));
                $handle->setInfo(CURLINFO_HTTP_CODE, $httpCode);
            } else {
                $returnValue = $httpCode;
            }
//			echo $returnValue;
            break;
        case "/api/self/sites":
            $returnValue = '{"meta":{"rc":"ok"},"data":[{"_id":"12345678990afe068c992458","anonymous_id":"12345678-1234-1234-1234-123456789123","name":"default","desc":"Default","attr_hidden_id":"default","attr_no_delete":true,"role":"admin","role_hotspot":false}]}';
            break;
        default:
            $returnValue = "\ncurl_exec: URL '".$url."' unknown!";
//			echo $returnValue;
            break;
    }

    return $returnValue;
}

/*
curl_file_create
Create a CURLFile object
 */
function curl_file_create(string $filename, ?string $mime_type = null, ?string $posted_filename = null): CURLFile
{
    $CurlFile = new CurlFile();
    return $CurlFile;
}

/*
curl_getinfo
Get information regarding a specific transfer
 */
function curl_getinfo(CurlHandle $handle, ?int $option = null): ?int/*mixed*/
{
    if (null !== $handle->getInfo($option)) {
        return (int)$handle->getInfo($option);
    } else {
        return false;
    }
}

/*
curl_init
Initialize a cURL session
 */
function curl_init(?string $url = null): ?CurlHandle/*|false*/
{
    $CurlHandle = new CurlHandle();
    return $CurlHandle;
}

/*
curl_multi_add_handle
Add a normal cURL handle to a cURL multi handle
 */
function curl_multi_add_handle(CurlMultiHandle $multi_handle, CurlHandle $handle): int
{
    echo "\n***************\curl_multi_add_handle() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_multi_close
Close a set of cURL handles
 */
function curl_multi_close(CurlMultiHandle $multi_handle): void
{
    echo "\n***************\curl_multi_close() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_multi_errno
Return the last multi curl error number
 */
function curl_multi_errno(CurlMultiHandle $multi_handle): int
{
    echo "\n***************\curl_multi_errno() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_multi_exec
Run the sub-connections of the current cURL handle
 */
function curl_multi_exec(CurlMultiHandle $multi_handle, &$still_running): int
{
    echo "\n***************\curl_multi_exec() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_multi_getcontent
Return the content of a cURL handle if CURLOPT_RETURNTRANSFER is set
 */
function curl_multi_getcontent(CurlHandle $handle): ?string
{
    echo "\n***************\curl_multi_getcontent() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_multi_info_read
Get information about the current transfers
 */
function curl_multi_info_read(CurlMultiHandle $multi_handle, &$queued_messages = null): ?array/*|false*/
{
    echo "\n***************\curl_multi_info_read() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_multi_init
Returns a new cURL multi handle
 */
function curl_multi_init(): CurlMultiHandle
{
    echo "\n***************\curl_multi_init() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_multi_remove_handle
Remove a multi handle from a set of cURL handles
 */
function curl_multi_remove_handle(CurlMultiHandle $multi_handle, CurlHandle $handle): int
{
    echo "\n***************\curl_multi_remove_handle() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_multi_select
Wait for activity on any curl_multi connection
 */
function curl_multi_select(CurlMultiHandle $multi_handle, float $timeout = 1.0): int
{
    echo "\n***************\curl_multi_select() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_multi_setopt
Set an option for the cURL multi handle
 */
function curl_multi_setopt(CurlMultiHandle $multi_handle, int $option, mixed $value): bool
{
    echo "\n***************\curl_multi_setopt() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_multi_strerror
Return string describing error code
 */
function curl_multi_strerror(int $error_code): ?string
{
    echo "\n***************\curl_multi_strerror() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_pause
Pause and unpause a connection
 */
function curl_pause(CurlHandle $handle, int $flags): int
{
    echo "\n***************\curl_pause() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_reset
Reset all options of a libcurl session handle
 */
function curl_reset(CurlHandle $handle): void
{
    echo "\n***************\curl_reset() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_setopt_array
Set multiple options for a cURL transfer
 */
function curl_setopt_array(CurlHandle $handle, array $options): bool
{
    echo "\n***************\ncurl_setopt_array() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
    return null;
}

/*
curl_setopt
Set an option for a cURL transfer
 */
function curl_setopt(CurlHandle $handle, int $option, $value): bool
{
    $handle->setOpt($option, $value);
    return true;
}

/*
curl_share_close
Close a cURL share handle
 */
function curl_share_close(CurlShareHandle $share_handle): void
{
    echo "\n***************\curl_share_close() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_share_errno
Return the last share curl error number
 */
function curl_share_errno(CurlShareHandle $share_handle): int
{
    echo "\n***************\curl_share_errno() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_share_init
Initialize a cURL share handle
 */
function curl_share_init(): CurlShareHandle
{
    echo "\n***************\curl_share_init() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_share_setopt
Set an option for a cURL share handle
 */
function curl_share_setopt(CurlShareHandle $share_handle, int $option, mixed $value): bool
{
    echo "\n***************\curl_share_setopt() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_share_strerror
Return string describing the given error code
 */
function curl_share_strerror(int $error_code): ?string
{
    echo "\n***************\curl_share_strerror() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_strerror
Return string describing the given error code
 */
function curl_strerror(int $error_code): ?string
{
    echo "\n***************\curl_strerror() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_unescape
Decodes the given URL encoded string
 */
function curl_unescape(CurlHandle $handle, string $string): ?string/*|false*/
{
    echo "\n***************\curl_unescape() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_version
Gets cURL version information
 */
function curl_version(): ?array/*|false*/
{
    echo "\n***************\curl_version() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}
