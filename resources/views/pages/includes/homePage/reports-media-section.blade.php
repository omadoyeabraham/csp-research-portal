		<!-- African and Global markets section -->
	<section id="homepage-reports-media-section" class="box">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<h3 class="section-heading text-center text-uppercase">Research Reports and Media</h3>
				</div>
			</div>

			<div class="row">
					<div class=" col-xs-12">

						<ul class="nav nav-tabs ">
							<li class="active"><a href="#research-reports" data-toggle="tab">Reports</a></li>
							<li ><a href="#media-highlights" data-toggle="tab">Media</a></li>
						</ul>

						<div class="tab-content">

							<!-- research-reports -->
							<div id="research-reports" class="tab-pane fade in active">
									<form action="reports" method="POST" id="reportsFilterForm">
										{!! csrf_field() !!}
									</form>
									<table class="w100p">
										<tr class="">
											<td class=" report-section-report-name text-left"><a href="#">Company Updates</a></td>
											<td class="">
												<button type="submit" form="reportsFilterForm" name="filterParameter" value="company update" class="btn btn-report-section pull-right">		Read	
												</button>
											</td>
										</tr>
										<tr class="">
											<td class=" report-section-report-name text-left"><a href="#">Full & Half Year Reports</a></td>
											<td class="">
													<button type="submit" form="reportsFilterForm" name="filterParameter" value="full half year " class="btn btn-report-section pull-right">		Read	
												</button>
											</td>
										</tr>
										<tr class="">
											<td class=" report-section-report-name text-left"><a href="#">Sector Reports</a></td>
											<td class="">
													<button type="submit" form="reportsFilterForm" name="filterParameter" value="sector report" class="btn btn-report-section pull-right">		Read	
												</button>
											</td>
										</tr>
										<tr class="">
											<td class=" report-section-report-name text-left"><a href="#">Economic Update</a></td>
											<td class="">
													<button type="submit" form="reportsFilterForm" name="filterParameter" value="economic update" class="btn btn-report-section pull-right">		Read	
												</button>
											</td>
										</tr>
									
									</table>
							</div>

							<!-- media-highlights -->
							<div id="media-highlights" class="tab-pane fade" >
								 @if( is_null($news) )
									<h3>Unable to load the news feed due to poor internet connection. Please reload the page.</h3>
								@else
									<table class="table table-striped-light table-condensed" width="100%">
										<tbody class="text-left">
											<tr>
												<td><a href="{{ $news[0]['link'] }}" target="blank">{{ $news[0]['title'] }}</a></td>
											</tr>
											<tr>
												<td><a href="{{ $news[1]['link'] }}" target="blank">{{ $news[1]['title'] }}</a></td>
											</tr>
											<tr>
												<td><a href="{{ $news[2]['link'] }}" target="blank">{{ $news[2]['title'] }}</a></td>
											</tr>
											<tr>
												<td><a href="{{ $news[3]['link'] }}" target="blank">{{ $news[3]['title'] }}</a></td>
											</tr>
											<tr>
												<td><a href="{{ $news[4]['link'] }}" target="blank">{{ $news[4]['title'] }}</a></td>
											</tr>
										</tbody>
									</table>
								@endif
								
							</div>

						</div>

					</div>
				</div>

			</div>
			
		</section>
		<!-- End of African and global markets section -->