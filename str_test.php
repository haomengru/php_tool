<?php
// 赋值: <body text='black'>
$bodytag = str_replace("%body%", "black", "<body text='%body%'>");

// 赋值: Hll Wrld f PHP
$vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
$onlyconsonants = str_replace($vowels, "", "Hello World of PHP");
// print_r($onlyconsonants);die();
// 赋值: You should eat pizza, beer, and ice cream every day
$phrase  = "You should eat fruits, vegetables, and fiber every day.";
$healthy = array("fruits", "vegetables", "fiber");
$yummy   = array("pizza", "beer", "ice cream");

$newphrase = str_replace($healthy, $yummy, $phrase);
print_r($newphrase);
// 赋值: 2
$str = str_replace("ll", "", "good golly miss molly!", $count);
var_dump($str);

$directory = str_replace(array('/', '.'), '', 'controller/rtytrtyr').'/';
print_r($directory);
?>