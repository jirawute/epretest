<?php
return array (
  'student' => 
  array (
    'type' => 2,
    'description' => 'Student access',
    'bizRule' => '',
    'data' => '',
  ),
  'admin' => 
  array (
    'type' => 2,
    'description' => 'Can access to back end',
    'bizRule' => '',
    'data' => '',
    'assignments' => 
    array (
      3 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
    ),
  ),
  'top_admin' => 
  array (
    'type' => 2,
    'description' => 'Can do anything on this website',
    'bizRule' => '',
    'data' => '',
    'children' => 
    array (
      0 => 'admin',
      1 => 'student',
    ),
    'assignments' => 
    array (
      1 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
      4 => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
    ),
  ),
);
