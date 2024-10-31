<?php
    include "incluides/header.php";
    require "../inmobiliaria/incluides/config/connect2db.php";
    $conn = connect2db();

    $id = $_POST["id"];
    $title = $_POST["title"];
    $price = $_POST["price"];
    $image = $_POST["image"];
    $description = $_POST["description"];
    $room = $_POST["room"];
    $wc = $_POST["wc"];
    $garages = $_POST["garages"];
    $timestamp = $_POST["timestamp"];
    $id_seller = $_POST["id_seller"];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if($title == '' || $price == '' || $description == ''
        || $room == '' || $wc == '' || $garages == '' || $id_seller == '') {
            echo 'Rellenar todo el formulario';
        } else {
            $query = "insert into propierties (title, price, image, description, room, wc, garages, timestamp, id_seller) 
            values ('$title','$price','$image','$description','$room','$wc','$garages','$timestamp','$id_seller')";
        
            $response  = mysqli_query($conn, $query);
        
            if  ($response) {
                echo " Seller created!";
            } else {
                echo " Error creating seller!";
            }
        }

    }
?>

<section>
    <h2>Propierties form</h2>
    <div>
        <form action="crearPropierties.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Fill All Form Fields</legend>
                    <div>
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" placeholder="Propiertie title">
                    </div>
                    <div>
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price">
                    </div>
                    <div>
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image" accept="image/*" required>
                    </div>
                    <div>
                        <label for="description">Description</label>
                        <textarea name="description" id="description" ></textarea>
                    </div>
                    <div>
                        <label for="room">Rooms</label>
                        <input type="number" name="room" id="room">
                    </div>
                    <div>
                        <label for="wc">WC</label>
                        <input type="number" name="wc" id="wc">
                    </div>
                    <div>
                        <label for="garages">Garages</label>
                        <input type="number" name="garages" id="garages">
                    </div>
                    <div>
                        <label for="timestamp">TimeStamp</label>
                        <input type="date" name="timestamp" id="timestamp">
                    </div>
                    <div>
                        <label for="id_seller">Seller</label>
                        <input type="number" name="id_seller" id="id_seller" placeholder="Seller ID">
                    </div>
                    <div>
                        <button type="submit">Create a new propierty</button>
                    </div>
            </fieldset>
        </form>
    </div>
</section>

<?php
    include "includes/footer.php"
?>