<video width="320" height="240" controls>
	<source src="$VideoSource.URL" type="video/mp4">
</video>

<% loop $Comments %>
    <h4>$Name said:</h4>
    <p>$Comment</p>
<% end_loop %>

$CommentForm