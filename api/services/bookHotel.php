<?php

require "define.php";

$json = file_get_contents('php://input');

$data = json_decode($json, true);

$fullName = $data["fullName"];
$emailAddress = $data["emailAddress"];
$hotelId = $data["hotelId"];
$hotelName = $data["hotelName"];
$roomId = $data["roomId"];
$amount = 0;

$roomsJson = file_get_contents("rooms.json");
$roomsData = json_decode($roomsJson, true);

$hotelsJson = file_get_contents("hotels.json");
$hotelsData = json_decode($hotelsJson, true);

foreach ($roomsData as $key => $room):
    if($room["id"] == $roomId && $room["payment"] == 0):
        $roomsData[$key]['payment'] = 1;
    endif;
endforeach;

foreach ($hotelsData as $key => $hotel):
    if($hotel["hotel_id"] == $hotelId):
        $roomsAva = (int) $hotel["rooms_available"];
        $roomsAva = $roomsAva - 1;
        $hotelsData[$key]['rooms_available'] = $roomsAva;
    endif;
endforeach;

$newJsonString = json_encode($roomsData);
file_put_contents('rooms.json', $newJsonString);

$newJsonStringHotel = json_encode($hotelsData);
file_put_contents('hotels.json', $newJsonStringHotel);

$bookingString = file_get_contents("bookings.json", true);
$bookingData = json_decode($bookingString, true);
unset($bookingString);

$bookingData[] = array(
    "room_id" => $roomId,
    "hotel_id" => $hotelId,
    "amount" => "",
    "datePaid" => date("Y-m-d"),
    "payeeName" => $fullName,
    "payeeEmail" => $emailAddress
);

$resultBooking = json_encode($bookingData);
file_put_contents('bookings.json', $resultBooking);
unset($resultBooking);

echo "success";