

## inventory
- [TOTP] Spomky-Labs/otphp: php implementation of TOTP
  - sample
  ```
  <?php
    use OTPHP\TOTP;
    $otp = TOTP::create();
    echo 'The current OTP is: '.$otp->now();
  ```
