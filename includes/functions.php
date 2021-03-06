<?php
    function plotAll($array)
    {
        global $db;
        $sql = "SELECT * FROM gpslocations";
        $sql .= " WHERE phoneNumber IN( '".$array."')";
        $sql .= " ORDER BY phoneNumber;";
        $result = $db->query($sql);
        return $result;
    }

    function plotAllFromTo($array, $from, $to)
    {
        global $db;
        $sql = "SELECT * FROM gpslocations";
        $sql .= " WHERE phoneNumber IN( '".$array."')";
        $sql .= " AND LastUpdate BETWEEN '".$from."' AND '".$to."'";
        $sql .= " ORDER BY phoneNumber;";
        $result = $db->query($sql);
        return $result;
    }

    function plotLast($array)
    {
        global $db;
        $sql = "SELECT Latitude,Longitude,phoneNumber,MAX(LastUpdate) FROM gpslocations WHERE phoneNumber IN( '".$array."')";
        $sql .= " GROUP BY phoneNumber ";
        $result = $db->query($sql);
        return $result;
    }

    function escape($var)
    {
        return htmlEntities($var, ENT_QUOTES);
    }

    function generateBG($x) {
        $colors = ["blue","green","red","yellow","white","purple"];
        while ($x > 5) {
            $x -= 5;
        }
        return $colors[$x];
    }
?>