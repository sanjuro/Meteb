<?php

class FrontendUserProfileForm extends BaseUserProfileForm
{
  public function configure()
  {
    unset(
      $this['user_profile_id'], $this['created_at'], $this['updated_at']
    );
    
  }
}
?>