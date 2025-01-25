```php
$date = new DateTime();
$interval = new DateInterval('P1M');
$date->add($interval);
$formattedDate = $date->format('Y-m-d');
echo $formattedDate;
```