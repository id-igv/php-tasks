<?php
    $img_pth = 'img/person.png';
    $full_name = 'Фамилия Имя Отчество';
    $day_of_birth = 'ДД';
    $month_of_birth = 'ММ';
    $year_of_birth = 'ГГГГ';
    $date_of_birth = "{$day_of_birth}/{$month_of_birth}/{$year_of_birth}";
    $city = 'Город';
    $country = 'Страна';
    
    $education = '
                    <p>
                        2011 - 2015 гг. учился в таком-то колледже на такой-то специальности.
                    </p>
                    <p>
                        Тут разные тексты об учебных достижения и прочем. 
                        Тут разные тексты об учебных достижения и прочем.
                        Тут разные тексты об учебных достижения и прочем. 
                        Тут разные тексты об учебных достижения и прочем.
                        Тут разные тексты об учебных достижения и прочем. 
                        Тут разные тексты об учебных достижения и прочем.
                    </p>
                    <p>
                        2015 г. и по сегодня студент какого-то отделения какого-то высшего учебного заведения.
                    </p>
                    <p>
                        Тут снова разные тексты об учебных достижения и прочем. 
                        Тут снова разные тексты об учебных достижения и прочем.
                        Тут опять разные тексты об учебных достижения и прочем.
                    </p>
                ';
    $work_exp = '
                    <p>
                        Опыт работы в сфере ИТ ...
                        Много текста о предыдущих местах работы
                        Много текста о предыдущих местах работы
                        Много текста о предыдущих местах работы
                        ...
                        (или не много...)
                    </p>
                    <p>
                        Тексты о завершенных (и не очень проектах)
                        Тексты о завершенных (и не очень проектах)
                        Тексты о завершенных (и не очень проектах)
                        Среди них:<br>
                        <a href="#some_link">Полиномиальный калькулятор</a>,<br>
                        <a href="#some_link_1">Система формирования форматированых документов</a>.<br>
                        (links r clickable btw)
                    </p>
                ';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&amp;subset=cyrillic" rel="stylesheet">
    
    <title>RESUME: Namy Surnamy</title>
</head>
<body>
    <div class="container col-m-10 col-9">
        <img class="person-img person-img-desc-display col-m-3 col-3" src=<?=$img_pth?> alt="some person" />
        <div class="person-desc person-img-desc-display col-m-7 col-7">
            <h1>
                Резюме:
            </h1>
            <h3>
                <?=$full_name?>
            </h3>
            <p>
                <?="{$date_of_birth} г.р., г.{$city}, {$country}"?>
            </p>
            <ul class="contactMe person-img-desc-display">
                <li>
                    <a href="https://www.facebook.com/" target="_blank">
                        <img src="img/social_facebook.svg"></img>
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/" target="_blank">
                        <img src="img/social_twitter.svg"></img>
                    </a>
                </li>
                <li>
                    <a href="https://plus.google.com" target="_blank">
                        <img src="img/social_google.svg"></img>
                    </a>
                </li>
                <li>
                    <a href="contactme.html">
                        <img src="img/social_mail_me.svg"></img>
                    </a>
                </li>
            </ul>
        </div>
        <table id="edu-exp">
            <tr>
                <td class="col-m-12 col-6">
                    <span class="header">
                        <b>Образование:</b><br>
                    </span>
                    <span class="text">
                        <?=$education?>
                    </span>
                </td>
                <td class="dataDisplay col-m-12 col-6">
                    <span class="header">
                        <b>Опыт работы и проекты:</b><br>
                    </span>
                    <span class="text">
                        <?=$work_exp?>
                    </span>
                </td>
            </tr>
            <tr class="rowDisplay">
                <td class="col-m-12 col-12">
                    <span class="header">
                        <b>Опыт работы и проекты:</b><br>
                    </span>
                    <span class="text">
                        <?=$work_exp?>
                    </span>
                </td>
            </tr>
        </table>
        <div class="footer col-m-12 col-12">
            Created by IG, Feb 2017 &copy;
        </div>
    </div>
</body>
</html>
