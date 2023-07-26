<?php
#echo("Luishdo");

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  echo("nada que mostrar, pero si llega");
  
 # exit;
}
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get the JSON data from the request body
  $json_data = file_get_contents('php://input');
  #echo($json_data);
  // Decode the JSON data
  $data = json_decode($json_data, true);
  // Connect to the database
  $db = new mysqli('localhost', 'root', 'c9XH#34vGs%h#fJs', 'handtriage');
  // Insert the data into the database
  $sql = "INSERT INTO Triage (idTriage,idPaciente, RitmoCardiaco, ConcOxigeno, Temperatura, fechaLectura) VALUES ('{$data['idTriage']}','{$data['idPaciente']}', '{$data['RitmoCardiaco']}', '{$data['ConcOxigeno']}', '{$data['Temperatura']}', '{$data['fechaLectura']}')";
  echo $sql;
  $db->query($sql);
  // Close the database connection
  $db->close();

  // Return a success message
  echo json_encode([
    'success' => true,
    'message' => 'Datos procesados satisfactoriamente'
  ]);
}


?>
