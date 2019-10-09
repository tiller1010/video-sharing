<% if $Results %>
<% loop $Results %>
	<div class="container result-container my-5">
		<a href="$VideoPage.Link">
		    <h2>$VideoTitle</h2>
		    $VideoThumbnail.Fill(400,225)
	    </a>
	</div>
<% end_loop %>
<% else %>
<h2>No videos found</h2>
<% end_if %>