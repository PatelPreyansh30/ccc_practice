<?php

class BankAccount
{
    private $accountNumber, $accountHolder, $balance;

    public function __construct($accountNumber, $accountHolder, $balance)
    {
        $this->accountNumber = $accountNumber;
        $this->accountHolder = $accountHolder;
        $this->balance = $balance;
    }

    public function deposit($amount)
    {
        $this->balance += $amount;
    }

    public function withdraw($amount)
    {
        if ($this->balance > $amount) {
            $this->balance -= $amount;
        } else {
            echo "<strong>Insufficient balance for withdrawal</strong><br>";
        }
    }

    public function displayInfo()
    {
        echo "Account number: {$this->accountNumber}<br>
        Account holder: {$this->accountHolder}<br>
        Balance: {$this->balance}<br>
        ";
    }
}

$account = new BankAccount(785698451265, "Preyansh Patel", 8000.00);
$account->displayInfo();

$account->withdraw(5000);
$account->displayInfo();

$account->deposit(1000);
$account->displayInfo();

$account->withdraw(10000);
$account->displayInfo();
