<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-02-01 11:05:02 --> Severity: error --> Exception: syntax error, unexpected '$deviceControl' (T_VARIABLE) C:\xampp\htdocs\teknasyon\application\controllers\Api.php 87
ERROR - 2021-02-01 04:05:12 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 'yusuf' and password = 'yusuf'' at line 1 - Invalid query: select * from users username = 'yusuf' and password = 'yusuf'
ERROR - 2021-02-01 04:05:29 --> Severity: Notice --> Undefined index: userID C:\xampp\htdocs\teknasyon\application\controllers\Api.php 85
ERROR - 2021-02-01 04:05:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 'yusuf'' at line 1 - Invalid query: select * from devices userID = 'yusuf'
ERROR - 2021-02-01 04:07:00 --> Severity: Notice --> Undefined index: userID C:\xampp\htdocs\teknasyon\application\controllers\Api.php 85
ERROR - 2021-02-01 04:07:00 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= ''' at line 1 - Invalid query: select * from devices userID = ''
ERROR - 2021-02-01 04:07:46 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= '1'' at line 1 - Invalid query: select * from devices userID = '1'
ERROR - 2021-02-01 04:07:48 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= '1'' at line 1 - Invalid query: select * from devices userID = '1'
ERROR - 2021-02-01 04:08:15 --> Severity: Notice --> Undefined variable: deviceKontrol C:\xampp\htdocs\teknasyon\application\controllers\Api.php 91
ERROR - 2021-02-01 04:27:19 --> Query error: Unknown column 'client' in 'where clause' - Invalid query: select * from devices where client-token = 'OHMVpyTQnW8SClEjrkBGaR45mXfshqJicP0oZbtIv3wU26zL9xKeD7YFdu1ANg'
ERROR - 2021-02-01 04:27:55 --> Severity: Notice --> Undefined variable: token C:\xampp\htdocs\teknasyon\application\controllers\Api.php 146
ERROR - 2021-02-01 04:27:57 --> Severity: Notice --> Undefined variable: token C:\xampp\htdocs\teknasyon\application\controllers\Api.php 146
ERROR - 2021-02-01 04:28:46 --> Query error: Unknown column 'client' in 'where clause' - Invalid query: select * from devices where client-token = 'IYRB0OuMkpoADsrfQWZJvGelV6wcHz281qxhbCanPLK4gtjFXEm95SdT37NiyU'
ERROR - 2021-02-01 04:28:47 --> Query error: Unknown column 'client' in 'where clause' - Invalid query: select * from devices where client-token = 'IYRB0OuMkpoADsrfQWZJvGelV6wcHz281qxhbCanPLK4gtjFXEm95SdT37NiyU'
ERROR - 2021-02-01 06:29:04 --> Severity: error --> Exception: syntax error, unexpected ',', expecting variable (T_VARIABLE) C:\xampp\htdocs\teknasyon\application\models\API_Model.php 101
ERROR - 2021-02-01 06:34:15 --> Severity: error --> Exception: syntax error, unexpected ',', expecting variable (T_VARIABLE) C:\xampp\htdocs\teknasyon\application\models\API_Model.php 101
ERROR - 2021-02-01 06:34:32 --> Severity: error --> Exception: syntax error, unexpected ',', expecting variable (T_VARIABLE) C:\xampp\htdocs\teknasyon\application\models\API_Model.php 101
ERROR - 2021-02-01 06:34:33 --> Severity: error --> Exception: syntax error, unexpected ',', expecting variable (T_VARIABLE) C:\xampp\htdocs\teknasyon\application\models\API_Model.php 101
ERROR - 2021-02-01 06:34:34 --> Severity: error --> Exception: syntax error, unexpected ',', expecting variable (T_VARIABLE) C:\xampp\htdocs\teknasyon\application\models\API_Model.php 101
ERROR - 2021-02-01 06:34:38 --> Severity: error --> Exception: syntax error, unexpected ',', expecting variable (T_VARIABLE) C:\xampp\htdocs\teknasyon\application\models\API_Model.php 102
ERROR - 2021-02-01 06:34:38 --> Severity: error --> Exception: syntax error, unexpected ',', expecting variable (T_VARIABLE) C:\xampp\htdocs\teknasyon\application\models\API_Model.php 102
ERROR - 2021-02-01 06:34:50 --> Query error: Unknown column 'client-token' in 'field list' - Invalid query: INSERT INTO `devices` (`userID`, `uid`, `appID`, `language`, `operating-system`, `client-token`, `insertDate`) VALUES (1, '9df51612-63658-20077-45958-342225416542711', '44f946675-51629-18605-36153-12884192556305', 'EN', 'Ubuntu', '42QCgAvPRwhYblHJxOWy3E1eI8S9iofLqBnTmGpdt5DFaZkUVNr7Ks0u6MzcjX', '2021-02-01 06:34:50')
ERROR - 2021-02-01 06:35:51 --> Severity: error --> Exception: Call to private method Api_Model::_userDeviceInsert() from context 'Api' C:\xampp\htdocs\teknasyon\application\controllers\Api.php 75
ERROR - 2021-02-01 06:36:25 --> Severity: Notice --> Undefined variable: dataDevice C:\xampp\htdocs\teknasyon\application\controllers\Api.php 78
ERROR - 2021-02-01 06:41:30 --> Severity: error --> Exception: Call to private method Api_Model::_userSubscriptionCreate() from context 'Api' C:\xampp\htdocs\teknasyon\application\controllers\Api.php 147
ERROR - 2021-02-01 06:41:43 --> Query error: Unknown column 'receipt' in 'field list' - Invalid query: INSERT INTO `subscription` (`userID`, `receipt`, `subscriptionStartDate`, `subscriptionEndDate`, `status`, `appID`, `deviceID`) VALUES ('1', 'b87454260-50748-19240-43583-36180240593926', '2021-02-01 06:41:43', '2021-03-03 06:41:43', 1, 'c28525017-7816-18602-35624-19979569451569', '1')
ERROR - 2021-02-01 06:41:44 --> Query error: Unknown column 'receipt' in 'field list' - Invalid query: INSERT INTO `subscription` (`userID`, `receipt`, `subscriptionStartDate`, `subscriptionEndDate`, `status`, `appID`, `deviceID`) VALUES ('1', 'f7e317403-23856-19130-35560-39156096348776', '2021-02-01 06:41:44', '2021-03-03 06:41:44', 1, 'c28525017-7816-18602-35624-19979569451569', '1')
ERROR - 2021-02-01 06:42:11 --> Query error: Unknown column 'id' in 'where clause' - Invalid query: UPDATE `users` SET `status` = 1
WHERE `id` = '1'
ERROR - 2021-02-01 06:42:12 --> Query error: Unknown column 'id' in 'where clause' - Invalid query: UPDATE `users` SET `status` = 1
WHERE `id` = '1'
ERROR - 2021-02-01 06:46:04 --> Severity: error --> Exception: Call to private method Api_Model::_userSubscriptionCancel() from context 'Api' C:\xampp\htdocs\teknasyon\application\controllers\Api.php 184
ERROR - 2021-02-01 06:46:05 --> Severity: error --> Exception: Call to private method Api_Model::_userSubscriptionCancel() from context 'Api' C:\xampp\htdocs\teknasyon\application\controllers\Api.php 184
ERROR - 2021-02-01 06:46:06 --> Severity: error --> Exception: Call to private method Api_Model::_userSubscriptionCancel() from context 'Api' C:\xampp\htdocs\teknasyon\application\controllers\Api.php 184
ERROR - 2021-02-01 06:46:28 --> Severity: Notice --> Undefined variable: userBilgileri C:\xampp\htdocs\teknasyon\application\models\API_Model.php 142
ERROR - 2021-02-01 06:46:28 --> Severity: Notice --> Undefined variable: userSubscriptionCreated C:\xampp\htdocs\teknasyon\application\controllers\Api.php 185
ERROR - 2021-02-01 06:47:11 --> Severity: Notice --> Undefined variable: userSubscriptionCreated C:\xampp\htdocs\teknasyon\application\controllers\Api.php 185
ERROR - 2021-02-01 06:48:35 --> Severity: Notice --> Undefined variable: userSubscriptionCreated C:\xampp\htdocs\teknasyon\application\controllers\Api.php 185
ERROR - 2021-02-01 06:48:36 --> Severity: Notice --> Undefined variable: userSubscriptionCreated C:\xampp\htdocs\teknasyon\application\controllers\Api.php 185
ERROR - 2021-02-01 06:48:53 --> Severity: Notice --> Undefined variable: userSubscriptionCreated C:\xampp\htdocs\teknasyon\application\controllers\Api.php 185
ERROR - 2021-02-01 06:48:53 --> Severity: Notice --> Undefined variable: userSubscriptionCreated C:\xampp\htdocs\teknasyon\application\controllers\Api.php 185
ERROR - 2021-02-01 06:49:31 --> Severity: Notice --> Undefined variable: userToken C:\xampp\htdocs\teknasyon\application\controllers\Api.php 212
ERROR - 2021-02-01 06:49:31 --> Severity: Notice --> Undefined variable: userToken C:\xampp\htdocs\teknasyon\application\controllers\Api.php 245
ERROR - 2021-02-01 06:50:31 --> Severity: Notice --> Undefined variable: userToken C:\xampp\htdocs\teknasyon\application\controllers\Api.php 262
ERROR - 2021-02-01 06:50:31 --> Severity: Notice --> Undefined variable: userToken C:\xampp\htdocs\teknasyon\application\controllers\Api.php 278
ERROR - 2021-02-01 06:50:42 --> Severity: error --> Exception: Too few arguments to function Api_Model::_userSubscriptionHistory(), 0 passed in C:\xampp\htdocs\teknasyon\application\controllers\Api.php on line 272 and exactly 1 expected C:\xampp\htdocs\teknasyon\application\models\API_Model.php 175
ERROR - 2021-02-01 06:50:43 --> Severity: error --> Exception: Too few arguments to function Api_Model::_userSubscriptionHistory(), 0 passed in C:\xampp\htdocs\teknasyon\application\controllers\Api.php on line 272 and exactly 1 expected C:\xampp\htdocs\teknasyon\application\models\API_Model.php 175
