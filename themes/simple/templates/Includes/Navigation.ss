<nav class="primary">
	<span class="nav-open-button">²</span>
	<ul class="nav">
		<% loop $Menu(1) %>
			<li class="$LinkingMode toplevel">
				<a href="$Link" title="$Title.XML">$MenuTitle.XML</a>
				<% if $Children %>
				   <ul class="dropdown">
				   	<% loop $Children %>
					   	<li><a href="$Link">$Title</a></li>
				   	<% end_loop %>
				   </ul>
				<% end_if %>
			</li>
		<% end_loop %>
	</ul>
</nav>
