<?php

declare(strict_types=1);

if (!defined('DEBUG')) {
    define("DEBUG", false);
}

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
    private $CURLOPT = array();
    private $CURLINFO = array();

    public function __construct()
    {
    }

    public function __destruct()
    {
    }

    public function setOpt($option, $value)
    {
        $this->CURLOPT[$option] = $value;
    }

    public function getOpt($option)
    {
        if (isset($this->CURLOPT[$option])) {
            return $this->CURLOPT[$option];
        } else {
            return null;
        }
    }

    public function setInfo($option, $value)
    {
        $this->CURLINFO[$option] = $value;
    }

    public function getInfo($option)
    {
        if (isset($this->CURLINFO[$option])) {
            return $this->CURLINFO[$option];
        } else {
            return null;
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
    $handle = null;
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
    echo "\n***************\ncurl_errno() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_error
Return a string containing the last error for the current session
 */
function curl_error(CurlHandle $handle): string
{
    echo "\n***************\ncurl_error() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_escape
URL encodes the given string
 */
function curl_escape(CurlHandle $handle, string $string): ?string/*|false*/
{
    echo "\n***************\ncurl_escape() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
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

    if (defined('DEBUG') && DEBUG) {
        echo "\ncurl_exec URL:".$url."\n";
    }

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
        if (defined('DEBUG') && DEBUG) {
            echo "\ncurl_exec CURLOPT_POSTFIELDS: ".$handle->getOpt(CURLOPT_POSTFIELDS);
        }
        $controller0 = @explode("&", $handle->getOpt(CURLOPT_POSTFIELDS));
        $controller0 = str_ireplace(array("username=", "password="), array("", ""), $controller0);
        if (defined('DEBUG') && DEBUG) {
            echo "\ncurl_exec Controller0:";
            print_r($controller0);
        }
        $controller1 = @json_decode($handle->getOpt(CURLOPT_POSTFIELDS));
        if (defined('DEBUG') && DEBUG) {
            echo "\ncurl_exec Controller1:";
            print_r($controller1);
        }
    }
    
    if ("/api/login" == $url &&
    (((!isset($controller0[0]) || $UserName != $controller0[0]) && (!isset($controller1[0]) || $UserName != $controller1[0]))
    || ((!isset($controller0[1]) || $Password != $controller0[1]) && (!isset($controller1[1]) || $Password != $controller1[1])))) {
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
    if (defined('DEBUG') && DEBUG) {
        echo "\ncurl_exec CURLOPT_HTTPHEADER: ";
    }
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
            break;
        case "/proxy/protect/api/bootstrap":
            $returnValue = '{"authUserId":"123456780069ae03870003ed","accessKey":"1234567840232:60fd77ca0069ae03870003ed:ccc58441feafcb23492a6648415b97d86d6b6ec6965b5db51d21f315e5b2b0547d02130395e6593c71cb525f34d2ca78b266aa12b4e1ecb6b1b51bb9e50b1d8d","cameras":[{"isDeleting":false,"mac":"7483C22FB776","host":"192.168.1.99","connectionHost":"192.168.1.1","type":"UVC G3","name":"TestCamera","upSince":1639426627236,"uptime":2289290,"lastSeen":1641715917236,"connectedSince":1641140562821,"state":"CONNECTED","hardwareRevision":"23","firmwareVersion":"4.46.18","latestFirmwareVersion":"4.46.18","firmwareBuild":"ceacbaa.211202.1029","isUpdating":false,"isAdopting":false,"isAdopted":true,"isAdoptedByOther":false,"isProvisioned":true,"isRebooting":false,"isSshEnabled":false,"canAdopt":false,"isAttemptingToConnect":false,"lastMotion":1641714689030,"micVolume":73,"isMicEnabled":true,"isRecording":true,"isMotionDetected":false,"isSmartDetected":false,"phyRate":100,"hdrMode":false,"videoMode":"default","isProbingForWifi":false,"apMac":null,"apRssi":null,"elementInfo":null,"chimeDuration":300,"isDark":false,"lastPrivacyZonePositionId":null,"lastRing":null,"isLiveHeatmapEnabled":false,"anonymousDeviceId":"94c53c5b-6e47-5498-918d-b4b93b13a4eb","eventStats":{"motion":{"today":1,"average":35,"lastDays":[36,35,15,19,86,21,38],"recentHours":[0,1,0,0,0,0,0,0,0,0,0,0,0]},"smart":{"today":0,"average":0,"lastDays":[0,0,0,0,0,0,0]}},"videoReconfigurationInProgress":false,"voltage":null,"wiredConnectionState":{"phyRate":100},"channels":[{"id":0,"videoId":"video1","name":"High","enabled":true,"isRtspEnabled":true,"rtspAlias":"USinMOtP322yiyzU","width":1920,"height":1080,"fps":30,"bitrate":6000000,"minBitrate":32000,"maxBitrate":6000000,"minClientAdaptiveBitRate":0,"minMotionAdaptiveBitRate":750000,"fpsValues":[1,2,3,4,5,6,8,9,10,12,15,16,18,20,24,25,30],"idrInterval":5},{"id":1,"videoId":"video3","name":"Medium","enabled":true,"isRtspEnabled":true,"rtspAlias":"C8SOAODpfyyAE4Gq","width":1024,"height":576,"fps":30,"bitrate":1500000,"minBitrate":32000,"maxBitrate":2000000,"minClientAdaptiveBitRate":150000,"minMotionAdaptiveBitRate":750000,"fpsValues":[1,2,3,4,5,6,8,9,10,12,15,16,18,20,24,25,30],"idrInterval":5},{"id":2,"videoId":"video2","name":"Low","enabled":true,"isRtspEnabled":false,"rtspAlias":null,"width":640,"height":360,"fps":30,"bitrate":300000,"minBitrate":32000,"maxBitrate":1000000,"minClientAdaptiveBitRate":0,"minMotionAdaptiveBitRate":300000,"fpsValues":[1,2,3,4,5,6,8,9,10,12,15,16,18,20,24,25,30],"idrInterval":5}],"ispSettings":{"aeMode":"auto","irLedMode":"auto","irLedLevel":255,"wdr":1,"icrSensitivity":0,"brightness":50,"contrast":50,"hue":50,"saturation":50,"sharpness":50,"denoise":50,"isFlippedVertical":false,"isFlippedHorizontal":false,"isAutoRotateEnabled":false,"isLdcEnabled":true,"is3dnrEnabled":true,"isExternalIrEnabled":false,"isAggressiveAntiFlickerEnabled":false,"isPauseMotionEnabled":false,"dZoomCenterX":50,"dZoomCenterY":50,"dZoomScale":0,"dZoomStreamId":4,"focusMode":"ztrig","focusPosition":0,"touchFocusX":1001,"touchFocusY":1001,"zoomPosition":0,"mountPosition":null},"talkbackSettings":{"typeFmt":"aac","typeIn":"serverudp","bindAddr":"0.0.0.0","bindPort":7004,"filterAddr":null,"filterPort":null,"channels":1,"samplingRate":22050,"bitsPerSample":16,"quality":100},"osdSettings":{"isNameEnabled":true,"isDateEnabled":true,"isLogoEnabled":true,"isDebugEnabled":false},"ledSettings":{"isEnabled":true,"blinkRate":0},"speakerSettings":{"isEnabled":true,"areSystemSoundsEnabled":false,"volume":80},"recordingSettings":{"prePaddingSecs":4,"postPaddingSecs":4,"minMotionEventTrigger":1000,"endMotionEventDelay":3000,"suppressIlluminationSurge":false,"mode":"always","geofencing":"off","motionAlgorithm":"enhanced","enablePirTimelapse":false,"useNewMotionAlgorithm":true},"smartDetectSettings":{"objectTypes":[]},"recordingSchedules":[],"motionZones":[{"id":2,"name":"Stellplatz","color":"#84D9FF","points":[[0.327,0.451],[0.473,0.496],[0.604,0.608],[1,0.764],[1,1],[0.308,1],[0.318,0.608],[0.377,0.561]],"sensitivity":60},{"id":3,"name":"Door","color":"#AB46BC","points":[[0.062962964,0.38980263],[0.22037037,0.3930921],[0.33888888,0.68421054],[0.08796296,0.7549342]],"sensitivity":60}],"privacyZones":[],"smartDetectZones":[{"id":1,"name":"Default","color":"#AB46BC","points":[[0,0],[1,0],[1,1],[0,1]],"sensitivity":50,"objectTypes":[]}],"smartDetectLines":[],"stats":{"rxBytes":36641178746,"txBytes":1148022668291,"wifi":{"channel":null,"frequency":null,"linkSpeedMbps":null,"signalQuality":50,"signalStrength":0},"battery":{"percentage":null,"isCharging":false,"sleepState":"disconnected"},"video":{"recordingStart":1636246737007,"recordingEnd":1641715930829,"recordingStartLQ":1636244816989,"recordingEndLQ":1641715930725,"timelapseStart":1627478405800,"timelapseEnd":1641715440792,"timelapseStartLQ":1627478405800,"timelapseEndLQ":1641714610792},"storage":{"used":1872605741056,"rate":405.177532897664},"wifiQuality":50,"wifiStrength":0},"featureFlags":{"canAdjustIrLedLevel":false,"canMagicZoom":true,"canOpticalZoom":false,"canTouchFocus":false,"hasAccelerometer":false,"hasAec":false,"hasBattery":false,"hasBluetooth":false,"hasChime":false,"hasExternalIr":true,"hasIcrSensitivity":true,"hasLdc":true,"hasLedIr":true,"hasLedStatus":false,"hasLineIn":false,"hasMic":true,"hasPrivacyMask":true,"hasRtc":false,"hasSdCard":true,"hasSpeaker":false,"hasWifi":false,"hasHdr":false,"hasAutoICROnly":true,"videoModes":["default"],"videoModeMaxFps":[],"hasMotionZones":true,"hasLcdScreen":false,"mountPositions":[],"smartDetectTypes":[],"motionAlgorithms":["enhanced"],"hasSquareEventThumbnail":true,"hasPackageCamera":false,"privacyMaskCapability":{"maxMasks":16,"rectangleOnly":false},"focus":{"steps":{"max":null,"min":null,"step":null},"degrees":{"max":null,"min":null,"step":null}},"pan":{"steps":{"max":null,"min":null,"step":null},"degrees":{"max":null,"min":null,"step":null}},"tilt":{"steps":{"max":null,"min":null,"step":null},"degrees":{"max":null,"min":null,"step":null}},"zoom":{"steps":{"max":null,"min":null,"step":null},"degrees":{"max":null,"min":null,"step":null}},"hasSmartDetect":false},"pirSettings":{"pirSensitivity":100,"pirMotionClipLength":15,"timelapseFrameInterval":15,"timelapseTransferInterval":600},"lcdMessage":{},"wifiConnectionState":{"channel":null,"frequency":null,"phyRate":null,"signalQuality":null,"signalStrength":null,"ssid":null},"lenses":[],"id":"12345678001fae03870003f0","isConnected":true,"platform":"s2l","hasSpeaker":false,"hasWifi":false,"audioBitrate":64000,"canManage":false,"isManaged":true,"modelKey":"camera"}],"users":[{"permissions":[],"lastLoginIp":null,"lastLoginTime":null,"isOwner":true,"enableNotifications":true,"settings":{"flags":{},"cameraOrder":["12345678001fae03870003f0"],"web":{"liveview.includeGlobal":false,"elements.viewmode_events":"grid","dewarp":{"12345678001fae03870003f0":{"dewarp":false,"state":{"pan":0,"tilt":-1.5707963267948966,"zoom":1.5707963267948966,"panning":0,"tilting":0}}}}},"groups":["60fd77c90005ae03870003eb"],"location":{"isAway":false,"homeAwaySince":1640462299249,"latitude":55.0,"longitude":10.0},"alertRules":[{"id":"kNPI1EKxphEsxjnZnyTnN03Z","name":"Default","when":"always","schedule":{"items":[]},"system":{"connectDisconnect":["push"],"update":["push"]},"cameras":[{"connectDisconnect":["push"],"motion":["push"],"smartDetect":[],"camera":"12345678001fae03870003f0"}],"users":[{"arrive":["push"],"depart":["push"],"user":"60fd77ca0069ae03870003ed"}],"geofencing":"off"}],"notificationsV2":{"state":"custom","motionNotifications":{"trigger":{"when":"always","location":"away","schedules":[]},"cameras":[{"inheritFromParent":true,"motion":["push"],"person":[],"vehicle":[],"camera":"12345678001fae03870003f0","trigger":{"when":"always","location":"away","schedules":[]}},{"inheritFromParent":false,"motion":["push"],"camera":null,"trigger":{"when":"inherit","location":"away","schedules":[]}}],"doorbells":[{"inheritFromParent":true,"ring":["push"],"doorbell":null,"trigger":{"when":"inherit","location":"away","schedules":[]}}],"lights":[{"inheritFromParent":true,"light":null,"trigger":{"when":"inherit","location":"away","schedules":[]}}],"doorlocks":[{"inheritFromParent":true,"doorlock":null,"trigger":{"when":"inherit","location":"away","schedules":[]}}],"sensors":[{"extremeValues":["push"],"sensor":null,"trigger":{"when":"inherit","location":"away","schedules":[]}}]},"systemNotifications":{"cameraConnectionStatus":["push"],"geofence":[]}},"featureFlags":{"notificationsV2":true},"id":"60fd77ca0069ae03870003ed","hasAcceptedInvite":true,"allPermissions":["nvr:read:*","liveview:create","user:read,write,delete:$","nvr:write,delete:*","group:create,read,write,delete:*","user:create,read,write,delete:*","legacyUFV:read,write,delete:*","bridge:create,read,write,delete:*","camera:create,read,write,delete,readmedia,deletemedia:*","light:create,read,write,delete:*","sensor:create,read,write,delete:*","doorlock:create,read,write,delete:*","viewer:create,read,write,delete:*","display:create,read,write,delete:*","schedule:create,read,write,delete:*","chime:create,read,write,delete:*"],"cloudAccount":{"firstName":"Brovning","lastName":"Brovning","email":"","profileImg":null,"user":"60fd77ca0069ae03870003ed","id":"12345678-2fd0-41b6-a3a3-a071e053ff7c","cloudId":"12345678-2fd0-41b6-a3a3-a071e053ff7c","name":"Brovning","modelKey":"cloudIdentity","location":{"isAway":false,"homeAwaySince":1640462299249,"latitude":55.0,"longitude":10.0,"modelKey":"userLocation"}},"name":"Brovning Brovning","firstName":"Brovning","lastName":"Brovning","email":"","localUsername":"","modelKey":"user"}],"groups":[{"name":"Administrator","permissions":["nvr:read:*","liveview:create","user:read,write,delete:$","nvr:write,delete:*","group:create,read,write,delete:*","user:create,read,write,delete:*","legacyUFV:read,write,delete:*","bridge:create,read,write,delete:*","camera:create,read,write,delete,readmedia,deletemedia:*","light:create,read,write,delete:*","sensor:create,read,write,delete:*","doorlock:create,read,write,delete:*","viewer:create,read,write,delete:*","display:create,read,write,delete:*","schedule:create,read,write,delete:*","chime:create,read,write,delete:*"],"type":"preset","isDefault":true,"id":"60fd77c90005ae03870003eb","modelKey":"group"},{"name":"View Only","permissions":["nvr:read:*","liveview:create","user:read,write,delete:$","bridge:read:*","camera:read,readmedia:*","doorlock:read:*","light:read:*","sensor:read:*","viewer:read:*","display:read:*","chime:read:*"],"type":"preset","isDefault":false,"id":"60fd77c900cfae03870003ec","modelKey":"group"}],"liveviews":[{"name":"Default","isDefault":true,"isGlobal":true,"layout":1,"slots":[{"cameras":["12345678001fae03870003f0"],"cycleMode":"time","cycleInterval":10}],"owner":"60fd77ca0069ae03870003ed","id":"60fd7da703d3ae038700040b","modelKey":"liveview"}],"schedules":[],"nvr":{"mac":"68D79A6B2FF5","host":"192.168.1.1","name":"UDM Pro Unterberg","canAutoUpdate":false,"isStatsGatheringEnabled":true,"timezone":"Europe/Berlin","version":"1.20.3","ucoreVersion":"2.3.25","firmwareVersion":"1.11.0","uiVersion":null,"hardwarePlatform":"alpinev2","ports":{"ump":7449,"http":7080,"https":7443,"rtsp":7447,"rtsps":7441,"rtmp":1935,"devicesWss":7442,"cameraHttps":7444,"cameraTcp":7877,"liveWs":7445,"liveWss":7446,"tcpStreams":7448,"playback":7450,"emsCLI":7440,"emsLiveFLV":7550,"cameraEvents":7551,"tcpBridge":7888,"ucore":11081,"discoveryClient":0},"uptime":1531782000,"lastSeen":1641715937118,"isUpdating":false,"lastUpdateAt":null,"isStation":false,"enableAutomaticBackups":true,"enableStatsReporting":false,"isSshEnabled":false,"errorCode":null,"releaseChannel":"release","ssoChannel":null,"hosts":["192.168.1.1"],"enableBridgeAutoAdoption":true,"hardwareId":"51dfee04-0e82-5b15-b129-b0656dbc5218","hardwareRevision":"113-00723-10","hostType":59925,"hostShortname":"UDMPRO","isHardware":true,"isWirelessUplinkEnabled":true,"timeFormat":"24h","temperatureUnit":"C","recordingRetentionDurationMs":null,"enableCrashReporting":true,"disableAudio":false,"analyticsData":"anonymous","anonymousDeviceId":"842f4a19-d22b-49df-8ac3-066148ef92f3","cameraUtilization":5,"isRecycling":true,"avgMotions":[0,0,0.14,0,0,0.43,2.29,1.14,0.86,0.57,2,0.14,0.29,1.14,2.57,7.57,5.29,6.14,3.86,1,0,0,0.29,0],"disableAutoLink":false,"skipFirmwareUpdate":false,"wifiSettings":{"useThirdPartyWifi":false,"ssid":null,"password":null},"locationSettings":{"isAway":false,"isGeofencingEnabled":true,"latitude":55.0,"longitude":10.0,"radius":20},"featureFlags":{"beta":false,"dev":false,"notificationsV2":true},"systemInfo":{"cpu":{"averageLoad":4.75,"temperature":29.5},"memory":{"available":1884732,"free":101056,"total":4042784},"storage":{"available":69379796992,"isRecycling":true,"size":1967925760000,"type":"hdd","used":1878525210624,"devices":[{"model":"ST2000DM008-2FR102","size":2000398934016,"healthy":true}]},"tmpfs":{"available":260780,"total":262144,"used":1364,"path":"/var/opt/unifi-protect/tmp"}},"doorbellSettings":{"defaultMessageText":"WELCOME","defaultMessageResetTimeoutMs":60000,"customMessages":[],"allMessages":[{"type":"LEAVE_PACKAGE_AT_DOOR","text":"LEAVE PACKAGE AT DOOR"},{"type":"DO_NOT_DISTURB","text":"DO NOT DISTURB"}]},"smartDetectAgreement":{"status":"agreed","lastUpdateAt":1629964018927},"storageStats":{"utilization":98.91105961610147,"capacity":5354253561,"remainingCapacity":58304629,"recordingSpace":{"total":1899206283264,"used":1878525059072,"available":20681224192},"storageDistribution":{"recordingTypeDistributions":[{"recordingType":"timelapse","size":3221225472,"percentage":0.17152658662092624},{"recordingType":"rotating","size":1858030224664,"percentage":98.93799271283319},{"recordingType":"detections","size":16723000040,"percentage":0.8904807005458861}],"resolutionDistributions":[{"resolution":"HD","size":1877974450176,"percentage":98.88206808943836},{"resolution":"free","size":21231833088,"percentage":1.1179319105616428}]}},"id":"60fd77c802afae03870003e9","isAway":false,"isSetup":true,"network":"Ethernet","type":"UDM-PRO","upSince":1640184155234,"isRecordingDisabled":false,"isRecordingMotionOnly":false,"maxCameraCapacity":{"4K":7,"2K":12,"HD":20},"modelKey":"nvr"},"legacyUFVs":[],"lastUpdateId":"fb747cbd-afa7-450a-b82a-6aab7c8b581f","viewers":[],"displays":[],"lights":[],"bridges":[{"mac":"245A4C13CCC8","host":"192.168.178.119","connectionHost":"192.168.1.1","type":"UFP-UAP-B","name":"U6Lite","upSince":1640965484236,"uptime":750433,"lastSeen":1641715917236,"connectedSince":1641140565227,"state":"CONNECTED","hardwareRevision":15,"firmwareVersion":"0.3.1","latestFirmwareVersion":null,"firmwareBuild":"c71c511.211210.3","isUpdating":false,"isAdopting":false,"isAdopted":true,"isAdoptedByOther":false,"isProvisioned":false,"isRebooting":false,"isSshEnabled":false,"canAdopt":false,"isAttemptingToConnect":false,"wiredConnectionState":{"phyRate":null},"id":"60fd82a100f6ae0387000421","isConnected":true,"platform":"mt7621","modelKey":"bridge"}],"sensors":[],"doorlocks":[],"chimes":[]}';
            break;
/*
        case "/proxy/protect/api/events?start=1641714849136&limit=100&type=motion":
//            $returnValue = '[{"id":"123456780072f80387002e34","type":"motion","start":1641714672030,"end":1641714689030,"score":100,"smartDetectTypes":[],"smartDetectEvents":[],"camera":"12345678001fae03870003f0","partition":null,"user":null,"metadata":{},"thumbnail":"e-61da93f50072f80387002e34","heatmap":"e-61da93f50072f80387002e34","modelKey":"event"}]';
//            $returnValue = '[{"id":"123456780072f80387002e34","type":"motion","start":1641714672030,"end":1641714689030,"score":100,"smartDetectTypes":[],"smartDetectEvents":[],"camera":"12345678001fae03870003f0","partition":null,"user":null,"metadata":{},"thumbnail":"e-61da93f50072f80387002e34","heatmap":"e-61da93f50072f80387002e34","modelKey":"event"},{"id":"123456780097f80387002e5a","type":"motion","start":1641716670078,"end":1641716683408,"score":100,"smartDetectTypes":[],"smartDetectEvents":[],"camera":"12345678001fae03870003f0","partition":null,"user":null,"metadata":{},"thumbnail":"e-123456780097f80387002e5a","heatmap":"e-123456780097f80387002e5a","modelKey":"event"},{"id":"12345678015bf80387002e5f","type":"motion","start":1641716694267,"end":1641716708100,"score":47,"smartDetectTypes":[],"smartDetectEvents":[],"camera":"12345678001fae03870003f0","partition":null,"user":null,"metadata":{},"thumbnail":"e-12345678015bf80387002e5f","heatmap":"e-12345678015bf80387002e5f","modelKey":"event"},{"id":"61da9bf302b3f80387002e63","type":"motion","start":1641716718600,"end":1641716730600,"score":76,"smartDetectTypes":[],"smartDetectEvents":[],"camera":"12345678001fae03870003f0","partition":null,"user":null,"metadata":{},"thumbnail":"e-61da9bf302b3f80387002e63","heatmap":"e-61da9bf302b3f80387002e63","modelKey":"event"},{"id":"61da9c0a0344f80387002e68","type":"motion","start":1641716741767,"end":1641716752767,"score":58,"smartDetectTypes":[],"smartDetectEvents":[],"camera":"12345678001fae03870003f0","partition":null,"user":null,"metadata":{},"thumbnail":"e-61da9c0a0344f80387002e68","heatmap":"e-61da9c0a0344f80387002e68","modelKey":"event"},{"id":"61da9c25029bf80387002e6c","type":"motion","start":1641716768600,"end":1641716779601,"score":27,"smartDetectTypes":[],"smartDetectEvents":[],"camera":"12345678001fae03870003f0","partition":null,"user":null,"metadata":{},"thumbnail":"e-61da9c25029bf80387002e6c","heatmap":"e-61da9c25029bf80387002e6c","modelKey":"event"},{"id":"61da9c3c0208f80387002e70","type":"motion","start":1641716791434,"end":1641716803434,"score":52,"smartDetectTypes":[],"smartDetectEvents":[],"camera":"12345678001fae03870003f0","partition":null,"user":null,"metadata":{},"thumbnail":"e-61da9c3c0208f80387002e70","heatmap":"e-61da9c3c0208f80387002e70","modelKey":"event"}]';
//            $returnValue = '[{"id":"61da9bc30097f80387002e5a","type":"motion","start":1641716670078,"end":1641716683408,"score":100,"smartDetectTypes":[],"smartDetectEvents":[],"camera":"60fd77cf001fae03870003f0","partition":null,"user":null,"metadata":{},"thumbnail":"e-61da9bc30097f80387002e5a","heatmap":"e-61da9bc30097f80387002e5a","modelKey":"event"},{"id":"61da9bdb015bf80387002e5f","type":"motion","start":1641716694267,"end":1641716708100,"score":47,"smartDetectTypes":[],"smartDetectEvents":[],"camera":"60fd77cf001fae03870003f0","partition":null,"user":null,"metadata":{},"thumbnail":"e-61da9bdb015bf80387002e5f","heatmap":"e-61da9bdb015bf80387002e5f","modelKey":"event"},{"id":"61da9bf302b3f80387002e63","type":"motion","start":1641716718600,"end":1641716730600,"score":76,"smartDetectTypes":[],"smartDetectEvents":[],"camera":"60fd77cf001fae03870003f0","partition":null,"user":null,"metadata":{},"thumbnail":"e-61da9bf302b3f80387002e63","heatmap":"e-61da9bf302b3f80387002e63","modelKey":"event"},{"id":"61da9c0a0344f80387002e68","type":"motion","start":1641716741767,"end":1641716752767,"score":58,"smartDetectTypes":[],"smartDetectEvents":[],"camera":"60fd77cf001fae03870003f0","partition":null,"user":null,"metadata":{},"thumbnail":"e-61da9c0a0344f80387002e68","heatmap":"e-61da9c0a0344f80387002e68","modelKey":"event"},{"id":"61da9c25029bf80387002e6c","type":"motion","start":1641716768600,"end":1641716779601,"score":27,"smartDetectTypes":[],"smartDetectEvents":[],"camera":"60fd77cf001fae03870003f0","partition":null,"user":null,"metadata":{},"thumbnail":"e-61da9c25029bf80387002e6c","heatmap":"e-61da9c25029bf80387002e6c","modelKey":"event"},{"id":"61da9c3c0208f80387002e70","type":"motion","start":1641716791434,"end":1641716803434,"score":52,"smartDetectTypes":[],"smartDetectEvents":[],"camera":"60fd77cf001fae03870003f0","partition":null,"user":null,"metadata":{},"thumbnail":"e-61da9c3c0208f80387002e70","heatmap":"e-61da9c3c0208f80387002e70","modelKey":"event"}]';
            break;
*/
        case "/api/self/sites":
            $returnValue = '{"meta":{"rc":"ok"},"data":[{"_id":"12345678990afe068c992458","anonymous_id":"12345678-1234-1234-1234-123456789123","name":"default","desc":"Default","attr_hidden_id":"default","attr_no_delete":true,"role":"admin","role_hotspot":false}]}';
            break;
        default:
            $returnValue = "\ncurl_exec: URL '".$url."' unknown!";
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
    echo "\n***************\ncurl_multi_add_handle() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_multi_close
Close a set of cURL handles
 */
function curl_multi_close(CurlMultiHandle $multi_handle): void
{
    echo "\n***************\ncurl_multi_close() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_multi_errno
Return the last multi curl error number
 */
function curl_multi_errno(CurlMultiHandle $multi_handle): int
{
    echo "\n***************\ncurl_multi_errno() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_multi_exec
Run the sub-connections of the current cURL handle
 */
function curl_multi_exec(CurlMultiHandle $multi_handle, &$still_running): int
{
    echo "\n***************\ncurl_multi_exec() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_multi_getcontent
Return the content of a cURL handle if CURLOPT_RETURNTRANSFER is set
 */
function curl_multi_getcontent(CurlHandle $handle): ?string
{
    echo "\n***************\ncurl_multi_getcontent() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_multi_info_read
Get information about the current transfers
 */
function curl_multi_info_read(CurlMultiHandle $multi_handle, &$queued_messages = null): ?array/*|false*/
{
    echo "\n***************\ncurl_multi_info_read() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_multi_init
Returns a new cURL multi handle
 */
function curl_multi_init(): CurlMultiHandle
{
    echo "\n***************\ncurl_multi_init() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_multi_remove_handle
Remove a multi handle from a set of cURL handles
 */
function curl_multi_remove_handle(CurlMultiHandle $multi_handle, CurlHandle $handle): int
{
    echo "\n***************\ncurl_multi_remove_handle() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_multi_select
Wait for activity on any curl_multi connection
 */
function curl_multi_select(CurlMultiHandle $multi_handle, float $timeout = 1.0): int
{
    echo "\n***************\ncurl_multi_select() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_multi_setopt
Set an option for the cURL multi handle
 */
function curl_multi_setopt(CurlMultiHandle $multi_handle, int $option, mixed $value): bool
{
    echo "\n***************\ncurl_multi_setopt() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_multi_strerror
Return string describing error code
 */
function curl_multi_strerror(int $error_code): ?string
{
    echo "\n***************\ncurl_multi_strerror() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_pause
Pause and unpause a connection
 */
function curl_pause(CurlHandle $handle, int $flags): int
{
    echo "\n***************\ncurl_pause() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_reset
Reset all options of a libcurl session handle
 */
function curl_reset(CurlHandle $handle): void
{
    echo "\n***************\ncurl_reset() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
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
    echo "\n***************\ncurl_share_close() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_share_errno
Return the last share curl error number
 */
function curl_share_errno(CurlShareHandle $share_handle): int
{
    echo "\n***************\ncurl_share_errno() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_share_init
Initialize a cURL share handle
 */
function curl_share_init(): CurlShareHandle
{
    echo "\n***************\ncurl_share_init() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_share_setopt
Set an option for a cURL share handle
 */
function curl_share_setopt(CurlShareHandle $share_handle, int $option, mixed $value): bool
{
    echo "\n***************\ncurl_share_setopt() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_share_strerror
Return string describing the given error code
 */
function curl_share_strerror(int $error_code): ?string
{
    echo "\n***************\ncurl_share_strerror() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_strerror
Return string describing the given error code
 */
function curl_strerror(int $error_code): ?string
{
    echo "\n***************\ncurl_strerror() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_unescape
Decodes the given URL encoded string
 */
function curl_unescape(CurlHandle $handle, string $string): ?string/*|false*/
{
    echo "\n***************\ncurl_unescape() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}

/*
curl_version
Gets cURL version information
 */
function curl_version(): ?array/*|false*/
{
    echo "\n***************\ncurl_version() NOT IMPLEMENTED YET ! ! !\nDo you like to contribute?!?\n***************\n";
}
