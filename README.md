
# 简介
让swoft框架欢快的跑在tars里面
* 支持打包发布
* 支持服务存活上报（服务注册）

# 相关项目
[**SWOFT**](https://github.com/swoft-cloud/swoft)
[**TARS**](https://github.com/swoft-cloud/swoft)
[**TARSPHP分支**](https://github.com/Tencent/Tars/tree/phptars)
[**TARSPHP DOCKER**](https://github.com/tangramor/docker-tars)

# 使用

* Clone 项目
* 安装依赖 `composer install`
* 打包 `composer run-script deploy`
* 上传tars平台

# 配置说明

* 服务名需要在 ./tars/tars.proto.php （appName&serverName） 和 ./src/.env （PNAME） 里面正确配置
* swoft的端口号不使用tars平台下发的端口号

