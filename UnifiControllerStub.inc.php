<?php

declare(strict_types=1);

	/* Constants for curl_setopt() */
	define("CURLOPT_AUTOREFERER", 0);
	define("CURLOPT_BINARYTRANSFER", 1);
	define("CURLOPT_BUFFERSIZE", 2);
	define("CURLOPT_CAINFO", 3);
	define("CURLOPT_CAPATH", 4);
	define("CURLOPT_CONNECTTIMEOUT", 5);
	define("CURLOPT_COOKIE", 6);
	define("CURLOPT_COOKIEFILE", 7);
	define("CURLOPT_COOKIEJAR", 8);
	define("CURLOPT_COOKIESESSION", 9);
	define("CURLOPT_CRLF", 10);
	define("CURLOPT_CUSTOMREQUEST", 11);
	define("CURLOPT_DNS_CACHE_TIMEOUT", 12);
	define("CURLOPT_DNS_USE_GLOBAL_CACHE", 13);
	define("CURLOPT_EGDSOCKET", 14);
	define("CURLOPT_ENCODING", 15);
	define("CURLOPT_FAILONERROR", 16);
	define("CURLOPT_FILE", 17);
	define("CURLOPT_FILETIME", 18);
	define("CURLOPT_FOLLOWLOCATION", 19);
	define("CURLOPT_FORBID_REUSE", 20);
	define("CURLOPT_FRESH_CONNECT", 21);
	define("CURLOPT_FTPAPPEND", 22);
	define("CURLOPT_FTPLISTONLY", 23);
	define("CURLOPT_FTPPORT", 24);
	define("CURLOPT_FTP_USE_EPRT", 25);
	define("CURLOPT_FTP_USE_EPSV", 26);
	define("CURLOPT_HEADER", 27);
	define("CURLOPT_HEADERFUNCTION", 28);
	define("CURLOPT_HTTP200ALIASES", 29);
	define("CURLOPT_HTTPGET", 30);
	define("CURLOPT_HTTPHEADER", 31);
	define("CURLOPT_HTTPPROXYTUNNEL", 32);
	define("CURLOPT_HTTP_VERSION", 33);
	define("CURLOPT_INFILE", 34);
	define("CURLOPT_INFILESIZE", 35);
	define("CURLOPT_INTERFACE", 36);
	define("CURLOPT_KRB4LEVEL", 37);
	define("CURLOPT_LOW_SPEED_LIMIT", 38);
	define("CURLOPT_LOW_SPEED_TIME", 39);
	define("CURLOPT_MAXCONNECTS", 40);
	define("CURLOPT_MAXREDIRS", 41);
	define("CURLOPT_NETRC", 42);
	define("CURLOPT_NOBODY", 43);
	define("CURLOPT_NOPROGRESS", 44);
	define("CURLOPT_NOSIGNAL", 45);
	define("CURLOPT_PORT", 46);
	define("CURLOPT_POST", 47);
	define("CURLOPT_POSTFIELDS", 48);
	define("CURLOPT_POSTQUOTE", 49);
	define("CURLOPT_PREQUOTE", 50);
	define("CURLOPT_PRIVATE", 51);
	define("CURLOPT_PROGRESSFUNCTION", 52);
	define("CURLOPT_PROXY", 53);
	define("CURLOPT_PROXYPORT", 54);
	define("CURLOPT_PROXYTYPE", 55);
	define("CURLOPT_PROXYUSERPWD", 56);
	define("CURLOPT_PUT", 57);
	define("CURLOPT_QUOTE", 58);
	define("CURLOPT_RANDOM_FILE", 59);
	define("CURLOPT_RANGE", 60);
	define("CURLOPT_READDATA", 61);
	define("CURLOPT_READFUNCTION", 62);
	define("CURLOPT_REFERER", 63);
	define("CURLOPT_RESUME_FROM", 64);
	define("CURLOPT_RETURNTRANSFER", 65);
	define("CURLOPT_SHARE", 66);
	define("CURLOPT_SSLCERT", 67);
	define("CURLOPT_SSLCERTPASSWD", 68);
	define("CURLOPT_SSLCERTTYPE", 69);
	define("CURLOPT_SSLENGINE", 70);
	define("CURLOPT_SSLENGINE_DEFAULT", 71);
	define("CURLOPT_SSLKEY", 72);
	define("CURLOPT_SSLKEYPASSWD", 73);
	define("CURLOPT_SSLKEYTYPE", 74);
	define("CURLOPT_SSLVERSION", 75);
	define("CURLOPT_SSL_CIPHER_LIST", 76);
	define("CURLOPT_SSL_VERIFYHOST", 77);
	define("CURLOPT_SSL_VERIFYPEER", 78);
	define("CURLOPT_STDERR", 79);
	define("CURLOPT_TELNETOPTIONS", 80);
	define("CURLOPT_TIMECONDITION", 81);
	define("CURLOPT_TIMEOUT", 82);
	define("CURLOPT_TIMEVALUE", 83);
	define("CURLOPT_TRANSFERTEXT", 84);
	define("CURLOPT_UNRESTRICTED_AUTH", 85);
	define("CURLOPT_UPLOAD", 86);
	define("CURLOPT_URL", 87);
	define("CURLOPT_USERAGENT", 88);
	define("CURLOPT_USERPWD", 89);
	define("CURLOPT_VERBOSE", 90);
	define("CURLOPT_WRITEFUNCTION", 91);
	define("CURLOPT_WRITEHEADER", 92);


	define("CURLE_ABORTED_BY_CALLBACK", "");
	define("CURLE_BAD_CALLING_ORDER", "");
	define("CURLE_BAD_CONTENT_ENCODING", "");
	define("CURLE_BAD_DOWNLOAD_RESUME", "");
	define("CURLE_BAD_FUNCTION_ARGUMENT", "");
	define("CURLE_BAD_PASSWORD_ENTERED", "");
	define("CURLE_COULDNT_CONNECT", "");
	define("CURLE_COULDNT_RESOLVE_HOST", "");
	define("CURLE_COULDNT_RESOLVE_PROXY", "");
	define("CURLE_FAILED_INIT", "");
	define("CURLE_FILE_COULDNT_READ_FILE", "");
	define("CURLE_FTP_ACCESS_DENIED", "");
	define("CURLE_FTP_BAD_DOWNLOAD_RESUME", "");
	define("CURLE_FTP_CANT_GET_HOST", "");
	define("CURLE_FTP_CANT_RECONNECT", "");
	define("CURLE_FTP_COULDNT_GET_SIZE", "");
	define("CURLE_FTP_COULDNT_RETR_FILE", "");
	define("CURLE_FTP_COULDNT_SET_ASCII", "");
	define("CURLE_FTP_COULDNT_SET_BINARY", "");
	define("CURLE_FTP_COULDNT_STOR_FILE", "");
	define("CURLE_FTP_COULDNT_USE_REST", "");
	define("CURLE_FTP_PARTIAL_FILE", "");
	define("CURLE_FTP_PORT_FAILED", "");
	define("CURLE_FTP_QUOTE_ERROR", "");
	define("CURLE_FTP_USER_PASSWORD_INCORRECT", "");
	define("CURLE_FTP_WEIRD_227_FORMAT", "");
	define("CURLE_FTP_WEIRD_PASS_REPLY", "");
	define("CURLE_FTP_WEIRD_PASV_REPLY", "");
	define("CURLE_FTP_WEIRD_SERVER_REPLY", "");
	define("CURLE_FTP_WEIRD_USER_REPLY", "");
	define("CURLE_FTP_WRITE_ERROR", "");
	define("CURLE_FUNCTION_NOT_FOUND", "");
	define("CURLE_GOT_NOTHING", "");
	define("CURLE_HTTP_NOT_FOUND", "");
	define("CURLE_HTTP_PORT_FAILED", "");
	define("CURLE_HTTP_POST_ERROR", "");
	define("CURLE_HTTP_RANGE_ERROR", "");
	define("CURLE_HTTP_RETURNED_ERROR", "");
	define("CURLE_LDAP_CANNOT_BIND", "");
	define("CURLE_LDAP_SEARCH_FAILED", "");
	define("CURLE_LIBRARY_NOT_FOUND", "");
	define("CURLE_MALFORMAT_USER", "");
	define("CURLE_OBSOLETE", "");
	define("CURLE_OK", "");
	define("CURLE_OPERATION_TIMEDOUT", "");
	define("CURLE_OPERATION_TIMEOUTED", "");
	define("CURLE_OUT_OF_MEMORY", "");
	define("CURLE_PARTIAL_FILE", "");
	define("CURLE_READ_ERROR", "");
	define("CURLE_RECV_ERROR", "");
	define("CURLE_SEND_ERROR", "");
	define("CURLE_SHARE_IN_USE", "");
	define("CURLE_SSL_CACERT", "");
	define("CURLE_SSL_CERTPROBLEM", "");
	define("CURLE_SSL_CIPHER", "");
	define("CURLE_SSL_CONNECT_ERROR", "");
	define("CURLE_SSL_ENGINE_NOTFOUND", "");
	define("CURLE_SSL_ENGINE_SETFAILED", "");
	define("CURLE_SSL_PEER_CERTIFICATE", "");
