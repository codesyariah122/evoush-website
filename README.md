<img src="https://raw.githubusercontent.com/codesyariah122/bahan-evoush/4d2ea5ca618f3dd8c1bd3be7e9f172d3664ba67e/images/logo/evoush_logo_header.svg"/>
Evoush backend ini dibangun di atas bahasa pemrogramman PHP7 dan kali ini untuk build system keseluruhan di gunakan framework Laravel8 sebagai backend system untuk managerial data bagi kebutuhan front end website.  
backend : <a href="https://app.evoush.com">Evoush Backend</a>  

### Evoush all the technology used
* Front End
    - WebPack
    - Bootstrap v4.6
    - Vue JS
    - Blade Template
    - jQuery
    - Native Javascript
* Backend 
    - Laravel 8 as a Framework
    - Backend
    - RestApi

### Next Schedule
* Create Strore Front For Mobile Device
* using React Or Vue Or Ember and Angular


**Sample Rest Post Method**  
<img src="https://raw.githubusercontent.com/codesyariah122/evoush-website/new_evoush_branch/sample_post_method_api.jpg">




### Migration Server to Heroku  

Configure server on heroku : 

##### .user.ini (Custome for php at server)  
```bash
upload_max_filesize=100M
post_max_size=100M
```

##### .htaccess  

```bash
<IfModule mod_rewrite.c>
RewriteEngine on
RewriteRule ^$ public/ [L]
RewriteRule (.*) public/$1 [L]
</IfModule>
```

#### Dont Forget  

Using AddOn Postgresql heroku s3 server  
Deploy setup Environment rules in heroku