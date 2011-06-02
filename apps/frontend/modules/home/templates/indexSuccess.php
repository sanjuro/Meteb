
<?php if (!$sf_user->isAuthenticated()): ?>   
<p>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Duis ligula lorem, consequat eget, tristique nec, auctor quis, purus. Vivamus ut sem. Fusce aliquam nunc vitae purus. Aenean viverra malesuada libero. Fusce ac quam. Donec neque. Nunc venenatis enim nec quam. Cras faucibus, justo vel accumsan aliquam, tellus dui fringilla quam, in condimentum augue lorem non tellus. Pellentesque id arcu non sem placerat iaculis. Curabitur posuere, pede vitae lacinia accumsan, enim nibh elementum orci, ut volutpat eros sapien nec sapien. Suspendisse neque arcu, ultrices commodo, pellentesque sit amet, ultricies ut, ipsum. Mauris et eros eget erat dapibus mollis. Mauris laoreet posuere odio. Nam ipsum ligula, ullamcorper eu, fringilla at, lacinia ut, augue. Nullam nunc.
</p>
<p>
Sed et lectus in massa imperdiet tincidunt. Praesent neque tortor, sollicitudin non, euismod a, adipiscing a, est. Mauris diam metus, varius nec, faucibus at, faucibus sollicitudin, lectus. Nam posuere felis ac urna. Vestibulum tempor vestibulum urna. Nullam metus. Vivamus ac purus. Nullam interdum ullamcorper libero. Morbi vehicula imperdiet justo. Etiam mollis fringilla ante. Donec et dui. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Etiam mi libero, luctus nec, blandit ac, rutrum ac, lectus.
</p>
<p>
Morbi consequat felis vitae enim. Nunc nec lacus. Vestibulum odio. Morbi egestas, urna et mollis bibendum, enim tellus posuere justo, eget elementum purus urna nec lacus. Nullam in nulla. Praesent ac lorem. Donec metus risus, accumsan ut, mollis non, porttitor eget, mi. Aliquam aliquet, tortor a elementum aliquam, erat odio sodales eros, suscipit blandit lectus dolor sit amet elit. In eros wisi, mollis vitae, tincidunt in, suscipit id, nibh. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Phasellus ornare. Suspendisse potenti. Mauris convallis. Vestibulum nec mauris in augue porta mollis. Proin ut nunc. Mauris aliquam dui eget purus.
</p>
<p>
Sed ut metus sed wisi commodo viverra. Suspendisse dignissim elit ac leo. Fusce magna augue, accumsan eu, sollicitudin ut, ultricies eu, elit. Vestibulum faucibus turpis at lacus. Nulla pede nibh, congue ac, luctus at, pharetra ut, nulla. Nulla in ipsum eget tortor lobortis laoreet. Morbi molestie nibh dapibus justo. Nulla sapien lorem, tincidunt sit amet, lobortis laoreet, feugiat a, leo. Etiam id mauris in libero molestie dictum. Cras nisl diam, dapibus ut, sollicitudin sed, auctor nec, orci. Nam eleifend, dui in dapibus congue, mi diam luctus velit, eu imperdiet pede elit nec lorem. Proin laoreet, eros a dictum faucibus, nunc wisi rhoncus nunc, at rhoncus lectus tellus vitae urna. Curabitur a turpis at ligula lobortis cursus.
</p>

<?php endif; ?>



<?php if ($sf_user->hasGroup('administrator')): ?>
<h1>EB Admin Page</h1>

Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Duis ligula lorem, consequat eget, tristique nec, auctor quis, purus. 
Vivamus ut sem. Fusce aliquam nunc vitae purus. Aenean viverra malesuada libero. Fusce ac quam. Donec neque. Nunc venenatis enim nec quam. 
Cras faucibus, justo vel accumsan aliquam, tellus dui fringilla quam, in condimentum augue lorem non tellus. Pellentesque id arcu non sem 
placerat iaculis. Curabitur posuere, pede vitae lacinia accumsan, enim nibh elementum orci, ut volutpat eros sapien nec sapien. Suspendisse 
neque arcu, ultrices commodo, pellentesque sit amet, ultricies ut, ipsum. Mauris et eros eget erat dapibus mollis. Mauris laoreet posuere odio.
Nam ipsum ligula, ullamcorper eu, fringilla at, lacinia ut, augue. Nullam nunc.

