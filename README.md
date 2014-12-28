ONLINE EXAMINATION PORTAL
====

A simple online examination portal being designed to conduct FE SE TE mock tests for Pune University. 
Login will be based on student PRN(Permanent Registration Number).

<b>Requirments:</b>

WAMP - 32 bit
Download it from:
http://www.wampserver.com/en/


MongoDB -32 bit
Download it from:
https://www.mongodb.org/downloads

MongoDB PHP driver:
https://s3.amazonaws.com/drivers.mongodb.org/php/index.html

Download '<b>php_mongo-1.5.1.zip</b>'


<b>Steps for setting up:<b>

Extract the above file.

Select  '<b>php_mongo-1.5.1-5.5-vc11.dll</b>' and rename it to <b>php_mongo.dll<b>.

Paste it the ext directory '<b>wamp\bin\php\php5.5.12\ext</b>'

Modify the <b>php.ini</b> file - Add '<b>extension=php_mongo.dll</b>'  in php.ini file.

One last thing. Fork this repo in the <b>wamp\www</b> directory.

And you are all set.


<b>Importing the Temporary Database.</b>

Change your directory to the doep folder.
Use '<b>mongorestore doep</b>' to restore database.
