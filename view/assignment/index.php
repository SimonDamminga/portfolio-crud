<header>
	<h1>Opdrachten</h1>
</header>
<main>
	<a href="about.html"><button class="button">OVER MIJ</button></a>
	<a href="index.html"><button>HOME</button></a>
	<?php foreach($assignments as $assignment){ ?>
	<div id="assign-container">
		<img src="<?= URL . 'public/img/assignment-image/' . $assignment['image_name'] ?>" id="assign-img" alt="Image not found" onerror="this.src='<?= URL ?>public/img/no-photo.jpg';">
		<h2><?= $assignment['assignment_title'] ?></h2>
		<p id="assign-text"><?= $assignment['assignment_gitlink'] ?></p>
		<p class="icons" id="edit"><a id="edit" href="<?= URL ?>assignment/edit/<?= $assignment['id'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></p>
		<p class="icons" id="delete"><a id="delete" href="<?= URL ?>assignment/delete/<?= $assignment['id'] ?>"><i class="fa fa-ban" aria-hidden="true"></i></a></p>
	</div>
	<?php } ?>
	<button class="button">LOG IN</button>
	<button>AANMELDEN</button>
	<a href="<?= URL ?>assignment/create"><button>CREATE</button></a> 
</main>