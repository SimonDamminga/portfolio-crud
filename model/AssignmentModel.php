<?php 
function getAllAssignments() 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM assignment";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}
function getAssignment($id) 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM assignment WHERE id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id));

	$db = null;

	return $query->fetch();
}
function createAssignment() 
{
	$title = isset($_POST['title']) ? $_POST['title'] : null;
	$gitLink = isset($_POST['gitlink']) ? $_POST['gitlink'] : null;
	$imgName = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : null;
	$imgData = isset($_FILES['image']['tmp_name']) ? $_FILES['image']['tmp_name'] : null;
	$imgType = isset($_FILES['image']['type']) ? $_FILES['image']['type'] : null;
	if (strlen($title) == 0 || strlen($gitLink) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection(); 
	

	$sql = "INSERT INTO assignment(assignment_title, assignment_gitlink, image_name, image_data) VALUES (:title, :gitlink, :name, :data)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':title' => $title,
		':gitlink' => $gitLink,
		':name' => $imgName,
		':data' => $imgData));
	move_uploaded_file($_FILES['image']['tmp_name'], ROOT . "public/img/assignment-image/" . basename($_FILES['image']['name']));
	$db = null;
	
	return true;
}
function editAssignment() 
{
	$title = isset($_POST['title']) ? $_POST['title'] : null;
	$gitlink = isset($_POST['gitlink']) ? $_POST['gitlink'] : null;
	$imgName = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : null;
	$imgData = isset($_FILES['image']['tmp_name']) ? $_FILES['image']['tmp_name'] : null;
	$imgType = isset($_FILES['image']['type']) ? $_FILES['image']['type'] : null;
	$id = isset($_POST['id']) ? $_POST['id'] : null;
	if (strlen($title) == 0 || strlen($gitlink) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "UPDATE assignment SET assignment_title = :title, assignment_gitlink = :gitlink, image_name = :imgName, image_data = :data WHERE id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		':title' => $title,
		':gitlink' => $gitlink,
		':imgName' => $imgName,
		':data' => $imgData,
		':id' => $id));
	move_uploaded_file($_FILES['image']['tmp_name'], ROOT . "public/img/assignment-image/" . basename($_FILES['image']['name']));
	$db = null;
	
	return true;
}
function deleteAssignment($id = null) 
{
	if (!$id) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "DELETE FROM assignment WHERE id=:id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id));

	$db = null;
	
	return true;
}