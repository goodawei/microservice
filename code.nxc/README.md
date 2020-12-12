# microservices

https://www.kancloud.cn/study_team/composer_study/797514

composer config secure-http false

https://pkg.phpcomposer.com/


https://www.daimafans.com/article/d1871372827492352-p1-o1.html


https://github.com/kai-xx/laravel-swoole-thrift-rpc
https://github.com/fathpanus/php-thrift-swoole



        mkdir microservice
        
        git clone https://github.com/goodawei/microservice.git
        

step 1:  
    编辑: goodServiceSpec thrift
    生产代码： cd code.nxc/goodsContext/goodServiceSpec && thrift -r --gen  php:psr4,oop,json,server   --out ../../../goodCodeGen/src ./Tag/service.thrift
    提交：cd ./goodCodeGen && git push to github, 手动更新 packagist。
step 2:    
    goodService服务： composer update
    编辑服务端实现。
step 3:
    ordersContext服务：  composer update    
    rpc 调用。   
    
    