<div class="dashboard_button"><?php echo link_to(image_tag('add_fa_button.png'), url_for('advisor_new'));?></div>

<div class="dashboard_button"><?php echo link_to(image_tag('add_cl_button.png'), url_for('client_new'));?></div>

<br>

<div class="dashboard_button"><?php echo link_to(image_tag('view_fa_button'), url_for('advisor_index'));?></div>

<div class="dashboard_button"><?php echo link_to(image_tag('view_q_button'), url_for('advisor_new'));?></div>

<br>
<?php endif; ?>


<?php if ($sf_user->hasGroup('advisor')): ?>
<h1>EB Advisor Page</h1>

Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Duis ligula lorem, consequat eget, tristique nec, auctor quis, purus. 
Vivamus ut sem. Fusce aliquam nunc vitae purus. Aenean viverra malesuada libero. Fusce ac quam. Donec neque. Nunc venenatis enim nec quam. 
Cras faucibus, justo vel accumsan aliquam, tellus dui fringilla quam, in condimentum augue lorem non tellus. Pellentesque id arcu non sem 
placerat iaculis. Curabitur posuere, pede vitae lacinia accumsan, enim nibh elementum orci, ut volutpat eros sapien nec sapien. Suspendisse 
neque arcu, ultrices commodo, pellentesque sit amet, ultricies ut, ipsum. Mauris et eros eget erat dapibus mollis. Mauris laoreet posuere odio.
Nam ipsum ligula, ullamcorper eu, fringilla at, lacinia ut, augue. Nullam nunc.

<div class="dashboard_button"><?php echo link_to(image_tag('add_cl_button.png'), url_for('client_new'));?></div>

<div class="dashboard_button"><?php echo link_to(image_tag('add_data_button.png'), url_for('advisor_new'));?></div>

<br>

<div class="dashboard_button"><?php echo link_to(image_tag('add_q_button.png'), url_for('advisor_index'));?></div>

<div class="dashboard_button"><?php echo link_to(image_tag('view_q_button.png'), url_for('advisor_new'));?></div>

<br>

<div class="clearer" style="height:30px;"></div>
<?php endif; ?>


<?php if ($sf_user->hasGroup('client')): ?>
<h1>Client Page</h1>

Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Duis ligula lorem, consequat eget, tristique nec, auctor quis, purus. 
Vivamus ut sem. Fusce aliquam nunc vitae purus. Aenean viverra malesuada libero. Fusce ac quam. Donec neque. Nunc venenatis enim nec quam. 
Cras faucibus, justo vel accumsan aliquam, tellus dui fringilla quam, in condimentum augue lorem non tellus. Pellentesque id arcu non sem 
placerat iaculis. Curabitur posuere, pede vitae lacinia accumsan, enim nibh elementum orci, ut volutpat eros sapien nec sapien. Suspendisse 
neque arcu, ultrices commodo, pellentesque sit amet, ultricies ut, ipsum. Mauris et eros eget erat dapibus mollis. Mauris laoreet posuere odio.
Nam ipsum ligula, ullamcorper eu, fringilla at, lacinia ut, augue. Nullam nunc. 
 
<div class="dashboard_button"><?php echo link_to(image_tag('view_p_button'), url_for('profile_edit', $sf_user->getGuardUser()));?></div>

<div class="dashboard_button"><?php echo link_to(image_tag('view_q_button'), url_for('client_new'));?></div>

<br>

<div class="clearer" style="height:30px;"></div>
<?php endif; ?>