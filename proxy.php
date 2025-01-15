<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = "https://stake.bet/_api/graphql";

    $headers = [
        "accept: */*",
        "accept-language: en-GB,en-US;q=0.9,en;q=0.8,hi;q=0.7",
        "content-type: application/json",
        "cookie: __cf_bm=SociOaj03n7aSSKmvamIXSM0zkZleR6.uMszjLLwnWM-1736918145-1.0.1.1-vXdVUW79QNUIh3pXak4eUT3ijItrt5wDgh4bWrlPhNjSg1VcCFIB7_WhvqnZAj3_X0t2.6cEhEXkzsErflCMig; cf_clearance=Dr1XKuEnVw7mfeCbX8mVIN1M3mIoP2PmS3W5HqIQKfQ-1736918145-1.2.1.1-d29WjvmIxkdo.2zs5o8PgVBKGkEIaGFE8t7sstRXgwF3kC46B467gTsM80lTuC8LrJvX7iQglT1CyrnaqzghpdUx.Xo1KM9p_MjxDW2NbFYmy8QvzzKiQf_G5OgIxYoCxjauNoQ6bVScjckunIaTbiJ_Wk0wRJCTVnE.0u8ZRzGD0y3pn8X25lhplODQZestViPpJDT40kU2Cn09Lqs23bfMU.dZttyts7lU2lqeT58CB1WVnd7Dgsr6jeE9KUx_CVPfqqX583fH4rXfeXIvWiUNtzzmFBOS3v5KbH9VmRJ_o7Mvguoai5xPpD88dg2G8rKrcpmSfOERaHntgVX.BQ;",
        "origin: https://stake.bet",
        "priority: u=1, i",
        "referer: https://stake.bet/casino/games/dice",
        "sec-ch-ua: \"Google Chrome\";v=\"131\", \"Chromium\";v=\"131\", \"Not_A Brand\";v=\"24\"",
        "sec-ch-ua-arch: \"x86\"",
        "sec-ch-ua-bitness: \"64\"",
        "sec-ch-ua-full-version: \"131.0.6778.265\"",
        "sec-ch-ua-full-version-list: \"Google Chrome\";v=\"131.0.6778.265\", \"Chromium\";v=\"131.0.6778.265\", \"Not_A Brand\";v=\"24.0.0.0\"",
        "sec-ch-ua-mobile: ?0",
        "sec-ch-ua-model: \"\"",
        "sec-ch-ua-platform: \"Windows\"",
        "sec-ch-ua-platform-version: \"15.0.0\"",
        "sec-fetch-dest: empty",
        "sec-fetch-mode: cors",
        "sec-fetch-site: same-origin",
        "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36",
        "x-access-token: 73943241e2c61bb4d8b5dd4d25323546798ef44eeb7dc5cc36f216c685bcabd7ac7f70b07cba3dcf4bbfff7a0b564534",
        "x-lockdown-token: s5MNWtjTM5TvCMkAzxov"
    ];

    $body = file_get_contents('php://input');
    $decodedBody = json_decode($body, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        http_response_code(400); 
        echo json_encode(["error" => "Invalid JSON input: " . json_last_error_msg()]);
        exit;
    }

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);

    $response = curl_exec($ch);
    $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($response === false) {
        http_response_code(500); 
        echo json_encode(["error" => "cURL Error: " . curl_error($ch)]);
    } else {
        http_response_code($httpStatus);
        echo $response;
    }

    curl_close($ch);
} else {
    http_response_code(405); 
    echo json_encode(["error" => "Invalid request method"]);
}
?>
