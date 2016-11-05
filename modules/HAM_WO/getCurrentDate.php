<?php


global $timedate;
$timeZome = $timedate->getInstance()->userTimezone();		

echo $timeZome;
echo $timedate->now();

				$renewal_date = $timedate->fromUserDate($this->end_date);

                $renewal_date->modify("-$period days");
                $time_value = $timedate->fromString($default_time);
                $renewal_date->setTime($time_value->hour,$time_value->min,$time_value->sec);

                $renewal_date = $renewal_date->format($timedate->get_date_time_format());
                $this->renewal_reminder_date = $renewal_date;

?>