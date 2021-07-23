<?php
// MySQL：Select
    $db_host = 'localhost';
    $db_name = 'zemi_db';
    $db_user = 'ckeye_user';
    $db_pass = 'ckeye';

    // データベースへ接続する
    $link = mysqli_connect( $db_host, $db_user, $db_pass, $db_name );
    if ( $link !== false ) {
        //-- select > ckeye_users ---------------------------------------------------------------------------
        $query  = "SELECT server,user_name FROM ckeye_users";
        $res    = mysqli_query( $link,$query );
        $data_ckeye_users = array();
        while( $row = mysqli_fetch_assoc( $res ) ) {
            array_push( $data_ckeye_users, $row);
        }
        //-- select > ckeye_useGPU ---------------------------------------------------------------------------
        $query  = "SELECT server,use_GPU FROM ckeye_useGPU";
        $res    = mysqli_query( $link,$query );
        $data_ckeye_useGPU = array();
        while( $row = mysqli_fetch_assoc( $res ) ) {
            array_push( $data_ckeye_useGPU, $row);
        }
    } else {
        echo "データベースの接続に失敗しました";
    }
    // データベースへの接続を閉じる
    mysqli_close( $link );
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="60">
    <title>CKEye</title>
    <link rel="stylesheet" href="common.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="wrapper">
        <div class="title">
            <h1 class="non_selected">サーバー使用状況管理システム</h1>
            <h2 class="non_selected">CKEye</h2>
        </div>
        <div class="contents_wrapper">
            <!-- サーバーを追加した場合は、他のサーバーのdivタグを丸々コピーしてdiv.GPUの前にペーストしてください。 -->
            <!-- その際、サーバーの名前を５か所書き換える必要があります。 -->
            <div class="contents">
                <!-- Uranus  ------------------------------------------------------------------>
                <div class="Uranus item">
                    <img src="./CKEye_img/icon_folder.png" alt="ボタン画像">
                    <h1 class="non_selected">Uranus</h1>
                    <?php
                    // MySQL>情報出力
                    foreach( $data_ckeye_useGPU as $key => $val ){
                        if($val['server'] == "uranus"){
                            echo '<h2 class="non_selected">GPU使用率：'.$val['use_GPU'].'</h2>';
                        }
                    }
                    $sentence = "";
                    foreach( $data_ckeye_users as $key => $val ){
                        if($val['server'] == "uranus"){
                            $sentence .= $val['user_name'] ."<br>";
                        }
                    }
                    echo '<p class="non_selected">'.$sentence.'</p>';
                    ?>
                </div>
                <!-- /uranus  ------------------------------------------------------------------>
                <!-- Ariel ------------------------------------------------------------------>
                <div class="Ariel item">
                    <img src="./CKEye_img/icon_folder.png" alt="ボタン画像">
                    <h1 class="non_selected">Ariel</h1>
                    <?php
                    // MySQL>情報出力
                    foreach( $data_ckeye_useGPU as $key => $val ){
                        if($val['server'] == "ariel"){
                            echo '<h2 class="non_selected">GPU使用率：'.$val['use_GPU'].'</h2>';
                        }
                    }
                    $sentence = "";
                    foreach( $data_ckeye_users as $key => $val ){
                        if($val['server'] == "ariel"){
                            $sentence .= $val['user_name'] ."<br>";
                        }
                    }
                    echo '<p class="non_selected">'.$sentence.'</p>';
                    ?>
                </div>
                <!-- /Ariel ------------------------------------------------------------------>
                <!-- Pluto ------------------------------------------------------------------>
                <div class="Pluto item">
                    <img src="./CKEye_img/icon_folder.png" alt="ボタン画像">
                    <h1 class="non_selected">Pluto</h1>
                    <?php
                    // MySQL>情報出力
                    foreach( $data_ckeye_useGPU as $key => $val ){
                        if($val['server'] == "pluto"){
                            echo '<h2 class="non_selected">GPU使用率：'.$val['use_GPU'].'</h2>';
                        }
                    }
                    $sentence = "";
                    foreach( $data_ckeye_users as $key => $val ){
                        if($val['server'] == "pluto"){
                            $sentence .= $val['user_name'] ."<br>";
                        }
                    }
                    echo '<p class="non_selected">'.$sentence.'</p>';
                    ?>
                </div>
                <!-- /pluto ------------------------------------------------------------------>
                <!-- Primevere ------------------------------------------------------------------>
                <div class="Primevere item">
                    <img src="./CKEye_img/icon_folder.png" alt="ボタン画像">
                    <h1 class="non_selected">Primevere</h1>
                    <?php
                    // MySQL>情報出力
                    foreach( $data_ckeye_useGPU as $key => $val ){
                        if($val['server'] == "primevere"){
                            echo '<h2 class="non_selected">GPU使用率：'.$val['use_GPU'].'</h2>';
                        }
                    }
                    $sentence = "";
                    foreach( $data_ckeye_users as $key => $val ){
                        if($val['server'] == "primevere"){
                            $sentence .= $val['user_name'] ."<br>";
                        }
                    }
                    echo '<p class="non_selected">'.$sentence.'</p>';
                    ?>
                </div>
                <!-- /Primevere ------------------------------------------------------------------>
                <!-- Venus ------------------------------------------------------------------>
                <div class="Venus item">
                    <img src="./CKEye_img/icon_folder.png" alt="ボタン画像">
                    <h1 class="non_selected">Venus</h1>
                    <?php
                    // MySQL>情報出力
                    foreach( $data_ckeye_useGPU as $key => $val ){
                        if($val['server'] == "venus"){
                            echo '<h2 class="non_selected">GPU使用率：'.$val['use_GPU'].'</h2>';
                        }
                    }
                    $sentence = "";
                    foreach( $data_ckeye_users as $key => $val ){
                        if($val['server'] == "venus"){
                            $sentence .= $val['user_name'] ."<br>";
                        }
                    }
                    echo '<p class="non_selected">'.$sentence.'</p>';
                    ?>
                </div>
                <!-- /venus ------------------------------------------------------------------>
                <!-- Alice ------------------------------------------------------------------>
                <div class="Alice item">
                    <img src="./CKEye_img/icon_folder.png" alt="ボタン画像">
                    <h1 class="non_selected">Alice</h1>
                    <?php
                    // MySQL>情報出力
                    foreach( $data_ckeye_useGPU as $key => $val ){
                        if($val['server'] == "alice"){
                            echo '<h2 class="non_selected">GPU使用率：'.$val['use_GPU'].'</h2>';
                        }
                    }
                    $sentence = "";
                    foreach( $data_ckeye_users as $key => $val ){
                        if($val['server'] == "alice"){
                            $sentence .= $val['user_name'] ."<br>";
                        }
                    }
                    echo '<p class="non_selected">'.$sentence.'</p>';
                    ?>
                </div>
                <!-- /Alice ------------------------------------------------------------------>
                <!-- Saturn ------------------------------------------------------------------>
                <div class="Saturn item">
                    <img src="./CKEye_img/icon_folder.png" alt="ボタン画像">
                    <h1 class="non_selected">Saturn</h1>
                    <?php
                    // MySQL>情報出力
                    foreach( $data_ckeye_useGPU as $key => $val ){
                        if($val['server'] == "saturn"){
                            echo '<h2 class="non_selected">GPU使用率：'.$val['use_GPU'].'</h2>';
                        }
                    }
                    $sentence = "";
                    foreach( $data_ckeye_users as $key => $val ){
                        if($val['server'] == "saturn"){
                            $sentence .= $val['user_name'] ."<br>";
                        }
                    }
                    echo '<p class="non_selected">'.$sentence.'</p>';
                    ?>
                </div>
                <!-- /Saturn ------------------------------------------------------------------>
                <!-- Luna ------------------------------------------------------------------>
                <div class="Luna item">
                    <img src="./CKEye_img/icon_folder.png" alt="ボタン画像">
                    <h1 class="non_selected">Luna</h1>
                    <?php
                    // MySQL>情報出力
                    foreach( $data_ckeye_useGPU as $key => $val ){
                        if($val['server'] == "luna"){
                            echo '<h2 class="non_selected">GPU使用率：'.$val['use_GPU'].'</h2>';
                        }
                    }
                    $sentence = "";
                    foreach( $data_ckeye_users as $key => $val ){
                        if($val['server'] == "luna"){
                            $sentence .= $val['user_name'] ."<br>";
                        }
                    }
                    echo '<p class="non_selected">'.$sentence.'</p>';
                    ?>
                </div>
                <!-- /Luna ------------------------------------------------------------------>
                <!-- サーバー追加時にはここにペーストする。 -->
            </div>
        </div>
    </div>
</body>
</html>
