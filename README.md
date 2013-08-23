Status
======
Unfinished


WARNING!
========
This bundle was made at the time of Symfony 2.0 and will need rewrite as it is dating from 2012.

It was made even before packagist and Composer was known to me.


Description
===========
A Sample use-case to communicate using Guzzle within a Symfony2 project and communicating with Twitter API



Todo
====
* Abstract the service and provide more than only Twitter
* Create event to hook from them
* Declare dependencies using composer.json


What was in deps?
=================

[Guzzle]
    git=git://github.com/guzzle/guzzle.git

[GuzzleBundle]
    git=git@github.com:renoirb/GuzzleBundle.git
    target=bundles/Guzzle/GuzzleBundle
