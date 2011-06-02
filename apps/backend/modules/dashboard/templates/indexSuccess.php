<?php use_stylesheet('dashboard.css') ?>

<div id="dashboard">
		
		<?php if(!$sf_user->hasGroup('client')): ?>
		
		<div id="clientList">
			
			<h1><div id="addClientButton"><a href="<?php echo url_for('client_new') ?>"><img width="91" height="25" alt="Add a new Client" src="/images/backend/add_client_new.jpg"></a></div>Your Clients</h1>

            
			<table width="100%" cellspacing="0" cellpadding="0" class="tableHeader" class="activityAction">
			<tbody><tr class="noHighlight">
				<th width="100%" class="headerLeft"><span>Clients you are administring</span></th>
				<th nowrap="" class="headerRight">&nbsp;&nbsp;&nbsp;&nbsp;</th>
			</tr>
			<?php if (count($clients) > 0 ): ?>
			<?php foreach ($clients as $client) :?>
			<tr onmouseout="hideDelete('nocs_0')" onmouseover="showDelete('nocs_0')" id="nocs_0" class="dashRow">
				<td width="100%">
					<a href="<?php echo url_for('client_edit', $client->sfGuardUser )?>"><?php echo $client['name'].' '.$client['surname']?></a>
				</td>
				<td nowrap="" class="rowRight"><span style="display: none;" id="nocs_0_delete"><a onclick="hideDelete('nocs_0')" title="Delete this client" href=""><img width="10" height="11" alt="Delete" src="https://img.createsend1.com/img/icons/trash.gif"></a></span></td>
			</tr>
			<?php endforeach; ?>
			<?php else :?>
			<tr onmouseout="hideDelete('nocs_0')" onmouseover="showDelete('nocs_0')" id="nocs_0" class="dashRow">
				<td width="100%" class="rowLeft"><i></i><strong>no clients captured</strong></i></td>
				<td></td>
			</tr>
			<?php endif;?>
			</tbody></table> 
            
			<div class="topPad"></div>
			
			<?php if ($sf_user->hasGroup('administrator')) :?>
			<table width="100%" cellspacing="0" cellpadding="0" class="tableHeader" class="activityAction">
			<tbody><tr class="noHighlight">
				<th width="100%" class="headerLeft"><span>Advisors you are administring</span></th>
				<th nowrap="" class="headerRight">&nbsp;&nbsp;&nbsp;&nbsp;</th>
			</tr>
			<?php if (!empty($advisors)): ?>
			<?php foreach ($advisors as $advisor) :?>
			<tr onmouseout="hideDelete('nocs_0')" onmouseover="showDelete('nocs_0')" id="nocs_0" class="dashRow">
				<td width="100%">
					<a href="<?php echo url_for('advisor_edit', $advisor->sfGuardUser )?>"><?php echo $advisor['name'].' '.$advisor['surname']?></a>
				</td>
				<td nowrap="" class="rowRight"><span style="display: none;" id="nocs_0_delete"><a onclick="hideDelete('nocs_0')" title="Delete this advisor" href=""><img width="10" height="11" alt="Delete" src="https://img.createsend1.com/img/icons/trash.gif"></a></span></td>
			</tr>
			<?php endforeach; ?>
			<?php else :?>
			<tr onmouseout="hideDelete('nocs_0')" onmouseover="showDelete('nocs_0')" id="nocs_0" class="dashRow">
				<td width="100%" class="rowLeft"><i></i><strong>no advisors captured</strong></i></td>
				<td></td>
			</tr>
			<?php endif;?>
			</tbody></table> 
            
			<div class="topPad"></div>
			<?php endif; ?>
            
		</div>
		<?php endif; ?>
		
		<?php if($sf_user->hasGroup('client')): ?>
		
		<div id="quoteList">
			
			<h1><div id="addQuoteButton"><a href="<?php echo url_for('quote_new') ?>"><img width="91" height="25" alt="Add a new Client" src="/images/backend/add_quote_new.gif"></a></div>Your Quotes</h1>

            
			<table width="100%" cellspacing="0" cellpadding="0" class="tableHeader" class="activityAction">
			<tbody><tr class="noHighlight">
				<th width="100%" class="headerLeft"><span>Your Quotes</span></th>
				<th nowrap="" class="headerRight">&nbsp;&nbsp;&nbsp;&nbsp;</th>
			</tr>
			<?php if (count($quotes) > 0 ): ?>
			<?php foreach ($quotes as $quote) :?>
			<tr onmouseout="hideDelete('nocs_0')" onmouseover="showDelete('nocs_0')" id="nocs_0" class="dashRow">
				<td width="100%">
					<a href="<?php echo url_for('quote_edit', $quote )?>"><?php echo $quote['created_by'].' '.$quote['date']?></a>
				</td>
				<td nowrap="" class="rowRight"><span style="display: none;" id="nocs_0_delete"><a onclick="hideDelete('nocs_0')" title="Delete this client" href="client/deleteClient.aspx?ID=8507F3B357E30E04"><img width="10" height="11" alt="Delete" src="https://img.createsend1.com/img/icons/trash.gif"></a></span></td>
			</tr>
			<?php endforeach; ?>
			<?php else :?>
			<tr onmouseout="hideDelete('nocs_0')" onmouseover="showDelete('nocs_0')" id="nocs_0" class="dashRow">
				<td width="100%" class="rowLeft"><i></i><strong>no quotes captured</strong></i></td>
				<td></td>
			</tr>
			<?php endif;?>
			</tbody></table> 
            
			<div class="topPad"></div>

            
		</div>
		<?php endif; ?>
		
		<div id="clientActivity">
			
			<div id="activityBG">
				
				<div id="activityContent">
					
					
					<div id="clientBlankSlate">
						
						<h1>Welcome to the Momentum Annuity Quoting System</h1>
						
						<p>You're currently on the Main Dashboard. To get you started, you could add some quotes.</p>
						
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
					<tbody>
					<?php if(!empty($activitys)): ?>
						<?php foreach($activitys as $activity) :?>
							<tr>
								<td width="100%" class="activityAction"><?php echo $activity['ActivityType']['title']?> <b>by</b> <?php echo $activity['sfGuardUser']['username']?> <b>at</b> <?php echo $activity['created_at'] ?></td>
							</tr>
						<?php endforeach; ?>
					<?php else: ?>
						<tr>
							<td width="100%" class="activityAction">You haven't done anything in your account lately, but as soon as you do we'll keep track of it here.</td>
						</tr>
					<?php endif;?>
					
					
					<tr>
						<td><br><br><br><br><br><br><br><br><br></td>
					</tr>	
					
					</tbody></table>
					
					<div class="clearActivity"></div>
						
				</div>
			
			</div>
					
		</div>
</div>