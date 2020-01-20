<?php
/*
 * Template Name: Behance Test
 */
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php wp_head(); ?>
</head>

<body>

    <?php

$apiUserID = 'mamunurbd';
$apiURI = 'https://www.behance.net/v2/users/';
$apiLinker = '/projects?api_key=';
$apiSkey = 'wxz4mUjYYscNDaiVXOsNLna6JjCsjw0i';

//http://www.behance.net/v2/users/mamunurbd/projects?api_key=wxz4mUjYYscNDaiVXOsNLna6JjCsjw0i

$queryUrl = $apiURI . $apiUserID . $apiLinker . $apiSkey;

$results = wp_remote_retrieve_body(wp_remote_get($queryUrl));

$results = json_decode($results, true);

if( ! is_array( $results ) || empty( $results ) ){
	echo "ERROR";
	return false;
}

$project_array[] = $results;

$projects = $project_array[0]["projects"];

var_dump($projects);

//foreach ($projects as $project){
//	echo "<h1>";
//	echo $project["name"];
//	echo "</h1>";
//}

wp_footer();

?>

</body>

</html>
