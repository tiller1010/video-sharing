<% loop $VideoObjects %>
<div class="video-block">
	<div class='video-details-container'>
		$VideoTitle
		<br>
		$VideoDescription
	</div>
	<div class="video-container">
		<a href="$getVideoLink"<img src="$VideoThumbnail.URL" class="video-thumbnail"></a>
	</div>
</div>
<% end_loop %>