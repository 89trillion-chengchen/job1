## 1.整体思路
1.解析json文件，整理格式且只保留有用的数据，生成新的json文件  
2.解析新的json文件，转为数组供其他函数使用  
3.对照不同任务完成不同逻辑  
流程图：
![Image text](https://raw.githubusercontent.com/89trillion-chengchen/job1/master/images/%E6%9C%AA%E5%91%BD%E5%90%8D%E6%96%87%E4%BB%B6%20(1).jpg
)

(1）输入稀有度，当前解锁阶段和cvc，获取该稀有度cvc合法且已解锁的所有士兵
```php 
   便利数组匹配稀有度，解锁阶段，cvc版本小于参数，提取出符合条件的数组并合并
```
(2）输入士兵id获取稀有度  
```php 
   便利数组匹配士兵id，提取出符合条件的数组
```
(3）输入士兵id获取战力  
```php 
   便利数组匹配士兵id，提取出符合条件的数组
```
(4）输入cvc获取所有合法的士兵  
```php 
   便利数组比较cvc版本小于参数，提取出符合条件的数组并合并
```
(5）获取每个阶段解锁相应士兵的json数据  
```php 
   便利数组匹配解锁阶段，提取出符合条件的数组
```
## 2.接口设计

（1）获取稀有度 
```php 
/Rarity/getRarity  
```
请求方法  
```php 
HTTP POST  
```
地址   
```php 
http://89tr.chengchen.com/Rarity/getRarity  
```
响应   
```php 
{"status":200,
"msg":"ok",
"data":[{"id":"10101","rarity":"1","combatPoints":"167","quality":"1","cvc":"1000"}]}
```

(2) 获取战力 
```php 
/CombatPoints/getCombatPoints   
 ```
请求方法  
```php 
HTTP POST  
 ```
地址   
```php 
http://89tr.chengchen.com/CombatPoints/getCombatPoints 
 ```
响应   
```php 
{"status":200,
"msg":"ok",
"data":[{"id":"10101","rarity":"1","combatPoints":"167","quality":"1","cvc":"1000"}]}  
 ```

(3) 获取该稀有度cvc合法且已解锁的所有士兵 
 ```php 
/LegalCvcAndUnlockedSoldier/getLegalCvcAndUnlockedSoldier 
 ```
请求方法  
 ```php 
HTTP POST  
 ```
地址   
 ```php 
 http://89tr.chengchen.com/LegalCvcAndUnlockedSoldier/getLegalCvcAndUnlockedSoldier
 ```
响应   
 ```php 
{"status":200,
"msg":"ok",
"data":[{"id":"10101",
"rarity":"1",
"combatPoints":"167",
"quality":"1",
"cvc":"1000"},
{"id":"10102",
"rarity":"1",
"combatPoints":"342",
"quality":"2",
"cvc":"1000"}   
 ```

(4)获取所有合法士兵 
  ```php 
/LegalSoldier/getLegalSoldier 
   ```
请求方法  
  ```php 
HTTP POST  
 ```
地址   
  ```php 
http://89tr.chengchen.com/LegalSoldier/getLegalSoldier 
 ```
响应   
 ```php 
{"status":200,
"msg":"ok",
"data":[{"id":"10101",
"rarity":"1",
"combatPoints":"167",
"quality":"1",
"cvc":"1000"},
{"id":"10102",
"rarity":"1",
"combatPoints":"342",
"quality":"2",
"cvc":"1000"}   
 ```

(5)获取该稀有度cvc合法且已解锁的所有士兵 
```php 
  /UnlockedSoldier/getUnlockedSoldierJson  
```
请求方法  
```php 
HTTP POST  
 ```
地址   
   ```php 
http://89tr.chengchen.com/UnlockedSoldier/getUnlockedSoldierJson  
   ```
响应   
 ```php 
{"status":200,
"msg":"ok",
"data":[{"id":"10101",
"rarity":"1",
"combatPoints":"167",
"quality":"1",
"cvc":"1000"},
{"id":"10102",
"rarity":"1",
"combatPoints":"342",
"quality":"2",
"cvc":"1000"}   
 ```
## 3.目录结构
 ```php
├── README.md
├── classes
│   ├── ctrl
│   │   ├── CombatPointsCtrl.php
│   │   ├── CtrlBase.php
│   │   ├── LegalCvcAndUnlockedSoldierCtrl.php
│   │   ├── LegalSoldierCtrl.php
│   │   ├── RarityCtrl.php
│   │   └── UnlockedSoldierCtrl.php
│   ├── service
│   │   ├── AnswerService.php
│   │   ├── BaseService.php
│   │   ├── CombatPointsService.php
│   │   ├── LegalCvcAndUnlockedSoldierService.php
│   │   ├── LegalSoldierService.php
│   │   ├── RarityService.php
│   │   └── UnlockedSoldierService.php
│   ├── unitTest
│   │   ├── CombatPointsServiceTest.php
│   │   ├── LegalCvcAndUnlockedSoldierServiceTest.php
│   │   ├── LegalSoldierServiceTest.php
│   │   ├── RarityServiceTest.php
│   │   └── UnlockedSoldierServiceTest.php
├── json
│   ├── config.army.model.json
│   └── newconfig.army.model.json
├── report
│   ├── locustfile.py
│   └── report_1627633775.250792.html
└── webroot
    └── index.php

  ```
### 3.1
  ```php
    json文件夹是json文件

    classes/ctrl是请求控制层

    classes/service是业务控制层

    classes/unitTest是测试层

    webroot/index.php是入口
  ```


## 4.运行和测试
### 4.1 如何部署运行服务
  ```php
使用docker运行容器，容器包含 nginx、php、php-fpm

配置文件根目录为项目根目录webroot，运行端口为8000
  ```
### 4.2 如何测试接口
  ```php
  终端进入 report 目录
  运行 locust 
  ```




