<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="col1 logo">
                <img src="./img/logo.png" alt="">
            </div>
            <div class="col4 search">
                <input type="text" placeholder="Поиск">
            </div>
            <div class="col5"></div>
            <div class="col2 profile">
                <div class="name">
                    <p>Электрон</p>
                </div>
                <div class="avatar">
                    <img src="./img/avatar.png" alt="">
                </div>
                <div class="arrow">
                    <img src="./img/arrow.png" alt="">
                </div>
                <div class="dropdown">
                    <div class="triangle"></div>
                    <a href="/">Моя страница</a>
                    <a href="#">Выход</a>
                </div>
            </div>
        </div>
    </header>

    <section class="content">
        <div class="container">
            <div class="col7 infoBlock">
                <div class="headerInfo">
                    <h2>Электрон Вебов</h2>
                    <p>изменить статус</p>
                    <div class="changeForm">
                        <div class="triangle"></div>
                        <input id="status" placeholder="введите статус" type="text">
                        <button>Сохранить</button>
                    </div>
                </div>
                <div class="mainInfo">
                    <div class="infoRow">
                        <p class="param col4">День рождения</p>
                        <p class="value">23 сентября 1988 г.</p>
                    </div>

                    <div class="infoRow">
                        <p class="param col4">Семейное положение</p>
                        <p class="value">женат</p>
                    </div>

                    <div class="infoRow">
                        <p class="param col4">Образование</p>
                        <p class="value">ИжГТУ им. М.Т. Калашникова (бывш. ИМИ) '12</p>
                    </div>

                    <div class="infoRow">
                        <p class="param col4">День рождения</p>
                        <p class="value">23 сентября 1988 г.</p>
                    </div>

                    <div class="aboutInfo">
                        <div class="title">
                            <p class="col3">Немного о себе:</p>
                            <hr>
                        </div>
                        <div class="aboutText">
                            <p>С другой стороны новая модель организационной деятельности влечет за собой процесс внедрения и модернизации новых предложений. Товарищи! новая модель организационной деятельности в значительной степени обуславливает создание новых предложений.
                            <br><br>
                            Не следует, однако забывать, что укрепление и развитие структуры в значительной степени обуславливает создание систем массового участия. 
                            <br><br>                          
                            Идейные соображения высшего порядка, а также постоянное информационно-пропагандистское обеспечение нашей деятельности требуют от нас анализа направлений прогрессивного развития. 
                            <br><br>    
                            Задача организации, в особенности же укрепление и развитие структуры позволяет оценить значение направлений прогрессивного развития.</p>
                        </div>
                    </div>

                </div>   
            </div>
            <div class="col1"></div>

            <div class="avatarBlock col4">
                <img src="./img/avatar.png" alt="">
            </div>
        </div>
    </section>

    <section class="photoBlock">
        <div class="container">
            <p class="titleMini">Фотографии Электрона</p>
            <div class="photos">
                <img src="./img/photo_1.jpg" alt="">
                <img src="./img/photo_2.jpg" alt="">
                <img src="./img/photo_3.jpg" alt="">
                <img src="./img/photo_4.jpg" alt="">
            </div>
        </div>
    </section>

    <section class="wall">
        <div class="container">
            <h3 class="titleBlock">Записи на вашей стене</h3>
            <div class="posts">
               
                
                <?php
                    $db = new SQLite3("db.db");
                    $sql = "SELECT * FROM comments";
                    $result = $db->query($sql);
                    $row = $result->fetchArray();
                    $result = $db->query($sql);
                    $array = array();
                    
                    while($data = $result->fetchArray(SQLITE3_ASSOC)) {
                        $array[] = $data;
                    }
                    
                    foreach($array as $row){
                      
                ?>

                <div class="post it<?=$row['id'];?>">
                    <button onclick="del(<?=$row['id'];?>);" class="btnDel"><img src="./img/delete.png" alt=""></button>
                    <div class="rowTop">
                        <div class="avatarPost">
                            <img src="./img/deadpool.png" alt="">
                        </div>
                        <div class="namePost">
                            <p class="nameTitle"><?=$row['name'];?></p>
                            <p class="date"><?=$row['datetime'];?></p>
                        </div>
                    </div>

                    <div class="rowBottom">
                        <p><?=$row['message'];?></p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="addPost">
        <div class="container">
            <h3 class="titleBlock">Добавить запись</h3>
            <div class="formAdd">
                <input type="text" placeholder="Ваше имя" name="name">
                <textarea name="message" id="message" cols="30" rows="10" placeholder="Ваше сообщение"></textarea>
                <button class="btnSend">Отправить</button>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>elbook 2018</p>
        </div>
    </footer>

    <script src="./js/jquery-3.5.0.min.js"></script>
    <script src="./js/common.js"></script>
</body>
</html>
