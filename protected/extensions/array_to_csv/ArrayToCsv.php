<?php

class ArrayToCsv
{

    public function dataArrayToCsv(array &$dataArray, $delimiter = ';', $enclosure = '"', $encloseAll = false, $nullToMysqlNull = false)
    {
        $dataText = '';
        foreach ($dataArray as $line){
            $dataText .= $this->lineArrayToCsv($line, $delimiter, $enclosure, $encloseAll, $nullToMysqlNull). "\n";
        }
        return $dataText;
    }

    public function lineArrayToCsv(array &$fields, $delimiter = ';', $enclosure = '"', $encloseAll = false, $nullToMysqlNull = false)
    {
        $delimiter_esc = preg_quote($delimiter, '/');
        $enclosure_esc = preg_quote($enclosure, '/');

        $output = array();
        foreach ($fields as $field) {
            if ($field === null && $nullToMysqlNull) {
                $output[] = 'NULL';
                continue;
            }

            // Enclose fields containing $delimiter, $enclosure or whitespace
            if ($encloseAll || preg_match("/(?:${delimiter_esc}|${enclosure_esc}|\s)/", $field)) {
                $output[] = $enclosure . str_replace($enclosure, $enclosure . $enclosure, $field) . $enclosure;
            } else {
                $output[] = $field;
            }
        }

        return implode($delimiter, $output);
    }

}
