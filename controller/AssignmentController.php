<?php

require(ROOT . "model/AssignmentModel.php");

function index()
{
	render("assignment/index", array(
		"assignments" => getAllAssignments()
	));
}
function create()
{
	render("assignment/create");
}
function createSave()
{
	if (!createAssignment()) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "assignment/index");
}
function edit($id)
{
	render("assignment/edit", array(
		"assignment" => getAssignment($id)
	));
}
function editSave()
{
	if (!editAssignment()) 
	{
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "assignment/index");
} 
function delete($id)
{
	if (!deleteAssignment($id)) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "assignment/index");
}