# ViCue6
 - Idea by Sean Kim
 - Special Thanks to...
    * [YHSSC 너섬학생회](https://www.facebook.com/yhssc/)
    * Sean Kim for the CONCEPT OF THIS IDEA (NONE OF HIS SOURCES INCLUDED)
 - Languages
	* [English](#english)
	* [한국어](#한국어)

## English
 > Make your event management much easier! ViCue6!
 
 **ViCue6** is a web-based application helps you to cue your events!
 The Event Managers can use timer to easily check time and change your cue
 state easily!
 
 Original Version of the **ViCue**(As Known As ViCue 5.0.3 or under) was
 developed as closed source, but due to sean's graduation and development
 association with YCC(Yeoido Coding Club or YIT) 

### How to install ViCue6
 **This requires Web server with php enabled.** 

#### For Windows
 1. Install the xampp(or another web server binary (but I do **NOT** recommend to use NGINX since it is built for web caching)) to your machine.
    1. If you are not using xampp, you should change your change your web server's config to work with php. **(I recommend you to use xampp if you don't want to change configs by yourself)**
 1. go into your web server directory (if you are using xampp, then, It is "Installation Directory/htdocs/") and put everything in the directory (It is OK to use inside another directory  since The Code itself is using relative path)
 1. go to your web server config and prevent it from caching its data
    1. If you are using apache, go to your httpd.conf and write
    
    ```
    LoadModule headers_module modules/mod_headers.so
    #If you have this already, then, just write the next part
     <Directory yourdirectory(usually it is /)>
       <filesMatch "\.(html|htm|js|css)$">
       FileETag None
           <ifModule mod_headers.c>
           Header unset ETag
           Header set Cache-Control "max-age=0, no-cache, no-store, must-revalidate"
           Header set Pragma "no-cache"
           Header set Expires "Wed, 11 Jan 1984 05:00:00 GMT"
           </ifModule>
       </filesMatch>
     </Directory>
    ```
    
    1. If you are using lighttpd, then.. (NOT TESTED)
    ```
    server.stat-cache-engine = "disable'
    server.network-backend = "writev" 
    ```
    
 1. Go and use it!
 

#### For Linux
 1. Install the httpd(s) (but I do **NOT** recommend to use NGINX since it is built for web caching)) to your machine.
    1. Admin Page **REQUIRES** PHP! Please download your httpd version of php
 1. go into your web server directory and put it everything in the directory (It is OK to use inside another directory since The Code itself is using relative path)
 1. go to your web server config and prevent it from caching its data
    1. If you are using apache, go to your httpd.conf and write 
    ```
    LoadModule headers_module modules/mod_headers.so
    #If you have this already, then, just write the next part
     <Directory yourdirectory(usually it is /)>
       <filesMatch "\.(html|htm|js|css)$">
       FileETag None
           <ifModule mod_headers.c>
           Header unset ETag
           Header set Cache-Control "max-age=0, no-cache, no-store, must-revalidate"
           Header set Pragma "no-cache"
           Header set Expires "Wed, 11 Jan 1984 05:00:00 GMT"
           </ifModule>
       </filesMatch>
     </Directory>
    ```
    
      
    1. If you are using lighttpd, then.. (NOT TESTED)
    ```
    server.stat-cache-engine = "disable'
    server.network-backend = "writev" 
    ```
 1. Go and use it!
 
### License
 The source code is distributed under [Apache License 2.0]("https://github.com/0xEBB095EC8381ED9DAC/ViCue6/blob/master/LICENSE")
 
 
## 한국어
 > 행사 진행을 쉽고 빠르게! ViCue6!
 
 **ViCue6** 은 여러분의 행사 진행을 도와 주기위해 개발되었습니다!
 이벤트 관리자들은 즉각적인 큐 변화, 빠른 업데이트 등을 통한 실시간 큐잉을 하실수 있습니다!
 
 **ViCue**의 원래 버전(ViCue 5.0.3 또는 이하 버전)은 클로즈드 소스로 개발되었습니다.
 그러나 개발인원의 교체 (여의도고 공학부 참여) 및 소스코드를 새로 제작함에 따라 (이름만 계승함) 
 오픈소스로 개방하게 되었습니다.
 
### ViCue6 설치
 **php를 사용할 수 있는 웹 서버가 필요합니다, 실시간 업데이트가 필요하므로 웹서버의 응답속도 또한 중요합니다.** 


#### Windows
 1. xampp 또는 다른 웹서버를 설치합니다 (근데, NGINX는 데이터를 캐싱하기 때문에 **절대 추천드리지 않습니다**)
    1. xampp를 사용하지 않으신다면 php와의 연동 작업을 직접 진행해 주세요! **(귀차니즘과 빨리빨리문화에 숙달된 한국인은 xampp 씁시다. 워짜피 한국은 윈도우 공화국 이잖아요)**
 1. 웹서버 디렉토리로 (xampp라면, "설치 경로/htdocs/") 이동하여 모든 파일들을 옮겨 줍니다. (그 아래에 폴더 만들어서 그 안에 복사해도 됩니다 (상대경로 사용))
 1. 캐싱을 막기위해 서버의 config를 수정해 줍니다
    1. apache서버(xampp) 는 httpd.conf에 
    ```
    LoadModule headers_module modules/mod_headers.so
    #If you have this already, then, just write the next part
     <Directory yourdirectory(usually it is /)>
       <filesMatch "\.(html|htm|js|css)$">
       FileETag None
           <ifModule mod_headers.c>
           Header unset ETag
           Header set Cache-Control "max-age=0, no-cache, no-store, must-revalidate"
           Header set Pragma "no-cache"
           Header set Expires "Wed, 11 Jan 1984 05:00:00 GMT"
           </ifModule>
       </filesMatch>
     </Directory>
    ```
    
      
    1. lighttpd 쓰신다면, (시험해보지 않음)
    ```
    server.stat-cache-engine = "disable'
    server.network-backend = "writev" 
    ```
    
 1. 자 이제 쓰세요!
 
 #### Linux
 1. 웹서버를 설치합니다 (근데, NGINX는 데이터를 캐싱하기 때문에 **절대 추천드리지 않습니다**)
    1. php와의 연동 작업을 직접 진행해 주세요! (LoadModule등... )
 1. 웹서버 디렉토리로 (대개 /var/www/html/) 이동해 모든 파일을 옮겨 줍니다! (그 아래에 폴더 만들어서 그 안에 복사해도 됩니다 (상대경로 사용))
 1. 캐싱을 막기위해 서버의 config를 수정해 줍니다
    1. apache서버(xampp) 는 httpd.conf에 
    ```
    LoadModule headers_module modules/mod_headers.so
    #If you have this already, then, just write the next part
     <Directory yourdirectory(usually it is /)>
       <filesMatch "\.(html|htm|js|css)$">
       FileETag None
           <ifModule mod_headers.c>
           Header unset ETag
           Header set Cache-Control "max-age=0, no-cache, no-store, must-revalidate"
           Header set Pragma "no-cache"
           Header set Expires "Wed, 11 Jan 1984 05:00:00 GMT"
           </ifModule>
       </filesMatch>
     </Directory>
    ```
    
      
    1. lighttpd 쓰신다면, (시험해보지 않음)
    ```
    server.stat-cache-engine = "disable'
    server.network-backend = "writev" 
    ```
    
 1. 자 이제 쓰세요!
 
### License
 이 소스코드는 [Apache License 2.0]("https://github.com/0xEBB095EC8381ED9DAC/ViCue6/blob/master/LICENSE")에 의거해 배포되고 있습니다.
