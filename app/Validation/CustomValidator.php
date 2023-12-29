<?php 
namespace App\Validation;

use CodeIgniter\Validation\Rules;

class CustomValidator extends Rules
{
    public function not_future_date(string $str = null): bool
    {
        if (empty($str)) {
            return true;
        }
        $inputDate = \DateTime::createFromFormat('Y-m-d', $str);
        $currentDate = new \DateTime();
        return ($inputDate !== false && $inputDate <= $currentDate);
    }
}

?>