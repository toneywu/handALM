<?php

$dependencies['Users']['hide_last_name'] = array(
    'hooks' => array("edit"),
    //Trigger formula for the dependency. Defaults to 'true'.
    'trigger' => 'true',
    'triggerFields' => array('last_name_c'),
    'onload' => true,
	
    //Actions is a list of actions to fire when the trigger is true
    'actions' => array(
		array(
			'name' => 'ReadOnly',
			//The parameters passed in will depend on the action type set in 'name'
			'params' => array(
				'target' => 'last_name',
				'value' => 'true',
			),
		),
    ),
);
 ?>