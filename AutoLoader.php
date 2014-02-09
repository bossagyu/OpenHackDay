<?php
/*
	AuotLoaderaを使って自動的にクラスァイルを読み込む
	命名規則としてクラス名.phpにする必要がある。
*/
class AutoLoader
{
	protected $dirs;

	public function register()
	{
		spl_autoload_register(array($this,'autoLoad'));
	}

	public function registerDir($dir)
	{
		$this->dirs[] = $dir;
	}
	
	/*
		インスタンス生成時に呼ばれる	
	*/
	public function autoLoad($className)
	{
		foreach ($this->dirs as $dir) {
			$file = $dir . '/' . $className . '.php';
			if (is_readable($file)) {
				require $file;

				return;
			}
		}
	}
}

?>
