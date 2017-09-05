<?php
return array(
	//'配置项'=>'配置值'
    'default_module'     => 'Home', //默认模块
    'url_model'          => '2', //URL模式
    'session_auto_start' => true, //是否开启session
    'LOAD_EXT_CONFIG' => 'db',// 加载单独的数据库配置文件
    'URL_CASE_INSENSITIVE' => true,// url忽略大小写

    'TMPL_L_DELIM'          => '<{',   // 模板引擎普通标签开始标记
    'TMPL_R_DELIM'          => '}>',   // 模板引擎普通标签结束标记

    'SHOW_PAGE_TRACE'       => false,   //开启页面Trace模式

);