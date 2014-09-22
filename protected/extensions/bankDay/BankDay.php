<?php

class BankDay
{

    public static $holidays = array(
        '01-01',
        '01-02',
        '01-07',
        '03-08',
        '05-01',
    );
    # 1, 2, 3, 4 and 5 of january - New Years Holidays;
    # 7 of january - Christmas;
    # 8 marth - Women's day;
    protected static $weekends = array(0, 6);

    # 0 - Sunday
    # 6 - Saturday

    /**
     * Date preparing
     * @param string $date date
     * @return timestamp
     */
    public static function prepareDate($date)
    {
        if ($date !== null && !is_int($date)) {
            $ts = strtotime($date);
            if ($ts === -1 || $ts === false) {
                throw new Exception('Unable to parse date/time value from input: ' . var_export($date, true));
            }
        } else {
            $ts = $date;
        }
        return $ts;
    }

    /**
     * Is Weekend day
     * @param string $date date
     * @return boolean
     */
    public static function isWeekend($date)
    {
        $ts = self::prepareDate($date);
        return in_array(date('w', $ts), self::$weekends);
    }

    /**
     * is Holiday day
     * @param string $date date
     * @return boolean
     */
    public static function isHoliday($date)
    {
        $ts = self::prepareDate($date);
        return in_array(date('m-d', $ts), self::$holidays);
    }

    /*     * is work day
     * @param string $date date
     * @return boolean
     */

    public static function isWorkDay($date)
    {
        $ts = self::prepareDate($date);
        $holidays = self::getHolidays($ts);
        return !in_array(date('Y-m-d', $ts), $holidays);
    }

    /**
     * Return array with holidays
     * @param string $date date
     * @param integer $interval interval
     * @return array
     */
    public static function getHolidays($date, $interval = 30)
    {
        $ts = self::prepareDate($date);
        $holidays = array();

        for ($i = -$interval; $i <= $interval; $i++) {
            $curr = strtotime($i . ' days', $ts);

            if (self::isWeekend($curr) || self::isHoliday($curr)) {
                $holidays[] = date('Y-m-d', $curr);
            }
        }



        // Move holidays
        foreach ($holidays as $date) {
            $ts = self::prepareDate($date);
            if (self::isHoliday($ts) && self::isWeekend($ts)) {
                $i = 0;
                while (in_array(date('Y-m-d', strtotime($i . ' days', $ts)), $holidays)) {
                    $i++;
                }
//        $holidays[] = date('Y-m-d', strtotime($i.' days', $ts));
//         Sys::dump($holidays);
            }
        }

        return $holidays;
    }

    /**
     * Return days count for Date +$days bank days
     * @param string $start Date
     * @param integer $days bank days count
     * @param string $format Format date()
     * @return integer, string
     */
    public static function getDateRange($start, $days, $format = null)
    {
        $ts = self::prepareDate($start);

        $holidays = self::getHolidays($start);
        $return = array();
        for ($i = 0; $i < $days; $i++) {
            $curr = strtotime('+' . $i . ' days', $ts);
            if (!in_array(date('Y-m-d', $curr), $holidays)) {
                $return[] = date($format, $curr);
            } else {
                $days++;
            }
        }

        return $return;
    }

    /**
     * Return day for Date +$days banl days
     * @param string $start Date
     * @param integer $days bank days count
     * @param string $format  Format date()
     * @return string
     */
    public static function getEndDate($start, $days, $format = null)
    {
        $ts = self::prepareDate($start);
        $holidays = self::getHolidays($start);

        for ($i = 0; $i <= $days; $i++) {
            $curr = strtotime('+' . $i . ' days', $ts);
            if (in_array(date('Y-m-d', $curr), $holidays)) {
                $days++;
            }
        }

        if ($format) {
            return date($format, strtotime('+' . $days . ' days', $ts));
        } else {
            return strtotime('+' . $days . ' days', $ts);
        }
    }

    /**
     * Return bank days count for date range
     * @param string $start Date start
     * @param string $end Date finish
     * @return integer
     */
    public static function getNumDays($start_in, $end_in)
    {
        $start = self::prepareDate($start_in);
        $end = self::prepareDate($end_in);

        if ($start > $end) {
            throw new Exception(sprintf('Start date ("%s") bust be greater then end date ("%s"). ', $start_in, $end_in));
        }

        $bank_days = 0;
        $days = ceil(($end - $start) / 3600 / 24);
        $holidays = self::getHolidays($start, $days);
        for ($i = 0; $i <= $days; $i++) {
            $curr = strtotime('+' . $i . ' days', $start);
            if (!in_array(date('Y-m-d', $curr), $holidays)) {
                $bank_days++;
            }
        }

        return $bank_days;
    }

}

/**
 *  get date differen
 * @param string $d1
 * @param string $d2
 * @return integer
 */
function _date_diff($d1, $d2)
{
    /* compares two timestamps and returns array with differencies (year, month, day, hour, minute, second)
     */
    if (!$d1) {
        return false;
    }
    $temp = 0;
    //check higher timestamp and switch if neccessary
    $d1 = date_parse($d1);
    $d2 = date_parse($d2);
    //days
    if ($d1['day'] >= $d2['day']) {
        $diff['day'] = $d1['day'] - $d2['day'];
    } else {
        $d1['month']--;
        $diff['day'] = date("t", $temp) - $d2['day'] + $d1['day'];
    }
    //months
    if ($d1['month'] >= $d2['month']) {
        $diff['month'] = $d1['month'] - $d2['month'];
    } else {
        $d1['year']--;
        $diff['month'] = 12 - $d2['month'] + $d1['month'];
    }
    //years
    $diff['year'] = $d1['year'] - $d2['year'];
    return $diff['day'] + $diff['month'] * 30 + $diff['year'] * 365;
}