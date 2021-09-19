<?php

declare(strict_types=1);
require_once("dogchap4.php");
// require_once("dog.php");
if ((isset($_POST['dog_name'])) && (isset($_POST['dog_breed'])) && (isset($_POST['dog_color'])) && (isset($_POST['dog_weight']))) {
    $dog_name = filter_var(
        $_POST['dog_name'],
        FILTER_SANITIZE_STRING
    );
    $dog_breed = filter_var(
        $_POST['dog_breed'],
        FILTER_SANITIZE_STRING
    );
    $dog_color = filter_var(
        $_POST['dog_color'],
        FILTER_SANITIZE_STRING
    );
    $dog_weight = filter_var(
        $_POST['dog_weight'],
        FILTER_SANITIZE_STRING
    );

    echo "name : $dog_name <br>";
    echo "breed : $dog_breed <br>";
    echo "color : $dog_color <br>";
    echo "weight : $dog_weight <br> ";
    echo intval($dog_weight);
    echo '<br/>';
    $lab = new Dog($dog_name, $dog_breed, $dog_color, intval($dog_weight));
    // $lab = new Dog($dog_name, $dog_breed, $dog_color, $dog_weight);
    list($name_error, $breed_error, $color_error, $weight_error) = explode(',', $lab->__toString());
    
    // $dog_error_message = $lab->set_dog_name('Fred');
    // print $dog_error_message ? 'Name update successful<br/>' :
    //     'Name update not successful<br/>';
    // $dog_error_message = $lab->set_dog_weight(50);
    // print $dog_error_message ? 'Weight update successful<br />' :
    //     'Weight update not successful<br />';
    // $dog_error_message = $lab->set_dog_breed('Lab');
    // print $dog_error_message ? 'Breed update successful<br />' :
    //     'Breed update not successful<br />';
    // $dog_error_message = $lab->set_dog_color('Yellow');
    // print $dog_error_message ? 'Color update successful<br />' :
    //     'Color update not successful<br />';
    //-----------------------------Get Properties---------------------------
    $dog_properties = $lab->get_properties();
print_r($dog_properties);
echo "<br>";
    list($dog_weight, $dog_breed, $dog_color, $dog_name) = explode(',', $dog_properties);
    print "Dog name is $dog_name. Dog weight is $dog_weight. Dog breed is $dog_breed.
                Dog color is $dog_color.";
    
} else {
    print "<p>Missing or invalid parameters. Please go back to the lab.html page to
      enter valid information.<br />";
    print "<a href='lab.html'>Dog Creation Page</a>";
}
