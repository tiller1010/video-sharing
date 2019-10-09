<% if $Results.MoreThanOnePage %>
	<div class="pagination">
	    <% if $Results.NotFirstPage %>
	        <a class="prev" href="$Results.PrevLink">Prev</a>
	    <% end_if %>
	    	<ul>
	    		<% loop $Results.PaginationSummary %>
	    		    <% if $Link %>
	    		        <li <% if $CurrentBool %>class="active"<% end_if %>><a href="$Link">$PageNum</a></li>
	    		    <% else %>
		    		    <li>...</li>
	    		    <% end_if %>
	    		<% end_loop %>
	    	</ul>
	    <% if $Results.NotLastPage %>
        	<a class="next" href="$Results.NextLink">Next</a>
	    <% end_if %>
	</div>
<% end_if %>