<?php

interface TimeToWordConvertingInterface {
public function convert(int $hours, int $minutes): string;
}

class TimeToWordConverter implements TimeToWordConvertingInterface {
private $hours_words = array(
1 => 'один', 2 => 'два', 3 => 'три', 4 => 'четыре', 5 => 'пять', 6 => 'шесть',
7 => 'семь', 8 => 'восемь', 9 => 'девять', 10 => 'десять', 11 => 'одиннадцать',
12 => 'двенадцать', 13 => 'тринадцать', 14 => 'четырнадцать', 15 => 'пятнадцать',
16 => 'шестнадцать', 17 => 'семнадцать', 18 => 'восемнадцать', 19 => 'девятнадцать',
20 => 'двадцать', 30 => 'тридцать', 40 => 'сорок', 50 => 'пятьдесят'
);


private $minutes_words = array(
1 => 'одна', 2 => 'две', 3 => 'три', 4 => 'четыре', 5 => 'пять', 6 => 'шесть',
7 => 'семь', 8 => 'восемь', 9 => 'девять', 10 => 'десять', 11 => 'одиннадцать',
12 => 'двенадцать', 13 => 'тринадцать', 14 => 'четырнадцать', 15 => 'пятнадцать',
16 => 'шестнадцать', 17 => 'семнадцать', 18 => 'восемнадцать', 19 => 'девятнадцать',
20 => 'двадцать', 30 => 'половина'
);


public function convert(int $hours, int $minutes): string {
if ($minutes == 0) {
return $this->hours_words[$hours] . " часов";
} else if ($minutes <= 20) {
return $this->hours_words[$hours] . " " . $this->minutes_words[$minutes];
} else if ($minutes < 30) {
return $this->hours_words[$hours] . " " . $this->minutes_words[20] . " " . $this->minutes_words[$minutes-20];
} else if ($minutes == 30) {
return $this->minutes_words[30] . " минут" . " назад " . $this->hours_words[$hours];
} else if ($minutes < 40) {
return $this->minutes_words[30] . " " . $this->minutes_words[$minutes-30] . " минут" . " назад " . $this->hours_words[$hours];
} else if ($minutes == 40) {
return $this->minutes_words[20] . " минут" . " до " . $this->hours_words[$hours+1];
} else if ($minutes < 60) {
return $this->minutes_words[60-$minutes] . " " . $this->minutes_words[20] . " минут" . " до " . $this->hours_words[$hours+1];
}
}
}
$converter = new TimeToWordConverter();

echo "Введите значение часов (от 1 до 12): ";
$hours = intval(fgets(STDIN));

echo "Введите значение минут (от 0 до 59): ";
$minutes = intval(fgets(STDIN));

echo $converter->convert($hours, $minutes);
?>