#if LIBCURL_VERSION_NUM >= 0x072700 /* Available since 7.39.0 */
	define("CURLE_SSL_PINNEDPUBKEYNOTMATCH", "");
#endif
	define("CURLE_TELNET_OPTION_SYNTAX", "");
	define("CURLE_TOO_MANY_REDIRECTS", "");
	define("CURLE_UNKNOWN_TELNET_OPTION", "");
	define("CURLE_UNSUPPORTED_PROTOCOL", "");
	define("CURLE_URL_MALFORMAT", "");
	define("CURLE_URL_MALFORMAT_USER", "");
	define("CURLE_WRITE_ERROR", "");

	/* cURL info constants */
	define("CURLINFO_CONNECT_TIME", 0);
	define("CURLINFO_CONTENT_LENGTH_DOWNLOAD", 1);
	define("CURLINFO_CONTENT_LENGTH_UPLOAD", 2);
	define("CURLINFO_CONTENT_TYPE", 3);
	define("CURLINFO_EFFECTIVE_URL", 4);
	define("CURLINFO_FILETIME", 5);
	define("CURLINFO_HEADER_OUT", 6);
	define("CURLINFO_HEADER_SIZE", 7);
	define("CURLINFO_HTTP_CODE", 8);
	define("CURLINFO_LASTONE", 9);
	define("CURLINFO_NAMELOOKUP_TIME", 10);
	define("CURLINFO_PRETRANSFER_TIME", 11);
	define("CURLINFO_PRIVATE", 12);
	define("CURLINFO_REDIRECT_COUNT", 13);
	define("CURLINFO_REDIRECT_TIME", 14);
	define("CURLINFO_REQUEST_SIZE", 15);
	define("CURLINFO_SIZE_DOWNLOAD", 16);
	define("CURLINFO_SIZE_UPLOAD", 17);
	define("CURLINFO_SPEED_DOWNLOAD", 18);
	define("CURLINFO_SPEED_UPLOAD", 19);
	define("CURLINFO_SSL_VERIFYRESULT", 20);
	define("CURLINFO_STARTTRANSFER_TIME", 21);
	define("CURLINFO_TOTAL_TIME", 22);
