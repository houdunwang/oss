<?php
/** .-------------------------------------------------------------------
 * |  Software: [HDCMS framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: aihoudun
 * | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/
namespace houdunwang\oss\build;

//错误处理
use OSS\OssClient;

class Base {
	//oss实例
	protected $ossClient;
	//储存块
	protected $bucket;

	public function __construct() {
		if ( function_exists( 'c' ) ) {
			$this->ossClient = new OssClient( c( 'oss.accessKeyId' ), c( 'oss.accessKeySecret' ), c( 'oss.endpoint' ) );
			$this->bucket    = c( 'oss.bucket' );
		}
	}

	/**
	 * 设置配置项
	 *
	 * @param $config
	 */
	public function config( $config ) {
		$this->ossClient = new OssClient( $config['accessKeyId'], $config['accessKeySecret'], $config['endpoint'] );
		$this->bucket    = $config['bucket'];
	}

	public function __call( $name, $arguments ) {
		array_unshift( $arguments, $this->bucket );

		$arr           = call_user_func_array( [ $this->ossClient, $name ], $arguments );
		$arr['uptime'] = time();
		//文件上传时添加其他数据
		if ( in_array( $name, [ 'uploadFile' ] ) ) {
			$info             = pathinfo( $arguments['2'] );
			$arr['path']      = $arr['oss-request-url'];
			$arr['fieldname'] = '';
			$arr['basename']  = $info['basename'];
			$arr['filename']  = ''; //新文件名
			$arr['name']      = $info['filename']; //旧文件名
			$arr['size']      = $arr['info']['size_upload'];
			$arr['ext']       = $info['extension'];
			$arr['dir']       = '';
			$arr['image']     = in_array( strtolower( $info['extension'] ), [ 'jpg', 'jpeg', 'png', 'gif' ] );
		}

		return $arr;
	}
}