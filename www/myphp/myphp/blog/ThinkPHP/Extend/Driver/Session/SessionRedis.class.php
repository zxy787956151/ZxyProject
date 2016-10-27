<?php
/**
 * 自定义REDIS 驱动SESSION
 */
	Class SessionRedis {

		//REDIS连接对象
		// Private $reids;

		Public function execute (){
			session_set_save_handler(//php处理session函数绑定
				array(&$this, 'open'), 
				array(&$this, 'close'),
				array(&$this, 'read'),
				array(&$this, 'write'),
				array(&$this, 'destroy'),
				array(&$this, 'gc')
				);
		}


		Public function open ($path, $name) {
			// echo "open!";
			// $this->redis = new Redis();
			//return $this->redis->connect(C('REDIS_HOST'), C('REDIS_PORT'));
		}

		Public function close() {

		}

		Public function read ($id) {

		}

		Public function write ($id, $data) {

		}


		Public function destroy ($id) {

		}

		Public function gc ($maxLifeTime) {

		}

	}
?>