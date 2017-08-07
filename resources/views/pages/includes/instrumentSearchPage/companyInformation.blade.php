<div id="companyInformation" class="tab-pane fade">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1" >
				<table class="table table-striped side-table " id="instrument-company-info-table">
					<tbody>
						
								<tr>
									<th class="text-left w20p">Company Name</th>
									<td class="text-left w80p">{{$companyProfile['company_name'] or "N/A"}}</td>		
								</tr>
								<tr >
									<th class="text-left">Ticker</th>
									<td class="text-left">{{ $companyProfile['ticker']  or 'N/A'}}</td>
								</tr>
								<tr>
									<th class="text-left">Market Classification</th>
									<td class="text-left">{{ $companyProfile['market_classification']  or 'N/A'}}</td>
								</tr>
								<tr>	
									<th class="text-left">Sector</th>
									<td class="text-left">{{ $companyProfile['sector']  or 'N/A'}}</td>
								</tr>
								<tr>
									<th class="text-left">Sub Sector</th>
									<td class="text-left">{{ $companyProfile['sub_sector']  or 'N/A'}}</td>
								</tr>
								<tr>	
									<th class="text-left">Address</th>
									<td class="text-left">{{ $companyProfile['address']  or 'N/A'}}</td>
								</tr>
								<tr>	
									<th class="text-left">Telephone/Fax</th>
									<td class="text-left">{{ $companyProfile['telephone_fax']  or 'N/A'}}</td>
								</tr>
								<tr>	
									<th class="text-left">Website</th>
									<td class="text-left">
										<a href="http://{{ $companyProfile['website'] or '#' }}" target="_blank" style="color:rgb(26,33,85); ">
											{{ $companyProfile['website'] or 'N/A'}}
										</a>
									</td>
								</tr>
								<tr>
									<th class="text-left">Registrar</th>
									<td class="text-left">{{ $companyProfile['registrar'] or 'N/A'}}</td>
								</tr>
								<tr>
									<th class="text-left">Company Secretary</th>
									<td class="text-left">{{ $companyProfile['company_secretary'] or 'N/A'}}</td>
								</tr>
								<tr>
									<th class="text-left">Date Listed</th>
									<td class="text-left">
										@if(isset($companyProfile['date_listed']) )
											{{ Carbon\Carbon::parse($companyProfile['date_listed'])->format('F jS, Y ')  }}
										@else
											N/A
										@endif
										
									</td>
								</tr>
								<tr>
									<th class="text-left">Date of incorporation</th>
									<td class="text-left">
										@if(isset($companyProfile['date_of_incorporation']) )
											{{ Carbon\Carbon::parse($companyProfile['date_of_incorporation'])->format('F jS, Y ')  }}
										@else
											N/A
										@endif
										
										
									</td>
								</tr>
								<tr>
									<th class="text-left">Board of Directors</th>
									<td class="text-left">{{ $companyProfile['board_of_directors'] or 'N/A'}}</td>
								</tr>
						
					</tbody>
		   </table>
			</div>
		</div>
</div>