#if LIBCURL_VERSION_NUM >= 0x074800 /* Available since 7.72.0 */
	define("CURLINFO_EFFECTIVE_METHOD", 23);
#endif

	/* Other */
	define("CURLMSG_DONE", "");
	define("CURLVERSION_NOW", "");

	/* Curl Multi Constants */
	define("CURLM_BAD_EASY_HANDLE", "");
	define("CURLM_BAD_HANDLE", "");
	define("CURLM_CALL_MULTI_PERFORM", "");
	define("CURLM_INTERNAL_ERROR", "");
	define("CURLM_OK", "");
	define("CURLM_OUT_OF_MEMORY", "");
#if LIBCURL_VERSION_NUM >= 0x072001 /* Available since 7.32.1 */
	define("CURLM_ADDED_ALREADY", "");
#endif

	/* Curl proxy constants */
	define("CURLPROXY_HTTP", "");
	define("CURLPROXY_SOCKS4", "");
	define("CURLPROXY_SOCKS5", "");

	/* Curl Share constants */
	define("CURLSHOPT_NONE", "");
	define("CURLSHOPT_SHARE", "");
	define("CURLSHOPT_UNSHARE", "");

	/* Curl Http Version constants (CURLOPT_HTTP_VERSION) */
	define("CURL_HTTP_VERSION_1_0", "");
	define("CURL_HTTP_VERSION_1_1", "");
	define("CURL_HTTP_VERSION_NONE", "");

	/* Curl Lock constants */
	define("CURL_LOCK_DATA_COOKIE", "");
	define("CURL_LOCK_DATA_DNS", "");
	define("CURL_LOCK_DATA_SSL_SESSION", "");

	/* Curl NETRC constants (CURLOPT_NETRC) */
	define("CURL_NETRC_IGNORED", "");
	define("CURL_NETRC_OPTIONAL", "");
	define("CURL_NETRC_REQUIRED", "");

	/* Curl SSL Version constants (CURLOPT_SSLVERSION) */
	define("CURL_SSLVERSION_DEFAULT", "");
	define("CURL_SSLVERSION_SSLv2", "");
	define("CURL_SSLVERSION_SSLv3", "");
	define("CURL_SSLVERSION_TLSv1", "");

	/* Curl TIMECOND constants (CURLOPT_TIMECONDITION) */
	define("CURL_TIMECOND_IFMODSINCE", "");
	define("CURL_TIMECOND_IFUNMODSINCE", "");
	define("CURL_TIMECOND_LASTMOD", "");
	define("CURL_TIMECOND_NONE", "");

	/* Curl version constants */
	define("CURL_VERSION_ASYNCHDNS", "");
	define("CURL_VERSION_CONV", "");
	define("CURL_VERSION_DEBUG", "");
	define("CURL_VERSION_GSSNEGOTIATE", "");
	define("CURL_VERSION_IDN", "");
	define("CURL_VERSION_IPV6", "");
	define("CURL_VERSION_KERBEROS4", "");
	define("CURL_VERSION_LARGEFILE", "");
	define("CURL_VERSION_LIBZ", "");
	define("CURL_VERSION_NTLM", "");
	define("CURL_VERSION_SPNEGO", "");
	define("CURL_VERSION_SSL", "");
	define("CURL_VERSION_SSPI", "");

	/* Available since 7.10.6 */
	define("CURLOPT_HTTPAUTH", "");
	/* http authentication options */
	define("CURLAUTH_ANY", "");
	define("CURLAUTH_ANYSAFE", "");
	define("CURLAUTH_BASIC", "");
	define("CURLAUTH_DIGEST", "");
	define("CURLAUTH_GSSNEGOTIATE", "");
	define("CURLAUTH_NONE", "");
	define("CURLAUTH_NTLM", "");

	/* Available since 7.10.7 */
	define("CURLINFO_HTTP_CONNECTCODE", "");
	define("CURLOPT_FTP_CREATE_MISSING_DIRS", "");
	define("CURLOPT_PROXYAUTH", "");

	/* Available since 7.10.8 */
	define("CURLE_FILESIZE_EXCEEDED", "");
	define("CURLE_LDAP_INVALID_URL", "");
	define("CURLINFO_HTTPAUTH_AVAIL", "");
	define("CURLINFO_RESPONSE_CODE", "");
	define("CURLINFO_PROXYAUTH_AVAIL", "");
	define("CURLOPT_FTP_RESPONSE_TIMEOUT", "");
	define("CURLOPT_IPRESOLVE", "");
	define("CURLOPT_MAXFILESIZE", "");
	define("CURL_IPRESOLVE_V4", "");
	define("CURL_IPRESOLVE_V6", "");
	define("CURL_IPRESOLVE_WHATEVER", "");

	/* Available since 7.11.0 */
	define("CURLE_FTP_SSL_FAILED", "");
	define("CURLFTPSSL_ALL", "");
	define("CURLFTPSSL_CONTROL", "");
	define("CURLFTPSSL_NONE", "");
	define("CURLFTPSSL_TRY", "");
	define("CURLOPT_FTP_SSL", "");
	define("CURLOPT_NETRC_FILE", "");

	/* Available since 7.11.2 */
	define("CURLOPT_TCP_NODELAY", "");

	/* Available since 7.12.2 */
	define("CURLFTPAUTH_DEFAULT", "");
	define("CURLFTPAUTH_SSL", "");
	define("CURLFTPAUTH_TLS", "");
	define("CURLOPT_FTPSSLAUTH", "");

	/* Available since 7.13.0 */
	define("CURLOPT_FTP_ACCOUNT", "");

	/* Available since 7.12.2 */
	define("CURLINFO_OS_ERRNO", "");

	/* Available since 7.12.3 */
	define("CURLINFO_NUM_CONNECTS", "");
	define("CURLINFO_SSL_ENGINES", "");

	/* Available since 7.14.1 */
	define("CURLINFO_COOKIELIST", "");
	define("CURLOPT_COOKIELIST", "");
	define("CURLOPT_IGNORE_CONTENT_LENGTH", "");

	/* Available since 7.15.0 */
	define("CURLOPT_FTP_SKIP_PASV_IP", "");

	/* Available since 7.15.1 */
	define("CURLOPT_FTP_FILEMETHOD", "");

	/* Available since 7.15.2 */
	define("CURLOPT_CONNECT_ONLY", "");
	define("CURLOPT_LOCALPORT", "");
	define("CURLOPT_LOCALPORTRANGE", "");

	/* Available since 7.15.3 */
	define("CURLFTPMETHOD_MULTICWD", "");
	define("CURLFTPMETHOD_NOCWD", "");
	define("CURLFTPMETHOD_SINGLECWD", "");

	/* Available since 7.15.4 */
	define("CURLINFO_FTP_ENTRY_PATH", "");

	/* Available since 7.15.5 */
	define("CURLOPT_FTP_ALTERNATIVE_TO_USER", "");
	define("CURLOPT_MAX_RECV_SPEED_LARGE", "");
	define("CURLOPT_MAX_SEND_SPEED_LARGE", "");

	/* Available since 7.16.0 */
	define("CURLE_SSL_CACERT_BADFILE", "");
	define("CURLOPT_SSL_SESSIONID_CACHE", "");
	define("CURLMOPT_PIPELINING", "");

	/* Available since 7.16.1 */
	define("CURLE_SSH", "");
	define("CURLOPT_FTP_SSL_CCC", "");
	define("CURLOPT_SSH_AUTH_TYPES", "");
	define("CURLOPT_SSH_PRIVATE_KEYFILE", "");
	define("CURLOPT_SSH_PUBLIC_KEYFILE", "");
	define("CURLFTPSSL_CCC_ACTIVE", "");
	define("CURLFTPSSL_CCC_NONE", "");
	define("CURLFTPSSL_CCC_PASSIVE", "");

	/* Available since 7.16.2 */
	define("CURLOPT_CONNECTTIMEOUT_MS", "");
	define("CURLOPT_HTTP_CONTENT_DECODING", "");
	define("CURLOPT_HTTP_TRANSFER_DECODING", "");
	define("CURLOPT_TIMEOUT_MS", "");

	/* Available since 7.16.3 */
	define("CURLMOPT_MAXCONNECTS", "");

	/* Available since 7.16.4 */
	define("CURLOPT_KRBLEVEL", "");
	define("CURLOPT_NEW_DIRECTORY_PERMS", "");
	define("CURLOPT_NEW_FILE_PERMS", "");

	/* Available since 7.17.0 */
	define("CURLOPT_APPEND", "");
	define("CURLOPT_DIRLISTONLY", "");
	define("CURLOPT_USE_SSL", "");
	/* Curl SSL Constants */
	define("CURLUSESSL_ALL", "");
	define("CURLUSESSL_CONTROL", "");
	define("CURLUSESSL_NONE", "");
	define("CURLUSESSL_TRY", "");

	/* Available since 7.17.1 */
	define("CURLOPT_SSH_HOST_PUBLIC_KEY_MD5", "");

	/* Available since 7.18.0 */
	define("CURLOPT_PROXY_TRANSFER_MODE", "");
	define("CURLPAUSE_ALL", "");
	define("CURLPAUSE_CONT", "");
	define("CURLPAUSE_RECV", "");
	define("CURLPAUSE_RECV_CONT", "");
	define("CURLPAUSE_SEND", "");
	define("CURLPAUSE_SEND_CONT", "");
	define("CURL_READFUNC_PAUSE", "");
	define("CURL_WRITEFUNC_PAUSE", "");

	define("CURLPROXY_SOCKS4A", "");
	define("CURLPROXY_SOCKS5_HOSTNAME", "");

	/* Available since 7.18.2 */
	define("CURLINFO_REDIRECT_URL", "");

	/* Available since 7.19.0 */
	define("CURLINFO_APPCONNECT_TIME", "");
	define("CURLINFO_PRIMARY_IP", "");

	define("CURLOPT_ADDRESS_SCOPE", "");
	define("CURLOPT_CRLFILE", "");
	define("CURLOPT_ISSUERCERT", "");
	define("CURLOPT_KEYPASSWD", "");

	define("CURLSSH_AUTH_ANY", "");
	define("CURLSSH_AUTH_DEFAULT", "");
	define("CURLSSH_AUTH_HOST", "");
	define("CURLSSH_AUTH_KEYBOARD", "");
	define("CURLSSH_AUTH_NONE", "");
	define("CURLSSH_AUTH_PASSWORD", "");
	define("CURLSSH_AUTH_PUBLICKEY", "");

	/* Available since 7.19.1 */
	define("CURLINFO_CERTINFO", "");
	define("CURLOPT_CERTINFO", "");
	define("CURLOPT_PASSWORD", "");
	define("CURLOPT_POSTREDIR", "");
	define("CURLOPT_PROXYPASSWORD", "");
	define("CURLOPT_PROXYUSERNAME", "");
	define("CURLOPT_USERNAME", "");
	define("CURL_REDIR_POST_301", "");
	define("CURL_REDIR_POST_302", "");
	define("CURL_REDIR_POST_ALL", "");

	/* Available since 7.19.3 */
	define("CURLAUTH_DIGEST_IE", "");

	/* Available since 7.19.4 */
	define("CURLINFO_CONDITION_UNMET", "");

	define("CURLOPT_NOPROXY", "");
	define("CURLOPT_PROTOCOLS", "");
	define("CURLOPT_REDIR_PROTOCOLS", "");
	define("CURLOPT_SOCKS5_GSSAPI_NEC", "");
	define("CURLOPT_SOCKS5_GSSAPI_SERVICE", "");
	define("CURLOPT_TFTP_BLKSIZE", "");

	define("CURLPROTO_ALL", "");
	define("CURLPROTO_DICT", "");
	define("CURLPROTO_FILE", "");
	define("CURLPROTO_FTP", "");
	define("CURLPROTO_FTPS", "");
	define("CURLPROTO_HTTP", "");
	define("CURLPROTO_HTTPS", "");
	define("CURLPROTO_LDAP", "");
	define("CURLPROTO_LDAPS", "");
	define("CURLPROTO_SCP", "");
	define("CURLPROTO_SFTP", "");
	define("CURLPROTO_TELNET", "");
	define("CURLPROTO_TFTP", "");

	define("CURLPROXY_HTTP_1_0", "");

	define("CURLFTP_CREATE_DIR", "");
	define("CURLFTP_CREATE_DIR_NONE", "");
	define("CURLFTP_CREATE_DIR_RETRY", "");

	/* Available since 7.19.6 */
	define("CURL_VERSION_CURLDEBUG", "");
	define("CURLOPT_SSH_KNOWNHOSTS", "");

	/* Available since 7.20.0 */
	define("CURLINFO_RTSP_CLIENT_CSEQ", "");
	define("CURLINFO_RTSP_CSEQ_RECV", "");
	define("CURLINFO_RTSP_SERVER_CSEQ", "");
	define("CURLINFO_RTSP_SESSION_ID", "");
	define("CURLOPT_FTP_USE_PRET", "");
	define("CURLOPT_MAIL_FROM", "");
	define("CURLOPT_MAIL_RCPT", "");
	define("CURLOPT_RTSP_CLIENT_CSEQ", "");
	define("CURLOPT_RTSP_REQUEST", "");
	define("CURLOPT_RTSP_SERVER_CSEQ", "");
	define("CURLOPT_RTSP_SESSION_ID", "");
	define("CURLOPT_RTSP_STREAM_URI", "");
	define("CURLOPT_RTSP_TRANSPORT", "");
	define("CURLPROTO_IMAP", "");
	define("CURLPROTO_IMAPS", "");
	define("CURLPROTO_POP3", "");
	define("CURLPROTO_POP3S", "");
	define("CURLPROTO_RTSP", "");
	define("CURLPROTO_SMTP", "");
	define("CURLPROTO_SMTPS", "");
	define("CURL_RTSPREQ_ANNOUNCE", "");
	define("CURL_RTSPREQ_DESCRIBE", "");
	define("CURL_RTSPREQ_GET_PARAMETER", "");
	define("CURL_RTSPREQ_OPTIONS", "");
	define("CURL_RTSPREQ_PAUSE", "");
	define("CURL_RTSPREQ_PLAY", "");
	define("CURL_RTSPREQ_RECEIVE", "");
	define("CURL_RTSPREQ_RECORD", "");
	define("CURL_RTSPREQ_SET_PARAMETER", "");
	define("CURL_RTSPREQ_SETUP", "");
	define("CURL_RTSPREQ_TEARDOWN", "");

	/* Available since 7.21.0 */
	define("CURLINFO_LOCAL_IP", "");
	define("CURLINFO_LOCAL_PORT", "");
	define("CURLINFO_PRIMARY_PORT", "");
	define("CURLOPT_FNMATCH_FUNCTION", "");
	define("CURLOPT_WILDCARDMATCH", "");
	define("CURLPROTO_RTMP", "");
	define("CURLPROTO_RTMPE", "");
	define("CURLPROTO_RTMPS", "");
	define("CURLPROTO_RTMPT", "");
	define("CURLPROTO_RTMPTE", "");
	define("CURLPROTO_RTMPTS", "");
	define("CURL_FNMATCHFUNC_FAIL", "");
	define("CURL_FNMATCHFUNC_MATCH", "");
	define("CURL_FNMATCHFUNC_NOMATCH", "");

	/* Available since 7.21.2 */
	define("CURLPROTO_GOPHER", "");

	/* Available since 7.21.3 */
	define("CURLAUTH_ONLY", "");
	define("CURLOPT_RESOLVE", "");

	/* Available since 7.21.4 */
	define("CURLOPT_TLSAUTH_PASSWORD", "");
	define("CURLOPT_TLSAUTH_TYPE", "");
	define("CURLOPT_TLSAUTH_USERNAME", "");
	define("CURL_TLSAUTH_SRP", "");
	define("CURL_VERSION_TLSAUTH_SRP", "");

	/* Available since 7.21.6 */
	define("CURLOPT_ACCEPT_ENCODING", "");
	define("CURLOPT_TRANSFER_ENCODING", "");

	/* Available since 7.22.0 */
	define("CURLAUTH_NTLM_WB", "");
	define("CURLGSSAPI_DELEGATION_FLAG", "");
	define("CURLGSSAPI_DELEGATION_POLICY_FLAG", "");
	define("CURLOPT_GSSAPI_DELEGATION", "");
	define("CURL_VERSION_NTLM_WB", "");

	/* Available since 7.24.0 */
	define("CURLOPT_ACCEPTTIMEOUT_MS", "");
	define("CURLOPT_DNS_SERVERS", "");

	/* Available since 7.25.0 */
	define("CURLOPT_MAIL_AUTH", "");
	define("CURLOPT_SSL_OPTIONS", "");
	define("CURLOPT_TCP_KEEPALIVE", "");
	define("CURLOPT_TCP_KEEPIDLE", "");
	define("CURLOPT_TCP_KEEPINTVL", "");
	define("CURLSSLOPT_ALLOW_BEAST", "");

	/* Available since 7.25.1 */
	define("CURL_REDIR_POST_303", "");

	/* Available since 7.28.0 */
	define("CURLSSH_AUTH_AGENT", "");

