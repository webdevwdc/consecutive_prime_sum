<?php

/** For check prime function **/
function checkprime($x){
         
        $sqrt = sqrt($x);
        $counter = 2;
                 
        while ($counter <= $sqrt){
            if ($x % $counter == 0){
                break;
            }
            else{
                $counter++;
            }
        }
        if ($x % $counter != 0){
            return $x;
        }
}
// For check prime function //



/** Variable declare **/
$limit = 1000000; 
$total_sum = 0;
$number_of_primes = 0;
$prime_sum[0] = 0;
$prime_numbers = array();
$is_prime_no = false;
  
/**  Generate prime number array and prime sum array **/    
$k=0;
for ($i = 2; $i<$limit; $i++) {
     if ($i == 0){
            continue;
        }
        else if ($i == 1){
            continue;
        }
        else if ($i == 2){
            $prime_sum[$k+1] = $prime_sum[$k] + $i;  
            array_push($prime_numbers,$i);
            $k++; 
        }
        else {
          $is_prime = checkprime($i);
          if($is_prime != 0){
             $prime_sum[$k+1] = $prime_sum[$k] + $i;
             array_push($prime_numbers,$i);
             $k++;  
          }
          
        }
     
 }

//print_r($prime_numbers);

/** For getiing the sum of the most consecutive primes **/
 
for ($i = $number_of_primes; $i < count($prime_sum); $i++) {
    for ($j = $i-($number_of_primes+1); $j >= 0; $j--) {
        if ($prime_sum[$i] - $prime_sum[$j] > $limit) break;
 
        if (in_array($prime_sum[$i] - $prime_sum[$j],$prime_numbers)) {
            $number_of_primes = $i - $j;
            $total_sum = $prime_sum[$i] - $prime_sum[$j];
        }
    }
}

/** Display result **/
echo "<u>The largest prime number below ". $limit." (one-million)</u><br><br>";
echo "Total prime number is : <b>".$number_of_primes."</b><br>";
echo "The consecutive prime sum is : <b>".$total_sum."</b><br>";
?>
