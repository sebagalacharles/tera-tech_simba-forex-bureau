 <!DOCTYPE html>
<html>
<body>

<?php

    // Amount rates is in USD;
    $individuals = [
        ['name' => 'John', 'amount' => 100],
        ['name' => 'Mark', 'amount' => 150],
        ['name' => 'Slyvia', 'amount' => 1100],
        ['name' => 'Juma', 'amount' => 3500],
        ['name' => 'Mike', 'amount' => 600],
        ['name' => 'Sana', 'amount' => 50],
        ['name' => 'Linda', 'amount' => 8000],
    ];
    
    $exchange_dollar_rate_selling = 3650; ////Amount is in UGX
    $exchange_dollar_rate_buying = 3870; //Amount is in UGX
    $ura_charges = 2; // Percentage
    $ura_max = 1000000; //Amount is in UGX

    echo '<h2>Simba forex bureau on 1st June 2022</h2>';
    echo '<p>Buying Exchange Rate = <strong>'.$exchange_dollar_rate_buying.' UGX</strong></p>';
    echo '<p>Selling Exchange Rate = <strong>'.$exchange_dollar_rate_selling.' UGX</strong></p>';
    echo '<p>URA Tax Charges = <strong>'.$ura_charges.' %</strong></p>';
    echo '<p>Tax Free amount must not exceed  <strong>'.$ura_max.' UGX</strong></p>';

    foreach ($individuals as $key => $individual) {
        $exchanged_amount = change_to_ugx($individual['amount'], $exchange_dollar_rate_selling);

        if($exchanged_amount > $ura_max){
            $exchanged_amount = $exchanged_amount-(($ura_charges/100)*$exchanged_amount);
        }

        //change the exchanged_amount to USD
        echo '<p>'.$individual['name'].'walked in with <strong>'.$individual['amount'].'USD</strong> and walked out with <strong>'.change_to_usd($exchanged_amount, $exchange_dollar_rate_buying).' USD</strong> <p>';
    }


    function change_to_ugx($amount, $exchange_dollar_rate_selling){
        return $amount * $exchange_dollar_rate_selling; 
    }

    function change_to_usd($amount, $exchange_dollar_rate_buying){
        return $amount / $exchange_dollar_rate_buying;   
    }

?>

</body>
</html> 
