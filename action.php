<?php

//action.php

$connect = new PDO("mysql:host=127.0.0.1;dbname=vdi", "root", "");

$received_data = json_decode(file_get_contents("php://input"));

if($received_data->request_for == 'category')
{
 $query = "SELECT * FROM categories ORDER BY category_id ASC";
}

if($received_data->request_for == 'document')
{
 $query = "
 SELECT * FROM documents 
 WHERE category_id = '".$received_data->category_id."' 
 ORDER BY document_id ASC";
}

if($received_data->request_for == 'delete')
{
 $query = "
    DELETE FROM documents WHERE document_id ='".$received_data->document_id."' ";
}

if($received_data->request_for == 'Add')
{
 $query = " insert into documents (category_id,name) VALUES ('".$received_data->category_id."', '".$received_data->new_document_name."' ) ";
}
if($received_data->request_for == 'Edit')
{
 $query = " UPDATE documents SET name= '".$received_data->new_name."' WHERE document_id = '".$received_data->document_id."' ";
}
$statement = $connect->prepare($query);

$statement->execute();

while($row = $statement->fetch(PDO::FETCH_ASSOC))
{
 $data[] = $row;
}

echo json_encode($data);

?>