#if LIBCURL_VERSION_NUM >= 0x071e00 /* Available since 7.30.0 */
	define("CURLMOPT_CHUNK_LENGTH_PENALTY_SIZE", "");
	define("CURLMOPT_CONTENT_LENGTH_PENALTY_SIZE", "");
	define("CURLMOPT_MAX_HOST_CONNECTIONS", "");
	define("CURLMOPT_MAX_PIPELINE_LENGTH", "");
	define("CURLMOPT_MAX_TOTAL_CONNECTIONS", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x071f00 /* Available since 7.31.0 */
	define("CURLOPT_SASL_IR", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x072100 /* Available since 7.33.0 */
	define("CURLOPT_DNS_INTERFACE", "");
	define("CURLOPT_DNS_LOCAL_IP4", "");
	define("CURLOPT_DNS_LOCAL_IP6", "");
	define("CURLOPT_XOAUTH2_BEARER", "");

	define("CURL_HTTP_VERSION_2_0", "");
	define("CURL_VERSION_HTTP2", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x072200 /* Available since 7.34.0 */
	define("CURLOPT_LOGIN_OPTIONS", "");

	define("CURL_SSLVERSION_TLSv1_0", "");
	define("CURL_SSLVERSION_TLSv1_1", "");
	define("CURL_SSLVERSION_TLSv1_2", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x072400 /* Available since 7.36.0 */
	define("CURLOPT_EXPECT_100_TIMEOUT_MS", "");
	define("CURLOPT_SSL_ENABLE_ALPN", "");
	define("CURLOPT_SSL_ENABLE_NPN", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x072500 /* Available since 7.37.0 */
	define("CURLHEADER_SEPARATE", "");
	define("CURLHEADER_UNIFIED", "");
	define("CURLOPT_HEADEROPT", "");
	define("CURLOPT_PROXYHEADER", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x072600 /* Available since 7.38.0 */
	define("CURLAUTH_NEGOTIATE", "");
	define("CURL_VERSION_GSSAPI", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x072700 /* Available since 7.39.0 */
	define("CURLOPT_PINNEDPUBLICKEY", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x072800 /* Available since 7.40.0 */
	define("CURLOPT_UNIX_SOCKET_PATH", "");
	define("CURLPROTO_SMB", "");
	define("CURLPROTO_SMBS", "");
	define("CURL_VERSION_KERBEROS5", "");
	define("CURL_VERSION_UNIX_SOCKETS", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x072900 /* Available since 7.41.0 */
	define("CURLOPT_SSL_VERIFYSTATUS", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x072a00 /* Available since 7.42.0 */
	define("CURLOPT_PATH_AS_IS", "");
	define("CURLOPT_SSL_FALSESTART", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x072b00 /* Available since 7.43.0 */
	define("CURL_HTTP_VERSION_2", "");

	define("CURLOPT_PIPEWAIT", "");
	define("CURLOPT_PROXY_SERVICE_NAME", "");
	define("CURLOPT_SERVICE_NAME", "");

	define("CURLPIPE_NOTHING", "");
	define("CURLPIPE_HTTP1", "");
	define("CURLPIPE_MULTIPLEX", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x072c00 /* Available since 7.44.0 */
	define("CURLSSLOPT_NO_REVOKE", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x072d00 /* Available since 7.45.0 */
	define("CURLOPT_DEFAULT_PROTOCOL", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x072e00 /* Available since 7.46.0 */
	define("CURLOPT_STREAM_WEIGHT", "");
	define("CURLMOPT_PUSHFUNCTION", "");
	define("CURL_PUSH_OK", "");
	define("CURL_PUSH_DENY", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x072f00 /* Available since 7.47.0 */
	define("CURL_HTTP_VERSION_2TLS", "");
	define("CURL_VERSION_PSL", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x073000 /* Available since 7.48.0 */
	define("CURLOPT_TFTP_NO_OPTIONS", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x073100 /* Available since 7.49.0 */
	define("CURL_HTTP_VERSION_2_PRIOR_KNOWLEDGE", "");
	define("CURLOPT_CONNECT_TO", "");
	define("CURLOPT_TCP_FASTOPEN", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x073200 /* Available since 7.50.0 */
	define("CURLINFO_HTTP_VERSION", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x073300 /* Available since 7.51.0 */
	define("CURLE_WEIRD_SERVER_REPLY", "");
	define("CURLOPT_KEEP_SENDING_ON_ERROR", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x073400 /* Available since 7.52.0 */
	define("CURL_SSLVERSION_TLSv1_3", "");
	define("CURL_VERSION_HTTPS_PROXY", "");
	define("CURLINFO_PROTOCOL", "");
	define("CURLINFO_PROXY_SSL_VERIFYRESULT", "");
	define("CURLINFO_SCHEME", "");
	define("CURLOPT_PRE_PROXY", "");
	define("CURLOPT_PROXY_CAINFO", "");
	define("CURLOPT_PROXY_CAPATH", "");
	define("CURLOPT_PROXY_CRLFILE", "");
	define("CURLOPT_PROXY_KEYPASSWD", "");
	define("CURLOPT_PROXY_PINNEDPUBLICKEY", "");
	define("CURLOPT_PROXY_SSL_CIPHER_LIST", "");
	define("CURLOPT_PROXY_SSL_OPTIONS", "");
	define("CURLOPT_PROXY_SSL_VERIFYHOST", "");
	define("CURLOPT_PROXY_SSL_VERIFYPEER", "");
	define("CURLOPT_PROXY_SSLCERT", "");
	define("CURLOPT_PROXY_SSLCERTTYPE", "");
	define("CURLOPT_PROXY_SSLKEY", "");
	define("CURLOPT_PROXY_SSLKEYTYPE", "");
	define("CURLOPT_PROXY_SSLVERSION", "");
	define("CURLOPT_PROXY_TLSAUTH_PASSWORD", "");
	define("CURLOPT_PROXY_TLSAUTH_TYPE", "");
	define("CURLOPT_PROXY_TLSAUTH_USERNAME", "");
	define("CURLPROXY_HTTPS", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x073500 /* Available since 7.53.0 */
	define("CURL_MAX_READ_SIZE", "");
	define("CURLOPT_ABSTRACT_UNIX_SOCKET", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x073600 /* Available since 7.54.0 */
	define("CURL_SSLVERSION_MAX_DEFAULT", "");
	define("CURL_SSLVERSION_MAX_NONE", "");
	define("CURL_SSLVERSION_MAX_TLSv1_0", "");
	define("CURL_SSLVERSION_MAX_TLSv1_1", "");
	define("CURL_SSLVERSION_MAX_TLSv1_2", "");
	define("CURL_SSLVERSION_MAX_TLSv1_3", "");
	define("CURLOPT_SUPPRESS_CONNECT_HEADERS", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x073601 /* Available since 7.54.1 */
	define("CURLAUTH_GSSAPI", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x073700 /* Available since 7.55.0 */
	define("CURLINFO_CONTENT_LENGTH_DOWNLOAD_T", "");
	define("CURLINFO_CONTENT_LENGTH_UPLOAD_T", "");
	define("CURLINFO_SIZE_DOWNLOAD_T", "");
	define("CURLINFO_SIZE_UPLOAD_T", "");
	define("CURLINFO_SPEED_DOWNLOAD_T", "");
	define("CURLINFO_SPEED_UPLOAD_T", "");
	define("CURLOPT_REQUEST_TARGET", "");
	define("CURLOPT_SOCKS5_AUTH", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x073800 /* Available since 7.56.0 */
	define("CURLOPT_SSH_COMPRESSION", "");
	define("CURL_VERSION_MULTI_SSL", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x073900 /* Available since 7.57.0 */
	define("CURL_VERSION_BROTLI", "");
	define("CURL_LOCK_DATA_CONNECT", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x073a00 /* Available since 7.58.0 */
	define("CURLSSH_AUTH_GSSAPI", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x073b00 /* Available since 7.59.0 */
	define("CURLINFO_FILETIME_T", "");
	define("CURLOPT_HAPPY_EYEBALLS_TIMEOUT_MS", "");
	define("CURLOPT_TIMEVALUE_LARGE", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x073c00 /* Available since 7.60.0 */
	define("CURLOPT_DNS_SHUFFLE_ADDRESSES", "");
	define("CURLOPT_HAPROXYPROTOCOL", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x073d00 /* Available since 7.61.0 */
	define("CURL_LOCK_DATA_PSL", "");
	define("CURLAUTH_BEARER", "");
	define("CURLINFO_APPCONNECT_TIME_T", "");
	define("CURLINFO_CONNECT_TIME_T", "");
	define("CURLINFO_NAMELOOKUP_TIME_T", "");
	define("CURLINFO_PRETRANSFER_TIME_T", "");
	define("CURLINFO_REDIRECT_TIME_T", "");
	define("CURLINFO_STARTTRANSFER_TIME_T", "");
	define("CURLINFO_TOTAL_TIME_T", "");
	define("CURLOPT_DISALLOW_USERNAME_IN_URL", "");
	define("CURLOPT_PROXY_TLS13_CIPHERS", "");
	define("CURLOPT_TLS13_CIPHERS", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x073E00 /* Available since 7.62.0 */
	define("CURLOPT_DOH_URL", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x074000 /* Available since 7.64.0 */
	define("CURLOPT_HTTP09_ALLOWED", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x074001 /* Available since 7.64.1 */
	define("CURL_VERSION_ALTSVC", "");
#endif

#if LIBCURL_VERSION_NUM >= 0x074700 /* Available since 7.71.0 */
	define("CURLOPT_ISSUERCERT_BLOB", "");
	define("CURLOPT_PROXY_ISSUERCERT", "");
	define("CURLOPT_PROXY_ISSUERCERT_BLOB", "");
	define("CURLOPT_PROXY_SSLCERT_BLOB", "");
	define("CURLOPT_PROXY_SSLKEY_BLOB", "");
	define("CURLOPT_SSLCERT_BLOB", "");
	define("CURLOPT_SSLKEY_BLOB", "");
#endif

	define("CURLOPT_SAFE_UPLOAD", "");
