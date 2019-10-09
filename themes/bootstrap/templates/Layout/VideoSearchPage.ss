<div class="search-page container">
	
<% include Pagination %>

	<div class="row">

		<div class="col-lg-2">
			<div class="search-form">
				$VideoSearchForm
			</div>
			<% if $ActiveFilters %>
				<% loop $ActiveFilters %>
				    Searching for $Label
				<% end_loop %>
			<% end_if %>
		</div>

		<div class="col-lg-8">
			<% include VideoSearchResults %>
		</div>

	</div>

</div>

<% include Pagination %>