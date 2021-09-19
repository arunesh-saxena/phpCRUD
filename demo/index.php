<h1>this is index file </h1>


<?php

function welcome($obj)
{
    print_r($obj);
    ['name2' => $name2] = $obj;
    list('name3' => $name3) = $obj;
    return 'Welcome ' . $obj["name1"] . ' | ' . $name2 . ' | ' .  $name3 . ' !';
}


$welcomeStr = welcome([
    'name1' => 'kavi',
    'name2' => 'chavi',
    'name3' => 'lavi'
]);


echo $welcomeStr . '<br/>';
$value = '10';
echo ctype_digit($value) ? 'true' : 'false' . ' | ' . ($value > 0 && $value <= 120);

echo '<br/>';

if (ctype_digit($value) && ($value > 0 && $value <= 120)) {
    echo 'pass';
} else {
    echo 'no pass';
}

$arr = [
    'hello' => 'kavi',
    'address' => 'greater noida'
];

print_r($arr);
print_r(json_encode($arr));



?>