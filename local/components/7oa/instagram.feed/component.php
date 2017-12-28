<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$token = ''; //Указать токен http://instagram.com/developer/
$user_id = 'self';
$limit = 18;
$size = 320;
$instagram_cnct = curl_init();
curl_setopt( $instagram_cnct, CURLOPT_URL, "https://api.instagram.com/v1/users/" . $user_id . "/media/recent?access_token=" . $token );
curl_setopt( $instagram_cnct, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt( $instagram_cnct, CURLOPT_TIMEOUT, 15 );
$media = json_decode( curl_exec( $instagram_cnct ) );
curl_close( $instagram_cnct );

if($this->StartResultCache(false)){

    $arResult = array('ITEMS'=>array());
    $obResult = $media;

    foreach (array_slice($media->data, 0, $limit) as $key => $obData){
        $arItem = array(
            'LINK' => $obData->link,
            'IMAGES' => array(
                'thumbnail' => $obData->images->thumbnail->url,
                'low_resolution' => $obData->images->low_resolution->url,
                'standard_resolution' => $obData->images->standard_resolution->url,
            ),
        );
        $arResult['ITEMS'][] = $arItem;
    }

    $this->IncludeComponentTemplate();
}