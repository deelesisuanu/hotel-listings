var hotelAppender = document.getElementById("hoteList");
var roomsAppender = document.getElementById("roomsPlace");
var booksAppender = document.getElementById("bookingPlace");
var routes = {
    "hotels": "api/services/hotels",
    "rooms": "api/services/roomsLoader",
    "hotelSave": "api/services/bookHotel",
    "bookings": "api/services/bookings"
};

var submissionObject = {};

async function loadHotels() {
    let hotelList = await getData(routes.hotels);
    let hotelJson = JSON.parse(hotelList);
    var htmlHotel = "";
    hotelJson.forEach(hotel => {
        htmlHotel += `<div class="col-md-4">
                            <div class="card">
                                <h5 class="card-header">${hotel.name}</h5>
                                <div class="card-body">
                                    <h5 class="card-title">${hotel.location}</h5>
                                    <p class="card-text">
                                        ${hotel.description}
                                    </p>
                                    <p class="card-text">
                                        Rooms Available: ${hotel.rooms_available}
                                    </p>
                                    <a href="hotels?id=${hotel.hotel_id}&name=${hotel.name}" class="btn btn-primary">View Available Rooms</a>
                                </div>
                            </div>
                        </div>`;
    });
    hotelAppender.innerHTML = htmlHotel;
}

async function loadAvailableRooms(hotel_id) {
    let roomList = await getData(routes.rooms);
    let roomJson = JSON.parse(roomList);
    submissionObject.rooms = roomJson;
    var htmlRooms = "";
    roomJson.forEach(room => {
        if (room.hotel_id == hotel_id && room.payment == 0) {
            htmlRooms += `<div class="col-md-4">
                            <div class="card">
                                <h5 class="card-header">${room.type}</h5>
                                <div class="card-body">
                                    <h5 class="card-title">	&#8358;${numberWithCommas(room.amount)}</h5>
                                    <p class="card-text"></p>
                                    <button type="button" data-mdb-toggle="modal" onclick="sendId(${room.id})" data-mdb-target="#exampleModal" class="btn btn-primary">Book Now</a>
                                </div>
                            </div>
                        </div>`;
        }
    });
    roomsAppender.innerHTML = htmlRooms;
}

async function loadBookings(email) {
    let bookList = await getData(routes.bookings);
    let bookJson = JSON.parse(bookList);
    submissionObject.rooms = bookJson;
    console.log(bookJson);
    var htmlBooks = "";
    bookJson.forEach(book => {
        if (book.payeeEmail == email) {
            htmlBooks += `<div class="col-md-4">
                            <div class="card">
                                <h5 class="card-header">${book.payeeName}</h5>
                                <div class="card-body">
                                    <h5 class="card-title">${book.payeeEmail}</h5>
                                    <p class="card-text">Date Booked: ${book.datePaid}</p>
                                </div>
                            </div>
                        </div>`;
        }
    });
    booksAppender.innerHTML = htmlBooks;
}

function getBook() {
    let email = document.getElementById("emailAddressSearch").value;
    if(email == ""){
        alert("Email Address is Required for Search");
        return;
    }
    loadBookings(email);
}

function sendId(id){
    submissionObject.currentRoomId = id;
}

function saveBook() {

    let fullName = document.getElementById("fullName").value;
    let emailAddress = document.getElementById("emailAddress").value;

    if (fullName == "") {
        alert("Full Name is Required"); return;
    }

    if (emailAddress == "") {
        alert("Email Address is Required"); return;
    }

    let hotelId = submissionObject.hotelId;
    let hotelName = submissionObject.hotelName;
    let roomId = submissionObject.currentRoomId;

    let data = {
        fullName: fullName,
        emailAddress: emailAddress,
        hotelId: hotelId,
        hotelName: hotelName,
        roomId: roomId
    };

    saveData(routes.hotelSave, data);

}

if (hotelAppender != null) loadHotels();

if (roomsAppender != null) {

    var hotelId = getParameterByName("id");
    var hotelName = getParameterByName("name");

    submissionObject.hotelId = hotelId;
    submissionObject.hotelName = hotelName;

    document.getElementById("hotelCurrentName").innerHTML = `Rooms Available For: ${hotelName}`;

    loadAvailableRooms(hotelId);

}

async function getData(url) {
    try {
        let res = await fetch(url);
        return await res.text();
    } catch (error) {
        console.log(error);
    }
}

function saveData(url, _data) {
    fetch(url, {
        method: "POST",
        body: JSON.stringify(_data),
        headers: { "Content-type": "application/json; charset=UTF-8" }
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        if(data == "success"){
            alert(`${_data.hotelName} Booked Successfully`);
            setTimeout(() => {
                location.reload();
            }, 800);
        }
    })
    .catch (err => console.log(err));
}

function getParameterByName(name, url = window.location.href) {
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}