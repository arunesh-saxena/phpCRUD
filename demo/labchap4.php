<?php
declare(strict_types=1);
require_once("dogchap4.php");
$lab = new Dog('Fred','Lab','Yellow',100);

// print_r($lab->__toString());
// echo $lab->error_message;
// exit;

list($name_error, $breed_error, $color_error, $weight_error) = explode(',', $lab->__toString());
print $name_error == 'TRUE' ? 'Name update successful<br/>' :
    'Name update not successful<br/>';
print $breed_error == 'TRUE' ? 'Breed update successful<br/>' :
    'Breed update not successful<br/>';
print $color_error == 'TRUE' ? 'Color update successful<br/>' :
    'Color update not successful<br/>';
print $weight_error == 'TRUE' ? 'Weight update successful<br/>' :
            'Weight update not successful<br/>';
// -------------------Set Properties--------------------------
$dog_error_message = $lab->set_dog_name('Fred');
print $dog_error_message ? 'Name update successful<br/>' :
    'Name update not successful<br/>';
$dog_error_message = $lab->set_dog_weight(50);
print $dog_error_message ? 'Weight update successful<br />' :
    'Weight update not successful<br />';
$dog_error_message = $lab->set_dog_breed('Lab');
print $dog_error_message ? 'Breed update successful<br />' :
    'Breed update not successful<br />';
$dog_error_message = $lab->set_dog_color('Yellow');
print $dog_error_message ? 'Color update successful<br />' :
    'Color update not successful<br />';
//-----------------------------Get Properties---------------------------
$dog_properties = $lab->get_properties();
echo $dog_properties;
list($dog_weight, $dog_breed, $dog_color) = explode(',', $dog_properties);
print "Dog weight is $dog_weight. Dog breed is $dog_breed.
            Dog color is $dog_color.";
