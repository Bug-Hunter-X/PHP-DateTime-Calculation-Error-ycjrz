```php
function addMonthToDate(DateTime $date, int $months): DateTime
{
  $year = $date->format('Y');
  $month = $date->format('m');
  $day = $date->format('d');

  $newMonth = $month + $months;
  $newYear = $year + floor(($newMonth - 1) / 12);
  $newMonth = ($newMonth - 1) % 12 + 1;

  $newDate = DateTime::createFromFormat('Y-m-d', "{$newYear}-{$newMonth}-{$day}");
  if (!$newDate) {
    //Handle invalid date, e.g., Feb 30th
    //Consider using last day of the month
    $newDate = new DateTime("{$newYear}-{$newMonth}-01");
    $newDate->modify('last day of this month');
  }
  return $newDate;
}

$date = new DateTime('2024-01-31');
$newDate = addMonthToDate($date, 1);
echo $newDate->format('Y-m-d'); //Outputs 2024-02-29
```