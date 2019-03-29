<?php
ini_set("allow_url_include", "1");
error_reporting(E_ALL);
try{
 
    $servername = "localhost";
    $username = "prontowe_root";
    $password = "{k66BW))2R!J";
    $dbname = "prontowe_wordpress";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }


    $url="https://play.google.com/store/apps/collection/topselling_free";
    $contents=file_get_contents($url);
    preg_match_all('/<div class="card-content id-track-click id-track-impression" (.*?)>(.*?)<span class="display-price">/', $contents,$res);


    $pic_data=$res[2];
    $i = 0;
    foreach($pic_data as $data):
        preg_match_all('/<div class=\"cover-inner-align\">(.*?)<\/div>/s', $data, $data2);
        preg_match('/<img.*? src=\"(.*?)\".*?>/',$data2[0][0],$image_src);
        $arr[] = $image_src = "http:".$image_src[1]; 

        preg_match('/<img.*? alt=\"(.*?)\".*?>/',$data2[0][0],$image_alt);
        $arr[] = $image_title = $image_alt[1]; 

        preg_match('/<a.*? href=\"(.*?)\".*?>/',$data,$image_alt);
        $detail_link = $image_alt[1]; 
        $arr[] = "https://play.google.com$detail_link"; 
        preg_match_all('/<div class=\"subtitle-container\">(.*?)<\/div>/s', $data, $data2);
        preg_match('/<a.*? title=\"(.*?)\".*?>/',$data2[0][0],$image_subtitle);
        $arr[] = $image_subtitle = $image_subtitle[1];

        $url="https://play.google.com$detail_link"; 
        $contents=file_get_contents($url);
        preg_match_all('/<div jsname=\"sngebd\">(.*?)<\/div>/s', $contents, $data2);
        $arr[] = $description = base64_encode($data2[0][0]); 

        $image_title = mysqli_real_escape_string($conn,$image_title);
        $image_src = mysqli_real_escape_string($conn,$image_src);
        $detail_url = mysqli_real_escape_string($conn,$url);
        $image_subtitle = mysqli_real_escape_string($conn,$image_subtitle);
        $description = mysqli_real_escape_string($conn,$description);

        $sql = "SELECT id FROM app_data where title = '$image_title'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = $result->fetch_assoc();
            $id = $row['id'];
            $sql = "UPDATE app_data SET image='$image_src' , sub_title='$image_subtitle',detail_url = '$detail_url', description = $description  WHERE id=$id";
            $conn->query($sql);
            if($conn->query($sql)===TRUE){
                echo 'updated';
            }
        } else {
            $sql = "INSERT INTO app_data (title, image, sub_title,detail_url,description) VALUES ('$image_title', '$image_src', '$image_subtitle','$detail_url','$description')";
            mysqli_query($conn, $sql);
            if($conn->query($sql)===TRUE){
                echo 'inserted';
            }
        }

        if($i == 200) break;
        //echo "<pre>";    print_r($arr); 
        $i++;
    endforeach;

    $conn->close();
    header('location:http://www.prontowebsolution.com/demo-updated');
   
} catch (Exception $ex) {
    echo "Error : ". $ex->getMessage();  
}
