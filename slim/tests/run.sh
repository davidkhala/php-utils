runApp(){
  local port=${1:-8888}
  php -S localhost:"${port}" app.php
}
$1 "$2"