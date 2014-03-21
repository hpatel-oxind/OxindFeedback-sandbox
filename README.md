OxindFeedback-sandbox
=====================

Full working demo of OxindFeedbackBundle with sonata admin and fos user

Installation Steps:
===================


- Clone git repository ( "https://github.com/hpatel-oxind/OxindFeedback-sandbox.git" ) in server directory. 
- Update parameter.yml with your configuration Like( host, username, password, database).
- Update composer ( "php composer.phar update" ).
- create database ( "php app/console doctrine:database:create" ).
- generate schema ( "php app/console doctrine:schema:create" ) or update schema ( "php app/console doctrine:schema:update   force").
- create user ("php app/console fos:user:create testuser test@example.com p@ssword") or ("php app/console fos:user:create   testuser")
- activate user ("php app/console fos:user:activate testuser")
- promot user ("php app/console fos:user:promote testuser ROLE_ADMIN") Please refere for more information (    
  "github.com/FriendsOfSymfony/FOSUserBundle/blob/master/Resources/doc/command_line_tools.md" )
- install assets ("app/console assets:install").
- Clear cache ("app/console cache:clear") or ("app/console cache:warmup").




