<% loop $VideoObjects %>
	<h2>$VideoTitle</h2>
	<video width="320" height="240" controls>
		<source src="$VideoSource.URL" type="video/mp4">
	</video>
	<p>$VideoDescription</p>
<% end_loop %>

<br>

<% loop $Comments %>
    <h4>$Name said:</h4>
    <p>$Comment</p>
<% end_loop %>

$CommentForm