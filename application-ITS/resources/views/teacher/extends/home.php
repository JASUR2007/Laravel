<?php

function TotalPrice($prices)
{
    $count = count($prices);
    $total = array_sum($prices);

    if ($count >= 5) {
        $total *= 0.8;
    } elseif ($count >= 3) {
        $total *= 0.9;
    }

    return round($total, 2);
}


function checkPassword($password)
{
    $length = strlen($password) >= 8;
    $uppercase = preg_match('/[A-Z]/', $password);
    $number = preg_match('/[0-9]/', $password);
    $specialChar = preg_match('/[\W_]/', $password);

    $score = $length + $uppercase + $number + $specialChar;

    return ($score === 4) ? "Strong" : (($score === 3) ? "Medium" : "Weak");
}


function atmWithdraw($amount) {
    if ($amount % 10 !== 0) return "Error: Amount must be a multiple of 10.";

    $bills100 = ($amount / 100 >= 1) ? intdiv($amount, 100) : 0;
    $amount %= 100;

    $bills50 = ($amount / 50 >= 1) ? intdiv($amount, 50) : 0;
    $amount %= 50;

    $bills20 = ($amount / 20 >= 1) ? intdiv($amount, 20) : 0;
    $amount %= 20;

    $bills10 = ($amount / 10 >= 1) ? intdiv($amount, 10) : 0;
    $amount %= 10;

    return [
        100 => $bills100,
        50 => $bills50,
        20 => $bills20,
        10 => $bills10
    ];
}

function trafficLight()
{
    $lights = ["Red" => 5, "Green" => 3, "Yellow" => 2];
    foreach ($lights as $color => $seconds) {
        echo "$color light for $seconds seconds.\n";
    }
}

function bankAccount($initialBalance = 0)
{
    $balance = $initialBalance;
    return [
        "deposit" => function ($amount) use (&$balance) {
            $balance += $amount;
            return "Deposited: $$amount. New Balance: $$balance.";
        },
        "withdraw" => function ($amount) use (&$balance) {
            if ($amount > $balance) {
                return "Insufficient funds.";
            }
            $balance -= $amount;
            return "Withdrawn: $$amount. New Balance: $$balance.";
        },
        "getBalance" => function () use (&$balance) {
            return "Current Balance: $$balance.";
        }
    ];
}

function checkPermission($role, $action)
{
    $roles = [
        "admin" => ["add", "edit", "delete", "view"],
        "editor" => ["edit", "view"],
        "viewer" => ["view"]
    ];
    return in_array($action, $roles[$role] ?? []) ? "Access Granted"
        : "Access Denied";
}

function calculateTax($salary)
{
    if ($salary < 10000) {
        return 0;
    }
    if ($salary <= 50000) {
        return $salary * 0.10;
    }
    return $salary * 0.20;
}




