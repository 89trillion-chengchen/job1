## 1.整体思路
1.解析json文件，整理格式且只保留有用的数据，生成新的json文件。  
2.解析新的json文件，转为数组供其他函数使用  
3.对照不同任务完成不同逻辑。
## 2.接口设计
```php 
（1）获取稀有度 getRarity.php  
请求方法  
HTTP GET  
地址   
http://localhost:8000/getRarity.php?id=10101 
  
响应   
{  
rarity: 1  
} 
```
```php 
(2) 获取战力 getCombatPoints.php  
请求方法  
HTTP GET  
地址   
http://localhost:8000/getCombatPoints.php?id=10101
  
响应   
{  
CombatPoints: 1  
}  
 ```
 ```php 
(3) 获取该稀有度cvc合法且已解锁的所有士兵 getLegalCvcAndUnlockedSoldier  
请求方法  
HTTP GET  
地址   
http://localhost:8000/getLegalCvcAndUnlockedSoldier.php?cvc=1500&rarity=1&quality=1  
  
响应   
{  
[{"id":"10101",  
"rarity":"1",  
"combatPoints":"167",  
"quality":"1",  
"cvc":"1000"}]. 
}    
 ```
  ```php 
(4)获取所有合法士兵 getLegalSoldier  
请求方法  
HTTP GET  
地址   
http://localhost:8000/getLegalSoldier.php?cvc=1500   
  
响应   
{  
[{"id":"10101",  
"rarity":"1",  
"combatPoints":"167",  
"quality":"1",  
"cvc":"1000"}]. 
}    
 ```
   ```php 
(5)获取该稀有度cvc合法且已解锁的所有士兵 getLegalCvcAndUnlockedSoldier  
请求方法  
HTTP GET  
地址   
http://localhost:8000/getUnlockedSoldierJson.php?quality=1   
  
响应   
{  
[{"id":"10101",  
"rarity":"1",  
"combatPoints":"167",  
"quality":"1",  
"cvc":"1000"}]. 
}    
 ```
## 3.运行
 ```php
部署apache端口为8000运行即可
 ```
