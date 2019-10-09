<div class="container">
	<% loop $VideoObjects.Limit(1) %>
		<h2>$VideoTitle</h2>
		<video width="400" height="225" controls>
			<source src="$VideoSource.URL" type="video/mp4">
		</video>
		<div class="video-description">
			<p>$VideoDescription</p>
			<p>
				<% loop $Categories %>
					$Title
				<% end_loop %>
			</p>
		</div>
	<% end_loop %>
</div>

<div class="container">
	<ul class="list-unstyled">
		<% loop $Comments %>
		    <li class="media my-5">
		    	<div class="media-body">
		    		<h5 class="mt-0 mb-1">$Name</h5>
		    		$Comment
		    	</div>
		    </li>
		<% end_loop %>
	</ul>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			$CommentForm
		</div>
	</div>
</div>