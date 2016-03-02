# mta-php-sdk-example
This is an example of a system that you can use to get your head around connecting your resources in MTA to a remote (or local) Web server running PHP using the PHP SDK.

There are basically two ways of dealing with data flow in this system, one where you start from your PHP file and ask data to the MTA server. And the other where you start from your Lua file on a resource and then get data processed in PHP.

This can be very useful for things like showing a scoreboard on your website or sharing accounts between your game server and a forum, so your players only need to make one account. *The possibilities are endless*!

There are a couple of things that you need to make sure you have set up -*unless you don't want your system to work*- before you start coding.

* Your MTA server is running. :)
* You have a Web server set up with PHP and running.
* You have downloaded the [PHP SDK](https://wiki.multitheftauto.com/wiki/PHP_SDK#Download) and followed the instalation instructions on the wiki (deleted line 80).
* Every [exported](https://wiki.multitheftauto.com/wiki/Call) function in your Lua files must have the **http="true"** atribute.
* Your resource has admin rights.
* You have an account with admin rights on the server (you can [create](https://wiki.multitheftauto.com/wiki/Server_Manual#Adding_administrators) a new account just for this system).

Alright, I hope I didn't forget something, cause I did forgot some of those while doing this and that was a lot of *fun* hours figuring that out!
