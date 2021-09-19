<?php

declare(strict_types=1); ?>
<h1> I love Green Tomatoes</h1>
<?php
print "The greener the better!";
?>
<h2> My partner hates Green Tomatoes</h2>
<?php
print "Yes I do! \n";
?>







<?php
function welcome($name)
{
    return "Welcome $name !";
}

$welcomeStr = welcome('kavi');

echo $welcomeStr;
?>
<br />
<?php
$myVal = '123';
$myVal = 'new value';
$myVal = "Help" . " me!";
echo $myVal;
?>

<br />

<?php
function myFunction(bool $value = null): string
{
    if ($value) {
        return 'true';
    }
    return 'false';
}
echo myFunction(true);
?>


<br />

<?php

include('./math.php');

$result = add(13, 13);
echo $result;


echo '<br /> <hr>';
// try {
//     hello();
// } catch (Error $error) {
//     echo $error;
//     echo 'this is catch-----';
// } catch (zeroException $e) {
//     print "Don’t try to divide by zero!";
// } catch (Throwable $t) {
//     print $t->getMessage();
// } finally {
//     print "This message is over.";
// }

try {
    $firstNumber = 100;
    $secondNumber = 0;
    if ($secondNumber == 0) {
        throw new Exception("Zero Exception");
    } else {
        $result = $firstnumber / $secondnumber;
    }
} /* catch (Exception $e) {
    echo $e->getMessage();
    switch ($e->getMessage()) {
        case "Zero Exception":
            echo "The value of second number must be greater than zero";
            break;
        case "Some other exception":
            echo "You did something else wrong";
            break;
    }
} */ catch (Throwable $t) {
    // code that executes if there is an exception
    echo '111';
    $t->getMessage();
    echo $t;
    echo '<br>';
    // echo 'getCode => ' . $t->getCode() . '<br>getFile=> ' . $t->getFile() . '<br>getLine()' . $t->getLine() . '<br>getTrace()' . $t->getTrace() . '<br>getTraceAsString=>' . $t->getTraceAsString();
} catch (Error $e) {
    // PHP 7+ capture and handle errors
    echo '22s';
    $e->getMessage();
}

?>

<br>

<!-- <?php
        $person = [
            'name' => 'kavi',
            'age' => 30
        ];
        print_r($person);
        echo "Person name is " . $person["name"] . " and add is " . $person["age"];
        echo "<hr>";



        foreach ($person as $key => $val) {
            echo "$key = $val <br>";
        }
        ?> -->