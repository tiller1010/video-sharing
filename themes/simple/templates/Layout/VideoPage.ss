<% loop $VideoObjects %>
<div class="video-block">
	<div class='video-details-container'>
		$VideoTitle
		<br>
		$VideoDescription
	</div>
	<div class="video-container">
		<img src="$VideoThumbnail.URL" class="video-thumbnail">
		<video width="320" height="240" controls>
			<source src="$VideoSource.URL" type="video/mp4">
		</video>
	</div>
</div>
<% end_loop %>