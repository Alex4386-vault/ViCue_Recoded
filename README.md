# ViCue Recoded
 - Idea by Sean Kim
 - UX Design by 문보건(moonbogun@naver.com)
 - Special Thanks to...
    
    * Sean Kim for the CONCEPT OF THIS IDEA (NONE OF HIS SOURCES INCLUDED)
    * jQuery and Zurb for awesome javascript frameworks!
    * CKEditor for easier Notice Editing
	
 - Join our discord bug-tracker and development team! [Click Here!!](https://discord.gg/ryq5bTK)
 - Languages
	* [English](#english)
	* [한국어](#한국어)

## English
 > Make your event management much easier! ViCue Recoded!
 
 **ViCue Recoded** is a web-based application helps you to cue your events!
 The Event Managers can use timer to easily check time and change cue
 state easily!
 
 Original Version of the **ViCue**(As Known As ViCue 5.0.3 or under) was
 developed as closed source, but due to sean's graduation and development
 association with YCC(Yeoido Coding Club or YIT),
 The original code was removed and all the code was rewritten.
 so, Now, We are releasing this to everyone (I mean... being open-source)

### How to install ViCue Recoded
 **This requires Web server with php enabled.** 

#### For Windows
 1. Install the xampp(or another web server binary (but I do **NOT** recommend to use NGINX since it is built for web caching)) to your machine.
    1. If you are not using xampp, you should change your change your web server's config to work with php. **(I recommend you to use xampp if you don't want to change configs by yourself)**
 1. go into your web server directory (if you are using xampp, then, It is "Installation Directory/htdocs/") and put everything in the directory (It is OK to use inside another directory  since The Code itself is using relative path **except 404 page**)
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
 1. go into your web server directory and put it everything in the directory (It is OK to use inside another directory since The Code itself is using relative path **except 404 page**)
 1. go to your web server config and prevent it from caching its data
    1. If you are using apache,
        1. go to your "apache directory/mods-enabled" and write 
        
            ```
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
            
        1. After doing that, type ```a2enmod headers``` and ```apache2 -k graceful``` to activate the new config.
      
    1. If you are using lighttpd, then.. (NOT TESTED)
    ```
    server.stat-cache-engine = "disable'
    server.network-backend = "writev" 
    ```
 1. Go and use it!
 
### License
 The source code is distributed under [Apache License 2.0](https://github.com/Alex4386/ViCue_Recoded/blob/master/LICENSE)
 
 
## 한국어
 > 행사 진행을 쉽고 빠르게! ViCue Recoded!
 
 **ViCue Recoded** 은 여러분의 행사 진행을 도와 주기위해 개발되었습니다!
 이벤트 관리자들은 즉각적인 큐 변화, 빠른 업데이트 등을 통한 실시간 큐잉을 하실수 있습니다!
 
 **ViCue**의 원래 버전(ViCue 5.0.3 또는 이하 버전)은 클로즈드 소스로 개발되었습니다.
 그러나 개발인원의 교체 (여의도고 공학부 참여) 및 소스코드를 새로 제작함에 따라 (이름만 계승함) 
 오픈소스로 개방하게 되었습니다.
 
### ViCue Recoded 설치
 **php를 사용할 수 있는 웹 서버가 필요합니다, 실시간 업데이트가 필요하므로 웹서버의 응답속도 또한 중요합니다.** 


#### Windows
 1. xampp 또는 다른 웹서버를 설치합니다 (근데, NGINX는 데이터를 캐싱하기 때문에 **절대 추천드리지 않습니다**)
    1. xampp를 사용하지 않으신다면 php와의 연동 작업을 직접 진행해 주세요! **(귀차니즘과 빨리빨리문화에 숙달된 한국인은 xampp 씁시다. 워짜피 한국은 윈도우 공화국 이잖아요)**
 1. 웹서버 디렉토리로 (xampp라면, "설치 경로/htdocs/") 이동하여 모든 파일들을 옮겨 줍니다. (그 아래에 폴더 만들어서 그 안에 복사해도 됩니다 (상대경로 사용 **404 페이지 제외**))
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
 1. 웹서버 디렉토리로 (대개 /var/www/html/) 이동해 모든 파일을 옮겨 줍니다! (그 아래에 폴더 만들어서 그 안에 복사해도 됩니다 (상대경로 사용 **404 페이지 제외**))
 1. 캐싱을 막기위해 서버의 config를 수정해 줍니다
    1. apache서버(xampp) 는 httpd.conf에 
        1. "apache 설치 폴더 (대개 /etc/apache2)/mods-enabled" 에서 다음 내용을 작성하세요 
        
            ```
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
            
        1. 그런뒤에, ```a2enmod headers``` 와 ```apache2 -k graceful```를 쳐서 새 컨피그를 로드 합니다.
      
    
      
    1. lighttpd 쓰신다면, (시험해보지 않음)
    ```
    server.stat-cache-engine = "disable'
    server.network-backend = "writev" 
    ```
    
 1. 자 이제 쓰세요!
 
### License
 이 소스코드는 [Apache License 2.0](https://github.com/Alex4386/ViCue_Recoded/blob/master/LICENSE)에 의거해 배포되고 있습니다.
