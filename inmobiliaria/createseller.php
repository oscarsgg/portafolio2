<?php 
    include "incluides/header.php";
    require "../inmobiliaria/incluides/config/connect2db.php";
    $conn = connect2db();

    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $query = "insert into seller (name, email, phone) values  ('$name', '$email', '$phone')";

    $response  = mysqli_query($conn, $query);

    if  ($response) {
        echo " Seller created!";
    } else {
        echo " Error creating seller!";
    }
?>

<section>
    <h2>Sellers form</h2>
    <div>
        <form action="createseller.php" method="post">
            <fieldset>
                <legend>Fill all the field forms</legend>
                <div>
                    <label for="id">Seller ID:</label>
                    <input type="number" id="id" name="id">
                </div>
                <div>
                    <label for="name">Seller Name:</label>
                    <input type="text" id="name" name="name">
                </div>
                <div>
                    <label for="email">Seller Email:</label>
                    <input type="email" id="email" name="email">
                </div>
                <div>
                    <label for="phone">Seller Phone:</label>
                    <input type="number" id="phone" name="phone">
                </div>
                <div>
                    <button type="submit">Create a new seller</button>
                </div>
            </fieldset>
        </form>
    </div>
</section>


<?php include "incluides/footer.php" ?>