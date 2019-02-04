<?php
ini_set('max_execution_time', 300);
use Illuminate\Support\Facades\Storage;
$links = [
     'https://www.arval.sk/sites/sk/files/media/pexels-photo-97079.jpg',
     'https://www.arval.sk/sites/sk/files/media/pe0075019.jpg',
     'https://www.arval.sk/sites/sk/files/media/car_picture/app_set_1_3.jpg',
     'https://www.arval.sk/sites/sk/files/media/app_set_1_2.jpg',
     'https://www.arval.sk/sites/sk/files/media/app_set_1_1.jpg',
     'https://www.arval.sk/sites/sk/files/media/arval_packs_easy_-_relax_1400x500_1.png',
     'https://www.arval.sk/sites/sk/files/media/fleetove-naklady-pod-kontrolou-4387.jpg',
     'https://www.arval.sk/sites/sk/files/media/2018_09_28_14_31_37_arval_life_sk_3_2018.png',
     'https://www.arval.sk/sites/sk/files/media/ifrs.png',
     'https://www.arval.sk/sites/sk/files/media/13221046_979361535511527_3446233975841574598_n.png',
      'https://www.arval.sk/sites/sk/files/media/13221046_979361535511527_3446233975841574598_n_0.png',
      'https://www.arval.sk/sites/sk/files/media/arval_0_0.jpg',
      'https://www.arval.sk/sites/sk/files/media/arval.jpg',
      'https://www.arval.sk/sites/sk/files/media/arval.jpg',
      'https://www.arval.sk/sites/sk/files/media/arval.jpg',
      'https://www.arval.sk/sites/sk/files/media/arval.jpg',
      'https://www.arval.sk/sites/sk/files/media/arval.jpg',
      'https://www.arval.sk/sites/sk/files/media/ipad.jpg',
      'https://www.arval.sk/sites/sk/files/media/mtr_ang.png',
      'https://www.arval.sk/sites/sk/files/media/ph1265-042.jpg',
      'https://www.arval.sk/sites/sk/files/media/packs_offer_arval.png',
      'https://www.arval.sk/sites/sk/files/media/42-17771219.jpg',
      'https://www.arval.sk/sites/sk/files/media/42-17771219.jpg',
      'https://www.arval.sk/sites/sk/files/media/161110_arval_motor_tradebanner_1.jpg',
      'https://www.arval.sk/sites/sk/files/media/161110_arval_motor_tradebanner_0.jpg',
      'https://www.arval.sk/sites/sk/files/media/lv0150026_0.jpg',
      'https://www.arval.sk/sites/sk/files/media/lv0150026_0.jpg',
      'https://www.arval.sk/sites/sk/files/media/ph1269-009.jpg',
      'https://www.arval.sk/sites/sk/files/media/ph1269-009.jpg',
      'https://www.arval.sk/sites/sk/files/media/ph1269-009.jpg',
      'https://www.arval.sk/sites/sk/files/media/ph1269-009.jpg',
      'https://www.arval.sk/sites/sk/files/media/male-odpisy_1.jpg',
      'https://www.arval.sk/sites/sk/files/media/ibxguf00053186_500x470.jpg',
      'https://www.arval.sk/sites/sk/files/media/ibxguf00053186_500x470.jpg',
      'https://www.arval.sk/sites/sk/files/media/985243b9a8c03d32d4d80b568bf20ce8.jpg',
      'https://www.arval.sk/sites/sk/files/media/ph103-064_2.jpg',
      'https://www.arval.sk/sites/sk/files/media/ph103-064_2.jpg',
      'https://www.arval.sk/sites/sk/files/media/2017_12_11_15_58_37_arvalactivelink_onepager_sk.pdf_adobe_reader.png',
      'https://www.arval.sk/sites/sk/files/media/shutterstock_3911338.jpg',
      'https://www.arval.sk/sites/sk/files/media/paa271000041m.jpg',
      'https://www.arval.sk/sites/sk/files/media/paa271000041m.jpg',
      'https://www.arval.sk/sites/sk/files/media/mtr4_0.png',
      'https://www.arval.sk/sites/sk/files/media/800_ilustracna-foto2_foto-arval-slovakia.jpg',
      'https://www.arval.sk/sites/sk/files/media/mid_term_rental.png',
      'https://www.arval.sk/sites/sk/files/media/arvalsmartexperience.png',
      'https://www.arval.sk/sites/sk/files/media/cvo_logo_hd1.png',
      'https://www.arval.sk/sites/sk/files/media/bg-col-4.png',
      'https://www.arval.sk/sites/sk/files/media/superbrands.png',
      'https://www.arval.sk/sites/sk/files/media/2017_06_06_16_12_28_arval_nps_215x280_tisk.pdf_adobe_acrobat_reader_dc.png',
      'https://www.arval.sk/sites/sk/files/media/block-home-small-1.png',
      'https://www.arval.sk/sites/sk/files/media/block-home-small-1.png',
      'https://www.arval.sk/sites/sk/files/media/bg-col-1.png',
      'https://www.arval.sk/sites/sk/files/media/block-home-small-2.png',
      'https://www.arval.sk/sites/sk/files/media/block-home-small-2.png',
      'https://www.arval.sk/sites/sk/files/media/42-17802938.jpg',
      'https://www.arval.sk/sites/sk/files/media/42-17802938.jpg',
      'https://www.arval.sk/sites/sk/files/media/arval_banner_myarvalapp_1.jpg',
      'https://www.arval.sk/sites/sk/files/media/arval_banner_myarvalapp_1.jpg',
      'https://www.arval.sk/sites/sk/files/media/gettyimages-541113838-1.jpg',
      'https://www.arval.sk/sites/sk/files/media/42-44144453_0.jpg',
      'https://www.arval.sk/sites/sk/files/media/42-44144453_0.jpg',
      'https://www.arval.sk/sites/sk/files/media/42-44144453_0.jpg',
      'https://www.arval.sk/sites/sk/files/media/36860285.jpg',
      'https://www.arval.sk/sites/sk/files/media/36860285.jpg',
      'https://www.arval.sk/sites/sk/files/media/lv0150026sq.jpg',
      'https://www.arval.sk/sites/sk/files/media/lv0150026sq.jpg',
      'https://www.arval.sk/sites/sk/files/media/pe0068179_0.jpg',
      'https://www.arval.sk/sites/sk/files/media/paa298000049_0.jpg',
      'https://www.arval.sk/sites/sk/files/media/paa298000049.jpg',
      'https://www.arval.sk/sites/sk/files/media/paa298000049.jpg',
      'https://www.arval.sk/sites/sk/files/media/paa298000049.jpg',
      'https://www.arval.sk/sites/sk/files/media/skola-smyku.jpg',
      'https://www.arval.sk/sites/sk/files/media/paa570000078-900x500.jpg',
      'https://www.arval.sk/sites/sk/files/media/paa570000078-900x500.jpg',
      'https://www.arval.sk/sites/sk/files/media/paa570000078-900x500.jpg',
      'https://www.arval.sk/sites/sk/files/media/presentation1_3.jpg',
      'https://www.arval.sk/sites/sk/files/media/paa287000011.jpg',
      'https://www.arval.sk/sites/sk/files/media/faa013000238_0.jpg',
      'https://www.arval.sk/sites/sk/files/media/faa013000238_0.jpg',
      'https://www.arval.sk/sites/sk/files/media/faa013000238_0.jpg',
      'https://www.arval.sk/sites/sk/files/media/paa202000038.jpg',
      'https://www.arval.sk/sites/sk/files/media/paa202000038.jpg',
      'https://www.arval.sk/sites/sk/files/media/paa041000085.jpg',
      'https://www.arval.sk/sites/sk/files/media/bg-col-2.png',
];


//foreach ($links as &$url) {
//   echo ($url);
//
//    $contents = file_get_contents($url);
//    $name = substr($url, strrpos($url, '/') + 1);
//    Storage::put($name, $contents);
//
//
//   echo '<br>';
//}

?>
