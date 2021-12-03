### 个推SDK

##### 配置
```php
$config = (new \Getui\Config())->
    setAppId('appid')->
    setAppKey('appkey')->
    setMasterSecret('secret');
```
##### 缓存
```php
$redis = new \Redis();
$redis->connect('127.0.0.1',6379,0);
```
##### Authorization
```php
$authorization = (new \Getui\Authorization($config))->withCacheDriver($redis);
```
##### 绑定别名
```php
(new \Getui\User())->withConfig($config)->withAuth($authorization)->aliasBind([
    [
        'cid'=>'ad9555f3c980cb0fe20de584ab9f0e3a',
        'alias'=>'15093570968'
    ]
]);
```
##### 通过ClientId 获取别名
```php
$alias = (new \Getui\User())->
withConfig($config)->
withAuth($authorization)->
getAliasByClientId('ad9555f3c980cb0fe20de584ab9f0e3a');
var_dump($alias);
```

##### 指定Client Id 推送
```php
(new \Getui\Push())->withConfig($config)->withAuth($authorization)->toSingleCid([
    'ad9555f3c980cb0fe20de584ab9f0e3a'
],(new \Getui\Message\NotificationMessage())->
setTitle('标题')->
setBody('内容')->
setClickType('payload')->
setPayload([
    'jump_type'=>1,
    'jump_value'=>2
]));
```
##### 指定 别名 推送
```php
(new \Getui\Push())->withConfig($config)->withAuth($authorization)->toSingleAlias([
    '15093570968'
],(new \Getui\Message\NotificationMessage())->
setTitle('标题')->
setBody('内容')->
setClickType('payload')->
setPayload([
    'jump_type'=>1,
    'jump_value'=>2
]));
```

##### 推送全部用户
```php
(new \Getui\Push())->withConfig($config)->withAuth($authorization)->toAll((new \Getui\Message\NotificationMessage())->
setTitle('标题')->
setBody('内容')->
setClickType('payload')->
setPayload([
    'jump_type'=>2,
    'jump_value'=>"id=1"
]));
```