<?php
/*
The original HTML:
<a href="./data/Katmai_Crater_1980.jpg" data-lightbox="gallery" 
	data-title="Katmai Crater - Mount Katmai, Alaska ... Posted 2014.05.05 by donald, in landscape">
	<img src="./data/thumb/Katmai_Crater_1980.jpg"/></a>
Converted to be a view fragment template
*/
?>

<a href="./data/{filename}" data-lightbox="gallery" 
	data-title="{title} ... Posted {uploaded} by {uploader}, in {category}">
	<img src="./data/thumb/{filename}"/>
</a>