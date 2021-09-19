<?php

declare(strict_types=1);
class Dog
{
    // ------------------------------ Properties ------------------------------
    private int $dog_weight = 0;
    private string $dog_breed = "no breed";
    private string $dog_color = "no color";
    private string $dog_name = "no name";
    private string $error_message = "??";


    // ----------------------------- Constructor ------------------------------
    function __construct(string $value1, string $value2, string $value3, int $value4)
    {
        $name_error = $this->set_dog_name($value1) == TRUE ? 'TRUE,' : 'FALSE,';
        $breed_error = $this->set_dog_breed($value2) == TRUE ? 'TRUE,' : 'FALSE,';
        $color_error = $this->set_dog_color($value3) == TRUE ? 'TRUE,' : 'FALSE,';
        $weight_error = $this->set_dog_weight($value4) == TRUE ? 'TRUE' : 'FALSE';
        // echo "value=> $value1, $value2, $value3, $value4  <br> ";
        // echo "ctype_digit =>" . ctype_digit($value4) ? 'true' : 'false';
        // echo '<br>';
        // echo ($value4 > 0 && $value4 <= 120) ? 'correct' : 'not correct';
        // echo '<br>';
        // echo (ctype_digit($value4) && ($value4 > 0 && $value4 <= 120)) ? 'ABCD' : 1234567 . "<br/>";
        $this->error_message = $name_error . $breed_error . $color_error . $weight_error;
        // echo "error_message=>r $this->error_message <br>";
    }
    //---------------------------------toString--------------------------------
    public function __toString()
    {
        return $this->error_message;
    }
    // ------------------------------ Set Methods -----------------------------
    function set_dog_name(string $value): bool
    {
        $error_message = TRUE;
        (ctype_alpha($value) && strlen($value) <= 20) ?
            $this->dog_name = $value : $error_message = FALSE;
        return $error_message;
    }
    function set_dog_weight(int $value): bool
    {
        $error_message = TRUE;

        // (ctype_digit($value) && ($value > 0 && $value <= 120)) ?
        //     $this->dog_weight = $value : $error_message = FALSE;
        ($value > 0 && $value <= 120) ?
            $this->dog_weight = $value : $error_message = FALSE;
        return $error_message;
    }
    function set_dog_breed(string $value): bool
    {
        $error_message = TRUE;
        (ctype_alpha($value) && strlen($value) <= 35) ?
            $this->dog_breed = $value : $error_message = FALSE;
        return $error_message;
    }
    function set_dog_color(string $value): bool
    {
        $error_message = TRUE;
        (ctype_alpha($value) && strlen($value) <= 15) ?
            $this->dog_color = $value : $error_message = FALSE;
        return $error_message;
    }
    function get_properties(): string
    {
        return "$this->dog_weight, $this->dog_breed, $this->dog_color, $this->dog_name.";
    }
}
