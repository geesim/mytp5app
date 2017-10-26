基于ThinkPHP5.0开发商城系统

------------
该项目只是作为学习thinkphp5.0.~版本的一个小案例，练手项目是也
如果你看到这个项目想进一步交流，可以发邮件到邮箱：geesim126@gmail.com
项目版本会慢慢迭代，希望是能开发出功能完善的系统


项目实现期望
1. 熟练掌握前端运用boostrap框架，后期可以的话手机wap端想尝试React开发
2. 熟练运用tp5的新特性，做到与时俱进...
3. 熟悉redis缓存运用
4. 熟悉phpunit测试在tp5中的运用
5. 熟悉RESTful开发
6. 待续...

------------
当前项目状态
1. 需求分析    未完成，想到哪就设计到哪，会参考网上各种方案，然后再进行开发设计
2. 数据库设计  同上 
3. 功能开发    同上
4. 功能测试    未开始
5. 以上


应用目录结构
~~~
application
|---backend             后台目录
|---component           公共Redis缓存模型组件*(该目录多余)* 
|---driver              用户驱动目录(暂时没有用)
|---extra               应用扩展配置目录
|---frontend            前台目录
    |---behavior        行为目录
    |---controller      控制器目录
    |---logic           逻辑层模型目录
    |---model           数据层模型目录
    |---service         服务层模型目录
    |---validate        验证器目录
    |---view            视图模板
~~~
三层模型在该应用中的角色作用分析
![三层模型关系和作用](https://raw.githubusercontent.com/geesim/mytp5app/master/59ee2178e4b08b9e91800f91.png)
