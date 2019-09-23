<div class="video-search-form">
	$VideoSearchForm
	<div class="spacer"></div>
	<% if $ActiveFilters %>
		<% loop $ActiveFilters %>
		    Searching for $Label
		<% end_loop %>
	<% end_if %>
</div>

<% loop $Results %>
	<div class="video-result">
	    <h2>$VideoTitle</h2>
	    <img src="$VideoThumbnail.URL" width="320px" height="240px">
	</div>
<% end_loop %>