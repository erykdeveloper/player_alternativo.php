<?php
/**
 *
 * @author Eryk Ferreira FOntes <teste>
 * @copyright (c) 2019. [teste Group] The code of this site is for copyrights of TrueSecurity to Raduckets, any kind of plagiarism by means of this code will be charged with a crime.
 *
 */
date_default_timezone_set('America/Sao_Paulo');
require "../../vendor/autoload.php";
require "../../config.inc.php";
$tapi = new \app\src\Tapi();
$tapi = $tapi->load();
echo json_encode($tapi);


