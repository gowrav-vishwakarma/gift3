<?php

define('MAX_GIFT_ALLOWED_KEY','Max Gift Allowed to Take');
define('SEND_REQUEST_ON_JOINING_KEY','Send Request On Joining');

$config['atk']['base_path']='./atk4/';
$config['dsn']='mysql://root:winserver@localhost/gift3';

$config['url_postfix']='';
$config['url_prefix']='?page=';

$config['logger']['log_dir']='./';

date_default_timezone_set('Asia/Calcutta');
// echo date('H:i:s', time()); 

# Agile Toolkit attempts to use as many default values for config file,
# and you only need to add them here if you wish to re-define default
# values. For more options look at:
#
#  http://www.atk4.com/doc/config

