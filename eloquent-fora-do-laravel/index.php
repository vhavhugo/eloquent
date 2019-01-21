<?php

require('vendor/autoload.php');

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
  'driver' => 'mysql',
  'host' => '192.168.10.10',
  'database' => 'eloquent_blog',
  'username' => 'homestead',
  'password' => 'secret',
  'charset' => 'utf8',
  'collation' => 'utf8_unicode_ci',
  'prefix' => '' 
]);

$capsule->bootEloquent();

$post = \App\Models\Post::find(1);

dd($post->title, $post->content);