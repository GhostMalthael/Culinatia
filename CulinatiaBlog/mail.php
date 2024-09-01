<?php 
    $digits    = array_flip(range('0', '9'));
    $lowercase = array_flip(range('a', 'z'));
    $uppercase = array_flip(range('A', 'Z')); 
    $special   = array_flip(str_split('!@#$%^&*()_+=-}{[}]\|;:<>?/'));
    $combined  = array_merge($digits, $lowercase, $uppercase, $special);

    $password  = str_shuffle(array_rand($digits) .
                            array_rand($lowercase) .
                            array_rand($uppercase) . 
                            array_rand($special) . 
                            implode(array_rand($combined, rand(4, 8))));

    echo $password;
    if(mail("AlexChibisov2003@yandex.ru", "qwe", "Ваш пароль: $password", "From: AlexChibisov2003@yandex.ru"))
    {
        echo "<script>alert(\"Сообщение отправлено\");  
        location.href='index.php';
        </script>"; 
    }
?>