<div id="mediaHighlights" class="tab-pane fade">
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
			
				<div class="card">
					@if( is_null($newsFeed) )
						<h4>Unable to load the news feed due to poor internet connection, please check your connection and reload the page</h4>
					@else
						<ul class="list-group list-group-flush table-striped">
							@foreach($newsFeed as $news)
								<li class="list-group-item"> 
									<a href="{{ $news['link'] }}" target="blank"> {{ $news['title'] }} </a>
								</li>
							@endforeach
					   </ul>
					@endif
				</div>
			
		</div>
	</div>
</div>