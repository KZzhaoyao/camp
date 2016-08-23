# jQuery practice

*全部利用jQuery代码实现*

> 1、在给出的index.html 里面引入jQuery;

- 使用CDN引入
- 下载源码引入

> 2、新建一个新的js文件，命名为app.js并在index.html中引入；

app.js会对jQuery依赖
<br>

> 3、利用jQuery实现app.js中的代码全部在文档加载完毕后执行；

提示：将需要执行的代码和文档的ready事件绑定。

> 4、利用jQuery分别选取：

- 所有的 p 元素
- 所有的 class="son" 的元素
- 选取 id="name" 的所有元素
- 选取所有p元素中的第2个p元素
- 选取class="first"的父元素

> 5、jQuery的DOM操作

- 在 class="first" 的li之前插入一个class="before"的li
- 在 class="brfore"的li 之后插入一个id＝"middle"的li
- 在 class="middle"的li 里面插入一个超链接，链接到百度
- 然后删除掉 class="brfore" 的 li

> 6、jQuery的CSS操作

- 在 class="first"的li的父元素里面添加一个新的li，类名为last;
- 然后将最后的这个li 的class添加一个active类
- 然后删除掉所有li里面的 active 类（注意：是把active类去掉，不是把元素删掉）
- 然后给 class="first"的力li的样式设置为颜色为红色，字号为30px,加下划线；

> 7、对属性操作

- 在整个文档最后面添加一个新的div，class="attr"
- 给这个div添加一个属性为data-url属性，值为："我还不知道";
- 在这个div里面添加两个按钮，一个按钮的名字叫"设置"，一个叫"获取"
- 实现点击一下“设置“按钮，可以把 刚才添加的div的data-url属性的值设置为"./ajax.txt";

> 8、jQuery.ajax

- 点击获取按钮，从div 中获取data-url的值作为ajax请求的地址，然后发送ajax请求，获去数据；
- 成功后在上面的ul里面添加一个li，然后将获去到的数据放到这个li里面；
- 如果失败，弹出一个'请求失败'的弹出框；

> 9、综合练习；

- 自己利用jQuery实现一个模态框的功能；
- 尝试写一个 menu 列表

> 10、思考：jQuery对象和document对象之间的相互转化；请尝试使用尽可能多的方法；












