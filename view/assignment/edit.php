<header>
	<h1>CREATE</h1>
</header>
<main>
	<a href="about.html"><button class="button">OVER MIJ</button></a>
	<a href="assignments.html"><button>OPDRACHTEN</button></a>
	<div class="container">
		<form action="<?= URL ?>assignment/editSave" method="post" enctype="multipart/form-data">
			<input id="select-file" type="file" name="image"><br>
			<input id="input-text" type="text" name="title" value="<?= $assignment['assignment_title'] ?>"><br>
			<input id="input-text" type="text" name="gitlink" value="<?= $assignment['assignment_gitlink'] ?>"><br>
			<!-- <textarea name="assign-description" cols="30" rows="3" placeholder="Omschrijving opdracht"></textarea><br> -->
			<input type="hidden" name="id" value="<?= $assignment['id'] ?>">
			<input class="button-create" type="submit" value="Updaten">
		</form>
	</div>
</main> 