<nav>
<?php for ($i = 0, $count = count($navLinks); $i < $count; $i++): ?>
	<?php if ($i == 1 || $i == 5): ?>
		<?php
			$serviceLinks = ['services', 'policies', 'pricing'];
			$imageLinks = ['our-friends', 'remembrance'];
			$id = $i == 1 ? "ServicesAndPricing" : "Images";
			$label = $i == 1 ? "SERVICES &amp;<br>PRICING" : "PHOTOS";
			if ((in_array($uriString, $serviceLinks) && $i == 1) ||
				(in_array($uriString, $imageLinks) && $i == 5)) {
				$activeDropdown = 'class="active"';
			} else {
				$activeDropdown = '';
			}
			echo "<div id=\"$id\" $activeDropdown>$label";
		?>
		<div>
	<?php endif; ?>
	<a id="<?=str_replace(' ', '', ucfirst($navLinks[$i]['label']))?>" 
		href="<?=$navLinks[$i]['link']?>"
		<?=$navLinks[$i]['isActive'] ? 'class="active"' : ''?>>
		<?=strtoupper($navLinks[$i]['label'])?>
	</a>
	<?php if ($i == 3 || $i == 6): ?>
		</div>
	</div>
	<?php endif; ?>
<?php endfor; ?>
</nav>