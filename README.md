# php快速生成表格


## 使用方式
需要注意命名空间
```
$data = $model->getData();
$count = $model->getCount();

$table = new Table();
$table->setHeader("id,name,age,status,options");// 设置表头
$table->setFooter($count) // 设置记录的行数

// 在生成html之前你可以对data进行处理
$tableHtml = $table->build($data);
```