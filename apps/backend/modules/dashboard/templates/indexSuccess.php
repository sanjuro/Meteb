<?php use_stylesheet('dashboard.css') ?>

<div id="dashboard">
	<div id="clientList">
			
			<h1><div id="addClientButton"><a href="/admin/client/create"><img width="91" height="25" alt="Add a new Client" src="/images/backend/add_client_new.jpg"></a></div>Your Clients</h1>

            
			<table width="100%" cellspacing="0" cellpadding="0" class="tableHeader">
			<tbody><tr class="noHighlight">
				<th width="100%" class="headerLeft"><span>Clients you're sending for</span></th>
				<th nowrap="" class="headerRight">&nbsp;&nbsp;&nbsp;&nbsp;</th>
			</tr>
			
			<tr onmouseout="hideDelete('nocs_0')" onmouseover="showDelete('nocs_0')" id="nocs_0" class="dashRow">
				<td width="100%" class="rowLeft"><strong><a href="changeClient.aspx?ID=8507F3B357E30E04&amp;al=C67FD2F38AC4859C&amp;name=AoSD">AoSD</a></strong><span style="display:none" class="closedSpam"> Account closed (<a title="Learn more about spam complaints" onclick="javascript:return launchHelp(35)" href="/help/popup.aspx?t=35">due to abuse</a>)</span></td>
				<td nowrap="" class="rowRight"><span style="display: none;" id="nocs_0_delete"><a onclick="hideDelete('nocs_0')" title="Delete this client" href="client/deleteClient.aspx?ID=8507F3B357E30E04"><img width="10" height="11" alt="Delete" src="https://img.createsend1.com/img/icons/trash.gif"></a></span></td>
			</tr>
			
			</tbody></table> 
            
			<div class="topPad"></div>

            
		</div>
		<div id="clientActivity">
			
			<div id="activityBG">
				
				<div id="activityContent">
					
					
					<div id="clientBlankSlate">
						
						<h1>Welcome to the Quote Monitor</h1>
						
						<p>You're currently in the Manage Clients section of your account. To get you started, add as many clients as you like.</p>
						
						<div class="instructions">
							
							<table width="100%" cellspacing="0" cellpadding="0">
							<tbody><tr>
								<td nowrap="" class="instructionsCTA"><a href="/createsend/step1.aspx"><img width="226" height="39" alt="Create your first campaign" src="/images/backend/create-first-campaign.gif"></a></td>
								<td width="100%"><p>Once you start creating and sending quotes, this page will list all the activity across your account.</p></td>
							</tr>
							</tbody></table>
								
						</div>
					
					</div>
					
										
					<h1>Latest Activity</h1>
					
					<table width="100%" cellspacing="0" cellpadding="0">
					<tbody><tr class="noHighlight">
						<th class="headerDarkGreyLeft"><span>Recent updates across your account</span></th>
						<th class="headerDarkGreyRight">
                        	<span>
                                <a href="/rss/accountActivity.aspx?ID=2A48713CA1F75E15&amp;d=r">Subscribe</a>
                                <a href="/rss/accountActivity.aspx?ID=2A48713CA1F75E15&amp;d=r"><img width="11" height="11" class="supporting" alt="RSS feed" src="https://img.createsend1.com/img/icons/activity-rss.gif"></a> 
                                <div class="clearit"></div>
                            </span>
                        </th>
					</tr>
					</tbody></table>
					
					<table width="100%" cellspacing="0" cellpadding="0" class="activity">
					
					
					<tbody><tr>
						<td width="100%" class="activityAction">You haven't done anything in your account lately, but as soon as you do we'll keep track of it here.</td>
					</tr>
					<tr>
						<td><br><br><br><br><br><br><br><br><br></td>
					</tr>	
					
					</tbody></table>
					
					<div class="clearActivity"></div>
						
				</div>
			
			</div>
					
		</div>
</div>