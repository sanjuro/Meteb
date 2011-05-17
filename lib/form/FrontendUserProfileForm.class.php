<?php

class FrontendUserProfileForm extends BaseUserProfileForm
{
  public function configure()
  {
    unset(
      $this['created_at'], $this['updated_at']
    );
    
  }
}
?>