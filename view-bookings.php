<?php include_once "header.inc"; ?>

<div class="container supreme-contain">

    <h2>Enter Your Email to View Bookings:</h2>
    <br>
    <?php include_once "navigation.inc"; ?>
    <br>

    <div class="form-outline">
        <input type="email" id="emailAddressSearch" class="form-control" />
        <label class="form-label" for="emailAddressSearch">Enter Email Address</label>
    </div>
    <br>
    <div class="col-md-4">
        <button class="btn btn-danger" onclick="getBook()">Get Bookings</button>
    </div>

    <br>
    <br>

    <div class="row" id="bookingPlace">
    </div>

    <br>
    <br>
    <div class="row">
        <div class="col-md-8">
            <a href="/hotel-bookings/" class="btn btn-dark">Previous Page</a>
        </div>
    </div>

</div>

<?php include_once "footer.inc"; ?>