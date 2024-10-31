<?php
include "includes/header.php";
require "../inmobiliaria/includes/config/connect2db.php";
$conn = connect2db();

// Variable para guardar el ID del vendedor si se inserta exitosamente
$newSellerID = null;

// Solo se ejecuta la inserción si el formulario fue enviado con método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura y validación de datos del formulario
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    // Verificación de campos vacíos
    if (empty($name) || empty($email) || empty($phone)) {
        echo "Error: Todos los campos son obligatorios.";
        exit;
    }

    // Validación del formato del email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Error: Formato de correo electrónico inválido.";
        exit;
    }

    // Validación del teléfono (debe ser numérico y tener 10 dígitos)
    if (!is_numeric($phone) || strlen($phone) != 10) {
        echo "Error: El número de teléfono debe tener 10 dígitos.";
        exit;
    }

    // Prepara la consulta usando prepared statements para evitar SQL injection
    $query = $conn->prepare("INSERT INTO seller (name, email, phone) VALUES (?, ?, ?)");
    $query->bind_param("sss", $name, $email, $phone);

    // Ejecuta la consulta y verifica si fue exitosa
    if ($query->execute()) {
        // Recupera el ID autogenerado del nuevo vendedor
        $newSellerID = $query->insert_id;
        echo "Seller created successfully! Your ID is: " . $newSellerID;
    } else {
        echo "Error creating seller: " . $conn->error;
    }

    // Cierra la consulta
    $query->close();
}

// Cierra la conexión a la base de datos
$conn->close();
?>

<!-- Formulario HTML para el registro del vendedor -->
<section>
    <h2>Seller Registration</h2>
    <div>
        <form action="registrarVendedor.php" method="post">
            <fieldset>
                <legend>Register as a Seller</legend>

                <!-- Campo de Nombre -->
                <div>
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Your name" required>
                </div>

                <!-- Campo de Email -->
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Your email" required>
                </div>

                <!-- Campo de Teléfono -->
                <div>
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" placeholder="Your phone number" required maxlength="10">
                </div>

                <!-- Botón para enviar el formulario -->
                <div>
                    <button type="submit">Register as Seller</button>
                </div>
            </fieldset>
        </form>

        <!-- Muestra el ID del nuevo vendedor si se registró exitosamente -->
        <?php if ($newSellerID): ?>
            <p>Registration successful! Your Seller ID is: <strong><?php echo $newSellerID; ?></strong></p>
        <?php endif; ?>
    </div>
</section>

<?php
include "includes/footer.php";
?>
