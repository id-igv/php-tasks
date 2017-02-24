<?php
    /**
     *  TASK #13 : Заданы две переменные: 
     *             s - длина участка, который проехал автомобиль; 
     *             t - время движения в часах. 
     *             Вывести скорость автомобиля на заданном участке 
     *             в км/час и в м/сек.
     */
    
    // S = V * t; => V = S / t;
    // 1 [km/h] = 1000 [m/h] = 1000/3600 [m/sec] = 1/3.6 [m/sec] 
    // => A [km/h] = A/3.6 [m/sec] =>
    // => B [m/sec] = B * 3.6 [km/h]
    
    function converter($value, $from, $to) {
        /*
        $value - величина, значение которой конверtируем
         $from - с какой системы измерения
           $to - в какую систему измерения
           
        $from, $to принимают только строки вида
        "kmph" = km per hour
        "kmps" = km per sec
        "mph" = m per hour
        "mps" = mper sec
        */
        
        if($from == $to) {
            return $value;
        }
        
        switch ($to) {
            case 'kmph':
                switch ($from) {
                    case 'mps':
                        return $value * 3.6;
                    case 'kmps':
                        return $value * 3600.0;
                    case 'mph':
                        return $value / 1000.0;
                    
                    default:
                        return null;
                }
                return 'Oops... unexpected quit';
                
            case 'mps':
                switch ($from) {
                    case 'kmph':
                        return $value / 3.6;
                    case 'kmps':
                        return $value * 1000.0;
                    case 'mph':
                        return $value / 3600.0;
                    
                    default:
                        return null;
                }
                return 'Oops... unexpected quit';
                
            case 'kmps':
                switch ($from) {
                    case 'mps':
                        return $value / 1000.0;
                    case 'kmph':
                        return $value / 3600.0;
                    case 'mph':
                        return $value / (3.6E6);
                    
                    default:
                        return null;
                }
                return 'Oops... unexpected quit';
                
            case 'mph':
                switch ($from) {
                    case 'mps':
                        return $value * 3600.0;
                    case 'kmps':
                        return $value * (3.6E6);
                    case 'kmph':
                        return $value * 1000.0;
                    
                    default:
                        return null;
                }
                return 'Oops... unexpected quit';
                
            default:
                return null;
        }
    }
    
    function checkPostData() {
        if(!is_numeric($_POST['distance']) || !is_numeric($_POST['time'])) {
            return false;
        }
        return true;
    }
    
    function outMessage($msg_str) {
        return $msg_str == null ? '' : $msg_str;
    }
    
    if($_POST['distance'] == null || $_POST['time'] == null || $_POST == null) {
        $msg = 'Enter values';
    }
    elseif (!checkPostData()) {
        $msg = '<font color="red">Oops, error: Entered value/s probably are not numeric.</font>';
    }
    elseif ((float)$_POST['time'] == 0) {
        $msg = '<font color="red">Oops, error: Time can not be equal to zero.</font>';
    }
    else {
        $velocity = (float)$_POST['distance'] / (float)$_POST['time'];
        $res_kmph = converter($velocity, 
                            $_POST['dist_measure'] . 'p' . $_POST['time_measure'],
                            'kmph');
        
        $res_mps = converter($velocity, 
                            $_POST['dist_measure'] . 'p' . $_POST['time_measure'],
                            'mps');
        
        $answer = "{$res_kmph} kmph or {$res_mps} mps";
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calculator</title>
    <style>
        table td input {
            width: 100%;
        }
        
        input[type="radio"] {
            width: 20%;
        }
        
        table, td, th {
            box-sizing: border-box;
            padding: 0;
            border-spacing: 10px;
        }
    </style>
</head>
<body>
    <h3>Calculating velocity. <?=$msg?></font></h3>
    <form method="post">
        <table>
            <th></th>
            <th>
                Value
            </th>
            <th>
                Measure
            </th>
            <tr>
                <td>Distance:</td>
                <td>
                    <input type="text" name="distance" value="<?=outMessage($_POST['distance'])?>" />
                </td>
                <td>
                    <input type="radio" name="dist_measure" value="km" checked/> km
                </td>
                <td>
                    <input type="radio" name="dist_measure" value="m"/> m
                </td>
            </tr>
            <tr>
                <td>Time:</td>
                <td>
                    <input type="text" name="time" value="<?=outMessage($_POST['time'])?>" />
                </td>
                <td>
                    <input type="radio" name="time_measure" value="h" checked/> hour
                </td>
                <td>
                    <input type="radio" name="time_measure" value="s"/> sec
                </td>
            </tr>
        </table>
        <p><b>Velocity:</b> <?=$answer?></p>
        <input type="submit" value="Calculate"/>
    </form>
</body>
</html>